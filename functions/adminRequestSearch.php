<?php
//fetch.php
session_start();
include('../sqlqueries/dbConnect.php');

$num_per_page = $_SESSION['numpage'];
$start_from = $_SESSION['start_from'];
$querryLimit = "LIMIT $start_from,$num_per_page";
$output = '';


if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $_SESSION['currentSearchFilter'] = $search;
 $query = "
  SELECT * FROM organizations 
  WHERE (org_name LIKE '%".$search."%'
  OR org_admin LIKE '%".$search."%' 
  OR org_adminemail LIKE '%".$search."%')
  AND (org_status = 'ACTIVE' or org_status = 'INACTIVE')
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

else
{
 $query = "
 SELECT * FROM organizations WHERE (org_status = 'ACTIVE' OR org_status = 'INACTIVE') ORDER BY org_date
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
                
                                        <th class="column1">Organiztion ID</th>
                                        <th class="column2">Organization Name</th>
                                        <th class="column3">Organization Admin</th>
                                        <th class="column4">Organization Email</th>
                                        <th class="column5">Organization Status</th>
                                    
                                </tr>
                                    
 ';
 while($row = mysqli_fetch_array($result))
 {
  $currentreq_org_id = $row['org_id'];
  $clickLink = "window.location='SuperAdminOrganizationsReview.php?updateID=$currentreq_org_id';";
   
  $current_req_status = $row["org_status"];
  if( $current_req_status == "ACTIVE"){
    $req_status = "<td class='column6 approved' id='contentTD' onClick='.$clickLink.'>$current_req_status</td>";
  }

  else if( $current_req_status == "INACTIVE"){
    $req_status = "<td class='column6 declined' id='contentTD' onClick='.$clickLink.'>$current_req_status</td>";
  }


  $output .= '
    
                        <tbody>   
                                <tr>
                                        <td class="column1" id="contentTD" onClick='.$clickLink.'>'.$row["org_id"].'</td>
                                        <td class="column2" id="contentTD" onClick='.$clickLink.'>'.$row["org_name"].'</td>
                                        <td class="column3" id="contentTD" onClick='.$clickLink.'>'.$row["org_admin"].'</td>
                                        <td class="column4" id="contentTD" onClick='.$clickLink.'>'.$row["org_adminEmail"].'</td>
                                        '.$req_status.'
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
 $nextI= $_SESSION['currentPage_4'] + 1;
 $backI= $_SESSION['currentPage_4'] - 1;

          if($_SESSION['currentPage_4'] == 1){
           if($total_pages == 1){
            $output .= '
               
               <li class="page-item"><a class="page-link" 
               style="background-color:hsl(218, 72%, 18%);color:white;" href="SuperAdminOrganizations.php?page='.$_SESSION['currentPage_4'].'">'.$_SESSION['currentPage_4'].'</a></li>
               
            
               ';
            }
            else{
           $output .= '
               
               <li class="page-item"><a class="page-link" 
               style="background-color:hsl(218, 72%, 18%);color:white;" href="SuperAdminOrganizations.php?page='.$_SESSION['currentPage_4'].'">'.$_SESSION['currentPage_4'].'</a></li>
               
               <li class="page-item"><a class="page-link"href="SuperAdminOrganizations.php?page='.$nextI.'">></a></li>
               
               <li class="page-item"><a class="page-link"href="SuperAdminOrganizations.php?page='.$total_pages.'">>></a></li>
            
               ';
          }
          }
  		  else if($_SESSION['currentPage_4'] == $total_pages){
          $output .= '
          	<li class="page-item"><a class="page-link"href="SuperAdminOrganizations.php?page=1"><<</a></li>
          
               <li class="page-item"><a class="page-link"href="SuperAdminOrganizations.php?page='.$backI.'"><</a></li>
               
               <li class="page-item"><a class="page-link" 
               style="background-color:hsl(218, 72%, 18%);color:white;" href="SuperAdminOrganizations.php?page='.$_SESSION['currentPage_4'].'">'.$_SESSION['currentPage_4'].'</a></li>
               
               ';
          }
  		  else{
            $output .= '
               <li class="page-item"><a class="page-link"href="SuperAdminOrganizations.php?page=1"><<</a></li>
            
               <li class="page-item"><a class="page-link"href="SuperAdminOrganizations.php?page='.$backI.'"><</a></li>

               <li class="page-item"><a class="page-link" 
               style="background-color:hsl(218, 72%, 18%);color:white;" href="SuperAdminOrganizations.php?page='.$_SESSION['currentPage_4'].'">'.$_SESSION['currentPage_4'].'</a></li>
               
               <li class="page-item"><a class="page-link"href="SuperAdminOrganizations.php?page='.$nextI.'">></a></li>
               
               <li class="page-item"><a class="page-link"href="SuperAdminOrganizations.php?page='.$total_pages.'">>></a></li>
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