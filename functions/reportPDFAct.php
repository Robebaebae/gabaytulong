<?php
session_start();
include('../sqlqueries/dbConnect.php');

$_SESSION["currentOrg"];

$sql = 'SELECT * FROM organizations';


//make query
$result = mysqli_query($conn, $sql);


//fetch the resulting rows 
$organization_details = mysqli_fetch_all($result, MYSQLI_ASSOC);


//print_r ($organizations);
foreach($organization_details as $organization_detail){
    
    $orgUnder = $organization_detail['org_id'];
   
    if($_SESSION["currentOrg"] == $orgUnder)
    {   
        $current_orgID = $organization_detail['org_id'];
        $current_admin = $organization_detail['org_admin'];
    }
}
$current_act_id = strtoupper(uniqid(TRUE));
$current_activity = "Printed Report";
$current_date = date("Y/m/d");


// create sql
$sql = "INSERT INTO activity_log
VALUES('$current_act_id','$current_orgID','$current_admin','$current_activity','$current_date')";

// save to db and check
if(mysqli_query($conn, $sql)){
    // success
    header('Location: ../functions/reportPDF.php');
} else {
    echo 'query error: '. mysqli_error($conn);
}

?>