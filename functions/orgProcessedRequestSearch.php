<?php
//fetch.php
session_start();
include('../sqlqueries/dbConnect.php');

$num_per_page = $_SESSION['numpage'];
$start_from = $_SESSION['start_from'];
$querryLimit = "LIMIT $start_from,$num_per_page";
$output = '';
$_SESSION['currentSearchFilter'] = "All";
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $_SESSION['currentSearchFilter'] = $search;
 $query = "
  SELECT * FROM requests INNER JOIN assistance_offered ON requests.asst_id = assistance_offered.asst_id
  WHERE (req_archive='UNARCHIVED' AND req_status!='PENDING' AND requests.org_id = '".$_SESSION["currentOrg"]."')
  AND (req_refID LIKE '%".$search."%'
  OR req_givenname LIKE '%".$search."%' 
  OR req_middlename LIKE '%".$search."%' 
  OR req_lastname LIKE '%".$search."%' 
  OR req_status LIKE '%".$search."%'
  OR asst_name LIKE '%".$search."%')

 ";
}
else if(isset($_POST["request"]))
{
 if($_POST["request"]=="All"){
    $query = "
    SELECT * FROM requests INNER JOIN assistance_offered ON 
    requests.asst_id = assistance_offered.asst_id WHERE req_archive='UNARCHIVED' AND req_status!='PENDING' AND requests.org_id = '".$_SESSION["currentOrg"]."' ORDER BY req_date
    ";
 }
 else{
 $filter = mysqli_real_escape_string($conn, $_POST["request"]);
 $_SESSION['currentSearchFilter'] = $filter;
 $query = "
  SELECT * FROM requests INNER JOIN assistance_offered ON requests.asst_id = assistance_offered.asst_id
  WHERE (req_archive='UNARCHIVED' AND req_status!='PENDING'AND requests.org_id = '".$_SESSION["currentOrg"]."') 
  AND(asst_name LIKE '%".$filter."%'  
  OR req_status LIKE '%".$filter."%')
  ";}
}
else
{
 $query = "
 SELECT * FROM requests INNER JOIN assistance_offered ON 
 requests.asst_id = assistance_offered.asst_id WHERE req_archive='UNARCHIVED' AND req_status!='PENDING' AND requests.org_id = '".$_SESSION["currentOrg"]."' ORDER BY req_date
 ";
}
$_SESSION['currentQuery'] = $query;
$newQuery = $query.$querryLimit;
$result = mysqli_query($conn, $newQuery);
if(mysqli_num_rows($result) > 0)
{
 $checkFunction = 'alert_phrase("phrase")';
 $clickAll = "window.alert('sometext');";
 $output .= '
<form action="../functions/orgAsstArchive.php" method="POST">
                      
<table>
        <thead>
                <tr class="table100-head">
                            <th class="column1">Select</th>
                            <th class="column2">Reference ID</th>
                            <th class="column3">Name</th>
                            <th class="column4">Email</th>
                            <th class="column5">Type of Request</th>
                            <th class="column6">Request Status</th>



                </tr>
                                    
 ';
 while($row = mysqli_fetch_array($result))
 {
  $currentreq_ref_ID = $row['req_refID'];
  $clickLink = "window.location='OrganizationReportReview.php?updateID=$currentreq_ref_ID';";
  $current_req_status = $row["req_status"];  

  if( $current_req_status == "APPROVED"){
    $req_status = "<td class='column6 approved' id='contentTD' onClick='.$clickLink.'>$current_req_status</td>";
  }
  //Lagay mo nalang yung kulay dito SAMPLE:GREEN
  else if( $current_req_status == "DECLINED"){
    $req_status = "<td class='column6 declined' id='contentTD' onClick='.$clickLink.'>$current_req_status</td>";
  }
  $output .= '
    
        <tbody>   
                <tr>
                    <td class="column1">
                    <label class="checkboxxer">
                        <input type="checkbox" name="stud_archive[]" value="'.$_SESSION['stud_archive'] = $row['req_refID'].'">
                            <div class="checkmark"></div>
                    </label>
                    </td> 
                    <td class="column2" id="contentTD" onClick='.$clickLink.'>'.$row["req_refID"].'</td>
                    <td class="column3" id="contentTD" onClick='.$clickLink.'>'.$row["req_givenname"].' '.$row["req_middlename"].' '.$row["req_lastname"].'</td>
                    <td class="column4" id="contentTD" onClick='.$clickLink.'>'.$row["req_email"].'</td>
                    <td class="column5" id="contentTD" onClick='.$clickLink.'>'.$row["asst_name"].'</td>
                    '.$req_status.'
                </tr>
        </tbody>
  '
  ;
 }
 $output .= '

 </table>
 <button  class="button-quatary archived" style="float:right; margin-top:auto;position:relative; margin:1rem;" type="submit" name="stud_archive_btn">
 <object data="../resources/assets/icons/archive-button.svg" width="20" height="20"></object>Archive
 </button>
 </form>
 
 <ul class="pagination" >
  ';
 
 $query= $_SESSION['currentQuery'];
 $result=mysqli_query($conn,$query);
 $total_records=mysqli_num_rows($result);                  
 $total_pages=ceil($total_records/$_SESSION['numpage']);
 $i = 1;
 $nextI= $_SESSION['currentPage_1'] + 1;
 $backI= $_SESSION['currentPage_1'] - 1;

        
          if($_SESSION['currentPage_1'] == 1){
           if($total_pages == 1){
            $output .= '
               
               <li class="page-item"><a class="page-link" 
               style="background-color:hsl(218, 72%, 18%);color:white;" href="OrganizationProcessedRequest.php?page='.$_SESSION['currentPage_1'].'">'.$_SESSION['currentPage_1'].'</a></li>
               
            
               ';
            }
            else{
           $output .= '
               
               <li class="page-item"><a class="page-link" 
               style="background-color:hsl(218, 72%, 18%);color:white;" href="OrganizationProcessedRequest.php?page='.$_SESSION['currentPage_1'].'">'.$_SESSION['currentPage_1'].'</a></li>
               
               <li class="page-item"><a class="page-link"href="OrganizationProcessedRequest.php?page='.$nextI.'">></a></li>
               
               <li class="page-item"><a class="page-link"href="OrganizationProcessedRequest.php?page='.$total_pages.'">>></a></li>
            
               ';
          }
          }
  		  else if($_SESSION['currentPage_1'] == $total_pages){
          $output .= '
          	<li class="page-item"><a class="page-link"href="OrganizationProcessedRequest.php?page=1"><<</a></li>
          
               <li class="page-item"><a class="page-link"href="OrganizationProcessedRequest.php?page='.$backI.'"><</a></li>
               
               <li class="page-item"><a class="page-link" 
               style="background-color:hsl(218, 72%, 18%);color:white;" href="OrganizationProcessedRequest.php?page='.$_SESSION['currentPage_1'].'">'.$_SESSION['currentPage_1'].'</a></li>
               
               ';
          }
  		  else{
            $output .= '
               <li class="page-item"><a class="page-link"href="OrganizationProcessedRequest.php?page=1"><<</a></li>
            
               <li class="page-item"><a class="page-link"href="OrganizationProcessedRequest.php?page='.$backI.'"><</a></li>

               <li class="page-item"><a class="page-link" 
               style="background-color:hsl(218, 72%, 18%);color:white;" href="OrganizationProcessedRequest.php?page='.$_SESSION['currentPage_1'].'">'.$_SESSION['currentPage_1'].'</a></li>
               
               <li class="page-item"><a class="page-link"href="OrganizationProcessedRequest.php?page='.$nextI.'">></a></li>
               
               <li class="page-item"><a class="page-link"href="OrganizationProcessedRequest.php?page='.$total_pages.'">>></a></li>
               ';
          }

 
 $output .= '
 </ul>

 
  ';
 echo $output;
 $_SESSION['selectedOutput'] = $output;
}
else
{
    echo '<br><h3>Data Not Found<h3><br>';
}

?>