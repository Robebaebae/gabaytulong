<?php
session_start();
include('../sqlqueries/dbConnect.php');

$querytotal= "SELECT * FROM requests";
$resulttotal=mysqli_query($conn,$querytotal);
$total_records=mysqli_num_rows($resulttotal);  

$_SESSION['$total_processed'] = $total_records;
?>

