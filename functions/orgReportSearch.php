<?php
//fetch.php
session_start();
include('../sqlqueries/dbConnect.php');

$num_per_page = $_SESSION['numpageRep'];
$start_from = $_SESSION['start_from_Rep'];
$querryLimit = "LIMIT $start_from,$num_per_page";
$clickPDF = "window.location='../functions/reportPDFAct.php';";

$output = '';
$_SESSION['currentSearchFilter'] = "All";
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $_SESSION['currentSearchFilter'] = $search;
 $query = "
  SELECT * FROM requests INNER JOIN assistance_offered ON requests.asst_id = assistance_offered.asst_id
  WHERE (requests.org_id = '".$_SESSION["currentOrg"]."')
  AND(
  req_refID LIKE '%".$search."%'
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
        SELECT * FROM requests INNER JOIN assistance_offered ON requests.asst_id = assistance_offered.asst_id WHERE requests.org_id = '".$_SESSION["currentOrg"]."' ORDER BY req_date
        ";
    }
    
    else{
    $filter = mysqli_real_escape_string($conn, $_POST["request"]);
    $_SESSION['currentSearchFilter'] = $filter;
    $query = "
    SELECT * FROM requests INNER JOIN assistance_offered ON requests.asst_id = assistance_offered.asst_id
    WHERE requests.org_id = '".$_SESSION["currentOrg"]."'
    AND (asst_name LIKE '%".$filter."%'  
    OR req_status LIKE '%".$filter."%')
    ";}
}

else if(isset($_POST["start_date"])){
    $start_date = $_POST['start_date'];
    $_SESSION['start_dateorg'] = $start_date;  
    
    $query = "
    SELECT * FROM requests INNER JOIN assistance_offered ON requests.asst_id = assistance_offered.asst_id WHERE req_qr = 'NONE'
    ";
}

else if(isset($_POST["end_date"])){
    $end_date = $_POST['end_date'];
    $_SESSION['end_dateorg'] = $end_date;


    if($_SESSION['start_dateorg']!=""){
    $query = "
    SELECT * FROM requests INNER JOIN assistance_offered ON requests.asst_id = assistance_offered.asst_id
    WHERE (req_date BETWEEN '". $_SESSION['start_dateorg']."' AND '". $_SESSION['end_dateorg']."')
    ";  
    }
        
}

else
{
  
  if($_SESSION["current_report"]!=""){
  
   $query = "
        SELECT * FROM requests INNER JOIN assistance_offered ON requests.asst_id = assistance_offered.asst_id WHERE 
        requests.org_id = '".$_SESSION["currentOrg"]."' AND req_status = '".$_SESSION["current_report"]."' ORDER BY req_date
        ";
  }
  else{
     $query = "
     SELECT * FROM requests INNER JOIN assistance_offered ON requests.asst_id = assistance_offered.asst_id WHERE requests.org_id = '".$_SESSION["currentOrg"]."' ORDER BY req_date
     ";
  }
}
$current_date = date("Y/m/d");
$_SESSION['currentdate'] = $current_date;
$_SESSION['currentQuery'] = $query;
$newQuery = $query.$querryLimit;
$_SESSION['newQuery'] = $newQuery;
$result = mysqli_query($conn, $_SESSION['newQuery']);
if(mysqli_num_rows($result) > 0)
{
 $checkFunction = 'alert_phrase("phrase")';
 $output .= '
 <form action="" method="POST">

    <table>
            <thead>
                    <tr class="table100-head">

                   
                        <th class="column2">Reference ID</th>
                        <th class="column3">Name</th>
                        <th class="column4">Email</th>
                        <th class="column4">Type of Request</th>
                        <th class="column5">Request Date</th>
                        <th class="column6">Request Status</th>
                    </tr>
                                    
 ';
 while($row = mysqli_fetch_array($result))
 {
  $currentreq_ref_ID = $row['req_refID'];
  $clickLink = "window.location='OrganizationReportReview.php?updateID=$currentreq_ref_ID';";

  $output .= '
    
            <tbody>   
                    <tr>
        
                        <td class="column2" id="contentTaD">'.$row["req_refID"].'</td>
                        <td class="column3" id="contentTaD">'.$row["req_givenname"].' '.$row["req_middlename"].' '.$row["req_lastname"].'</td>
                        <td class="column4" id="contentTaD">'.$row["req_email"].'</td>
                        <td class="column4" id="contentTaD">'.$row["asst_name"].'</td>
                        <td class="column5" id="contentTaD">'.$row["req_date"].'</td>
                        <td class="column6" id="contentTaD">'.$row["req_status"].'</td>
                    </tr>
            </tbody>
 
  ';
 }
 $output .= '

</table>
</form>

<button  class="button-quatary print" style="margin-top:.2%;" onClick='.$clickPDF.' class="btn btn-success">
<object data="../resources/assets/icons/print.svg" width="20" height="20"></object>Print Report
</button>

<ul class="pagination" >
 ';

$query= $_SESSION['currentQuery'];
$result=mysqli_query($conn,$query);
$total_records=mysqli_num_rows($result);                  
$total_pages=ceil($total_records/$_SESSION['numpageRep']);
  $i = 1;
 $nextI= $_SESSION['currentPage_3'] + 1;
 $backI= $_SESSION['currentPage_3'] - 1;

          if($_SESSION['currentPage_3'] == 1){
           if($total_pages == 1){
            $output .= '
               
               <li class="page-item"><a class="page-link" 
               style="background-color:hsl(218, 72%, 18%);color:white;" href="OrganizationReport.php?page='.$_SESSION['currentPage_3'].'">'.$_SESSION['currentPage_3'].'</a></li>
               
            
               ';
            }
            else{
           $output .= '
               
               <li class="page-item"><a class="page-link" 
               style="background-color:hsl(218, 72%, 18%);color:white;" href="OrganizationReport.php?page='.$_SESSION['currentPage_3'].'">'.$_SESSION['currentPage_3'].'</a></li>
               
               <li class="page-item"><a class="page-link"href="OrganizationReport.php?page='.$nextI.'">></a></li>
               
               <li class="page-item"><a class="page-link"href="OrganizationReport.php?page='.$total_pages.'">>></a></li>
            
               ';
          }
          }
  		  else if($_SESSION['currentPage_3'] == $total_pages){
          $output .= '
          	<li class="page-item"><a class="page-link"href="OrganizationReport.php?page=1"><<</a></li>
          
               <li class="page-item"><a class="page-link"href="OrganizationReport.php?page='.$backI.'"><</a></li>
               
               <li class="page-item"><a class="page-link" 
               style="background-color:hsl(218, 72%, 18%);color:white;" href="OrganizationReport.php?page='.$_SESSION['currentPage_3'].'">'.$_SESSION['currentPage_3'].'</a></li>
               
               ';
          }
  		  else{
            $output .= '
               <li class="page-item"><a class="page-link"href="OrganizationReport.php?page=1"><<</a></li>
            
               <li class="page-item"><a class="page-link"href="OrganizationReport.php?page='.$backI.'"><</a></li>

               <li class="page-item"><a class="page-link" 
               style="background-color:hsl(218, 72%, 18%);color:white;" href="OrganizationReport.php?page='.$_SESSION['currentPage_3'].'">'.$_SESSION['currentPage_3'].'</a></li>
               
               <li class="page-item"><a class="page-link"href="OrganizationReport.php?page='.$nextI.'">></a></li>
               
               <li class="page-item"><a class="page-link"href="OrganizationReport.php?page='.$total_pages.'">>></a></li>
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