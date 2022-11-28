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
  SELECT * FROM activity_log 
  WHERE actlog_id LIKE '%".$search."%'
  OR org_admin LIKE '%".$search."%' 
  OR activity LIKE '%".$search."%' 
  OR act_date LIKE '%".$search."%' 
  ORDER BY act_date
 ";
}
else if(isset($_POST["request"]))
{
    if($_POST["request"]=="All"){
        $query = "
        SELECT * FROM activity_log WHERE org_id = '".$_SESSION['currentOrg']."' ORDER BY act_date
        ";
    }

    else{
    $filter = mysqli_real_escape_string($conn, $_POST["request"]);
    $_SESSION['currentSearchFilter'] = $filter;
    $query = "
    SELECT * FROM activity_log 
    WHERE activity LIKE '%".$filter."%' AND org_id = '".$_SESSION['currentOrg']."'  
    ORDER BY act_date
    ";}
}

else if(isset($_POST["start_dateact"])){
    $start_date = $_POST['start_dateact'];
    $_SESSION['start_dateorgAct'] = $start_date;  
    
    $query = "
    SELECT * FROM activity_log WHERE activity = 'NONE' AND org_id = '".$_SESSION['currentOrg']."'
    ";
}

else if(isset($_POST["end_dateact"])){
    $end_date = $_POST['end_dateact'];
    $_SESSION['end_dateorgAct'] = $end_date;

    if($_SESSION['start_dateorgAct']!=""){
    $query = "
    SELECT * FROM activity_log WHERE (act_date BETWEEN '".$_SESSION['start_dateorgAct']."' AND '".$_SESSION['end_dateorgAct']."') AND org_id = '".$_SESSION['currentOrg']."'
    ";  
    }
        
}

else
{
 $query = "
 SELECT * FROM activity_log WHERE org_id = '".$_SESSION['currentOrg']."' ORDER BY act_date
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
                        <th class="column1">Activity Log ID</th>
                        <th class="column2">Organization Admin</th>
                        <th class="column3">Activity</th>
                        <th class="column6">Date</th>
                    </tr>
                </thead>
                                    
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
    
                <tbody>   
                        <tr>
                            <td class="column1">'.$row["actlog_id"].'</td>
                            <td class="column2">'.$row["org_admin"].'</td>
                            <td class="column3">'.$row["activity"].'</td>
                            <td class="column6">'.$row["act_date"].'</td>
                    
                        </tr>
                </tbody>
            
  '
  ;
 }
 $output .= '
 

 </table>
 </form>
 
 

 <ul class="pagination">
  ';
 
 $query= $_SESSION['currentQuery'];
 $result=mysqli_query($conn,$query);
 $total_records=mysqli_num_rows($result);                  
 $total_pages=ceil($total_records/$_SESSION['numpage']);
 
 $i = 1;
 $nextI= $_SESSION['numpage_current'] + 1;
 $backI= $_SESSION['numpage_current'] - 1;

        
          if($_SESSION['numpage_current'] == 1){
           $output .= '
               
              	<li class="page-item"><a class="page-link" 
               style="background-color:hsl(218, 72%, 18%);color:white;" href="OrganizationActivityLog.php?page='.$_SESSION['numpage_current'].'">'.$_SESSION['numpage_current'].'</a></li>
               
               <li class="page-item"><a class="page-link"href="OrganizationActivityLog.php?page='.$nextI.'">></a></li>
               
               <li class="page-item"><a class="page-link"href="OrganizationActivityLog.php?page='.$total_pages.'">>></a></li>
            
               ';
          }
  		  else if($_SESSION['numpage_current'] == $total_pages){
          $output .= '
          	<li class="page-item"><a class="page-link"href="OrganizationActivityLog.php?page=1"><<</a></li>
          
               <li class="page-item"><a class="page-link"href="OrganizationActivityLog.php?page='.$backI.'"><</a></li>
               
               <li class="page-item"><a class="page-link" 
               style="background-color:hsl(218, 72%, 18%);color:white;" href="OrganizationActivityLog.php?page='.$_SESSION['numpage_current'].'">'.$_SESSION['numpage_current'].'</a></li>
               
               ';
          }
  		  else{
            $output .= '
               <li class="page-item"><a class="page-link"href="OrganizationActivityLog.php?page=1"><<</a></li>
            
               <li class="page-item"><a class="page-link"href="OrganizationActivityLog.php?page='.$backI.'"><</a></li>

               <li class="page-item"><a class="page-link" 
               style="background-color:hsl(218, 72%, 18%);color:white;" href="OrganizationActivityLog.php?page='.$_SESSION['numpage_current'].'">'.$_SESSION['numpage_current'].'</a></li>
               
               <li class="page-item"><a class="page-link"href="OrganizationActivityLog.php?page='.$nextI.'">></a></li>
               
               <li class="page-item"><a class="page-link"href="OrganizationActivityLog.php?page='.$total_pages.'">>></a></li>
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