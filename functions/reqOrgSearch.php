<?php
//fetch.php
session_start();
include('../sqlqueries/dbConnect.php');

$num_per_page = $_SESSION['numOrgpage'];
$start_from = $_SESSION['start_from_org'];
$querryLimit = "LIMIT $start_from,$num_per_page";
$output = '';
$_SESSION['currentSearchFilter'] = "All";
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $_SESSION['currentSearchFilter'] = $search;
 $query = "
  SELECT * FROM organizations
  WHERE org_name LIKE '%".$search."%' 
  OR org_details LIKE '%".$search."%' 
  AND org_status='ACTIVE' 
 ";
}
else
{
 $query = "
 SELECT * FROM organizations
 WHERE org_status='ACTIVE' 
 ";
}
$_SESSION['currentOrgQuery'] = $query;
$newQuery = $query.$querryLimit;
$result = mysqli_query($conn, $newQuery);

$organizations = mysqli_fetch_all($result, MYSQLI_ASSOC);
if(mysqli_num_rows($result) > 0){
    $output .= '
    <div id="current" class="organization-card-display" style="width:100%;" >

    ';
foreach($organizations as $organization){

    {
        $checkFunction = 'alert_phrase("phrase")';
        $clickAll = "window.alert('sometext');";
        $currentOrg = $organization['org_id'];
        $currentName = $organization['org_name'];
        $currentDetails = $organization['org_details'];
        $currentdp = $organization['org_dp'];
        $output .= '

  
            <div class="organization-card">
               <a href="OrganizationsDetails.php?updateId='.$currentOrg.'">
                <div class="organization-image-cropper">
                <img class="organization-image-cropper-inside" src="../org_displaypic/'.$currentdp.'" alt="Card image cap" >
                </div>
                <p class="organization-title-specific-org">'.$currentName.'</p>
                <p class="organization-title-specific-org-details">'.$currentDetails.'</p>
                <a class="button-secondary" href="OrganizationsDetails.php?updateId='.$currentOrg.'">Assistance offered</a>
            </div>
        </a>      
    ';}

        
    }

        $output .= '
        </div>
        <ul class="pagination" style="margin-left:49%;">
        ';
        
        $query= $_SESSION['currentOrgQuery'];
        $result=mysqli_query($conn,$query);
        $total_records=mysqli_num_rows($result);                  
        $total_pages=ceil($total_records/$_SESSION['numOrgpage']);

 $i = 1;
 $nextI= $_SESSION['currentPage_7'] + 1;
 $backI= $_SESSION['currentPage_7'] - 1;

        
          if($_SESSION['currentPage_7'] == 1){
           if($total_pages == 1){
            $output .= '
               
               <li class="page-item"><a class="page-link" 
               style="background-color:hsl(213, 79%, 47%);color:white;" href="Organizations.php?page='.$_SESSION['currentPage_7'].'">'.$_SESSION['currentPage_7'].'</a></li>
               
            
               ';
            }
            else{
           $output .= '
               
               <li class="page-item"><a class="page-link" 
                href="Organizations.php?page='.$_SESSION['currentPage_7'].'">'.$_SESSION['currentPage_7'].'</a></li>
               
               <li class="page-item"><a class="page-link"href="Organizations.php?page='.$nextI.'">></a></li>
               
               <li class="page-item"><a class="page-link"href="Organizations.php?page='.$total_pages.'">>></a></li>
            
               ';
          }}
  		  else if($_SESSION['currentPage_7'] == $total_pages){
          $output .= '
          	<li class="page-item"><a class="page-link"href="Organizations.php?page=1"><<</a></li>
          
               <li class="page-item"><a class="page-link"href="Organizations.php?page='.$backI.'"><</a></li>
               
               <li class="page-item"><a class="page-link" 
               href="Organizations.php?page='.$_SESSION['currentPage_7'].'">'.$_SESSION['currentPage_7'].'</a></li>
               
               ';
          }
  		  else{
            $output .= '
               <li class="page-item"><a class="page-link"href="Organizations.php?page=1"><<</a></li>
            
               <li class="page-item"><a class="page-link"href="Organizations.php?page='.$backI.'"><</a></li>

               <li class="page-item"><a class="page-link" 
                href="Organizations.php?page='.$_SESSION['currentPage_7'].'">'.$_SESSION['currentPage_7'].'</a></li>
               
               <li class="page-item"><a class="page-link"href="Organizations.php?page='.$nextI.'">></a></li>
               
               <li class="page-item"><a class="page-link"href="Organizations.php?page='.$total_pages.'">>></a></li>
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