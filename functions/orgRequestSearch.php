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
  WHERE (req_archive='UNARCHIVED' AND req_status='PENDING' AND requests.org_id = '".$_SESSION["currentOrg"]."')
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
    requests.asst_id = assistance_offered.asst_id WHERE req_archive='UNARCHIVED' AND req_status='PENDING' AND requests.org_id = '".$_SESSION["currentOrg"]."' ORDER BY req_date
    ";
 }
 else{
 $filter = mysqli_real_escape_string($conn, $_POST["request"]);
 $_SESSION['currentSearchFilter'] = $filter;
 $query = "
  SELECT * FROM requests INNER JOIN assistance_offered ON requests.asst_id = assistance_offered.asst_id
  WHERE (asst_name LIKE '%".$filter."%'  
  OR req_status LIKE '%".$filter."%')
  AND (req_archive='UNARCHIVED' AND req_status='PENDING'AND requests.org_id = '".$_SESSION["currentOrg"]."')
  ";}
}
else
{
 $query = "
 SELECT * FROM requests INNER JOIN assistance_offered ON 
 requests.asst_id = assistance_offered.asst_id WHERE req_archive='UNARCHIVED' AND req_status='PENDING' AND requests.org_id = '".$_SESSION["currentOrg"]."' ORDER BY req_date
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
                               
                                        <th class="column1">Reference ID</th>
                                        <th class="column2">Name</th>
                                        <th class="column3">Email</th>
                                        <th class="column4">Type of Request</th>
                                        <th class="column5">Request Date</th>
                                        <th class="column6">Request Status</th>
                                  
                                    </tr>
                                    
 ';
 while($row = mysqli_fetch_array($result))
 {
  $currentreq_ref_ID = $row['req_refID'];
  $clickLink = "window.location='OrganizationRequestReview.php?updateID=$currentreq_ref_ID';";

  $output .= '
    
                            <tbody>   
                                     <tr>

                                        <td class="column1" onClick='.$clickLink.'>'.$row["req_refID"].'</td>
                                        <td class="column2"onClick='.$clickLink.'>'.$row["req_givenname"].' '.$row["req_middlename"].' '.$row["req_lastname"].'</td>
                                        <td class="column3" onClick='.$clickLink.'>'.$row["req_email"].'</td>
                                        <td class="column4" onClick='.$clickLink.'>'.$row["asst_name"].'</td>
                                        <td class="column5" onClick='.$clickLink.'>'.$row["req_date"].'</td>
                                        <td class="column6 pending" onClick='.$clickLink.'>'.$row["req_status"].'</td>

                                    </tr>
                            </tbody>
                            
 
  '
  ;
 }
 $output .= '

 </table>
 </form>
 
 

 <ul class="pagination" >
  ';
 
 $query= $_SESSION['currentQuery'];
 $result=mysqli_query($conn,$query);
 $total_records=mysqli_num_rows($result);                  
 $total_pages=ceil($total_records/$_SESSION['numpage']);
  
 $i = 1;
 $nextI= $_SESSION['currentPage'] + 1;
 $backI= $_SESSION['currentPage'] - 1;

        
          if($_SESSION['currentPage'] == 1){
            
            if($total_pages == 1){
            $output .= '
               
               <li class="page-item"><a class="page-link" 
               style="background-color:hsl(218, 72%, 18%);color:white;" href="OrganizationRequest.php?page='.$_SESSION['currentPage'].'">'.$_SESSION['currentPage'].'</a></li>
               
            
               ';
            }
            else{
           $output .= '
               
               <li class="page-item"><a class="page-link" 
               style="background-color:hsl(218, 72%, 18%);color:white;" href="OrganizationRequest.php?page='.$_SESSION['currentPage'].'">'.$_SESSION['currentPage'].'</a></li>
               
               <li class="page-item"><a class="page-link"href="OrganizationRequest.php?page='.$nextI.'">></a></li>
               
               <li class="page-item"><a class="page-link"href="OrganizationRequest.php?page='.$total_pages.'">>></a></li>
            
               ';
            }
          }
  			
  		  else if($_SESSION['currentPage'] == $total_pages){
          $output .= '
          	<li class="page-item"><a class="page-link"href="OrganizationRequest.php?page=1"><<</a></li>
          
               <li class="page-item"><a class="page-link"href="OrganizationRequest.php?page='.$backI.'"><</a></li>
               
               <li class="page-item"><a class="page-link" 
               style="background-color:hsl(218, 72%, 18%);color:white;" href="OrganizationRequest.php?page='.$_SESSION['currentPage'].'">'.$_SESSION['currentPage'].'</a></li>
               
               ';
          }
  		  else{
            $output .= '
               <li class="page-item"><a class="page-link"href="OrganizationRequest.php?page=1"><<</a></li>
            
               <li class="page-item"><a class="page-link"href="OrganizationRequest.php?page='.$backI.'"><</a></li>

               <li class="page-item"><a class="page-link" 
               style="background-color:hsl(218, 72%, 18%);color:white;" href="OrganizationRequest.php?page='.$_SESSION['currentPage'].'">'.$_SESSION['currentPage'].'</a></li>
               
               <li class="page-item"><a class="page-link"href="OrganizationRequest.php?page='.$nextI.'">></a></li>
               
               <li class="page-item"><a class="page-link"href="OrganizationRequest.php?page='.$total_pages.'">>></a></li>
               ';
          }
              
 
 
 $output .= '
 </ul>
 </div>
 
  ';
 echo $output;
 $_SESSION['selectedOutput'] = $output;
}
else
{
    echo '<br><h3>Data Not Found<h3><br>';
}

?>