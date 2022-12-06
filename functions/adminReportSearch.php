<?php
//fetch.php
session_start();
include('../sqlqueries/dbConnect.php');



$num_per_page = $_SESSION['numpage'];
$start_from = $_SESSION['start_from'];
$querryLimit = "LIMIT $start_from,$num_per_page";
$output = '';
$clickPDF = "window.location='../functions/reportPDFAdmin.php';";

if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $_SESSION['currentSearchFilter'] = $search;
 $query = "
  SELECT * FROM organizations 
  WHERE org_name LIKE '%".$search."%'
  OR org_admin LIKE '%".$search."%' 
  OR org_adminemail LIKE '%".$search."%' 
 ";
}

else if(isset($_POST["request"]))
{
 if($_POST["request"]=="All"){
    $query = "
    SELECT * FROM organizations WHERE (org_status = 'ACTIVE' OR org_status = 'INACTIVE') ORDER BY org_date
    ";
 }
 else{
 $filter = mysqli_real_escape_string($conn, $_POST["request"]);
 $_SESSION['currentSearchFilter'] = $filter;
 $query = "
  SELECT * FROM organizations
  WHERE org_status = '".$filter."'  
  ";}
}

else if(isset($_POST["start_date"])){
    $start_date = $_POST['start_date'];
    $_SESSION['start_date'] = $start_date;  
    
    $query = "
    SELECT * FROM organizations WHERE org_status = 'NONE'
    ";
}

else if(isset($_POST["end_date"])){
    $end_date = $_POST['end_date'];
    $_SESSION['end_date'] = $end_date;


    if($_SESSION['start_date']!=" "){
      $query = "
    SELECT * FROM organizations
    WHERE (org_date BETWEEN '". $_SESSION['start_date']."' AND '". $_SESSION['end_date']."')
    ";  
    }
        
}


else
{
  if($_SESSION["current_report_admin"] != ""){
  
   $query = "
   SELECT * FROM organizations WHERE org_status = '". $_SESSION['current_report_admin']."'
   ";
  }
  else{
    $query = "
   SELECT * FROM organizations 
   ";
  }
  
 
}


$_SESSION['currentQuery'] = $query;
$current_date = date("Y/m/d");
$_SESSION['currentdate'] = $current_date;
$newQuery = $query.$querryLimit;
$_SESSION['newQueryAdmin'] = $newQuery;
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
                            
                                                <th class="column1">Organiztion ID</th>
                                                <th class="column2">Organization Name</th>
                                                <th class="column3">Organization Admin</th>
                                                <th class="column4">Organization Email</th>
                                                <th class="column5">Organization Status</th>
                                                <th class="column6">Organization Join Date</th>
                                        
                        </tr>
                                    
 ';
 while($row = mysqli_fetch_array($result))
 {
  $currentreq_org_id = $row['org_id'];
  $clickLink = "window.location='SuperAdminReportsView.php?updateID=$currentreq_org_id';";

  $output .= '
    
                <tbody>   
                        <tr>
                                                <td id="contentTD" onClick='.$clickLink.'>'.$row["org_id"].'</td>
                                                <td id="contentTD" onClick='.$clickLink.'>'.$row["org_name"].'</td>
                                                <td id="contentTD" onClick='.$clickLink.'>'.$row["org_admin"].'</td>
                                                <td id="contentTD" onClick='.$clickLink.'>'.$row["org_adminEmail"].'</td>
                                                <td id="contentTD" onClick='.$clickLink.'>'.$row["org_status"].'</td>
                                                <td id="contentTD" onClick='.$clickLink.'>'.$row["org_date"].'</td>
                        </tr>
                </tbody>
 
  '
  ;
 }
 $output .= '

 </table>
 </form>
 <button class="button-quatary print" onClick='.$clickPDF.' class="btn btn-success">
 <object data="../resources/assets/icons/print.svg" width="20" height="20"></object>Print Report
 </button>
 
 

 <ul class="pagination" >
  ';
 
 $query= $_SESSION['currentQuery'];
 $result=mysqli_query($conn,$query);
 $total_records=mysqli_num_rows($result);                  
 $total_pages=ceil($total_records/$_SESSION['numpage']);
      $i = 1;
 $nextI= $_SESSION['currentPage_6'] + 1;
 $backI= $_SESSION['currentPage_6'] - 1;

          if($_SESSION['currentPage_6'] == 1){
           if($total_pages == 1){
            $output .= '
               
               <li class="page-item"><a class="page-link" 
               style="background-color:hsl(218, 72%, 18%);color:white;" href="SuperAdminReports.php?page='.$_SESSION['currentPage_6'].'">'.$_SESSION['currentPage_6'].'</a></li>
               
            
               ';
            }
            else{
           $output .= '
               
               <li class="page-item"><a class="page-link" 
               style="background-color:hsl(218, 72%, 18%);color:white;" href="SuperAdminReports.php?page='.$_SESSION['currentPage_6'].'">'.$_SESSION['currentPage_6'].'</a></li>
               
               <li class="page-item"><a class="page-link"href="SuperAdminReports.php?page='.$nextI.'">></a></li>
               
               <li class="page-item"><a class="page-link"href="SuperAdminReports.php?page='.$total_pages.'">>></a></li>
            
               ';
          }
          }
  		  else if($_SESSION['currentPage_6'] == $total_pages){
          $output .= '
          	<li class="page-item"><a class="page-link"href="SuperAdminReports.php?page=1"><<</a></li>
          
               <li class="page-item"><a class="page-link"href="SuperAdminReports.php?page='.$backI.'"><</a></li>
               
               <li class="page-item"><a class="page-link" 
               style="background-color:hsl(218, 72%, 18%);color:white;" href="SuperAdminReports.php?page='.$_SESSION['currentPage_6'].'">'.$_SESSION['currentPage_6'].'</a></li>
               
               ';
          }
  		  else{
            $output .= '
               <li class="page-item"><a class="page-link"href="SuperAdminReports.php?page=1"><<</a></li>
            
               <li class="page-item"><a class="page-link"href="SuperAdminReports.php?page='.$backI.'"><</a></li>

               <li class="page-item"><a class="page-link" 
               style="background-color:hsl(218, 72%, 18%);color:white;" href="SuperAdminReports.php?page='.$_SESSION['currentPage_6'].'">'.$_SESSION['currentPage_6'].'</a></li>
               
               <li class="page-item"><a class="page-link"href="SuperAdminReports.php?page='.$nextI.'">></a></li>
               
               <li class="page-item"><a class="page-link"href="SuperAdminReports.php?page='.$total_pages.'">>></a></li>
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
    echo '<br><h4>Data Not Found<h4><br>';
}

?>