<?php

$current_org_id = $_GET["updateID"]; 


$sql = 'SELECT * FROM organizations';

$result = mysqli_query($conn, $sql);

//fetch the resulting rows 
$currents = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach($currents as $current){

    $current_organization = $current['org_id'];

    if($current_organization == $current_org_id)
    {
        $currentorg_id = $current['org_id'];
        $currentorg_dp = $current['org_dp'];
        $currentorg_name = $current['org_name'];
        $currentorg_contact = $current['org_contact'];
        $currentorg_address = $current['org_address'];
        $currentorg_admin = $current['org_admin'];
        $currentorg_adminEmail = $current['org_adminEmail'];
        $currentorg_status = $current['org_status'];
    }
   
  
}

?>