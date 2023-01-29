<?php

$conn = mysqli_connect('localhost','root','','gabaytulong');
$querytotal= "SELECT * FROM requests INNER JOIN assistance_offered ON requests.asst_id = assistance_offered.asst_id";
$total=mysqli_query($conn,$querytotal);
$total_records=mysqli_num_rows($total);   

$querytotalorg= "SELECT * FROM assistance_offered";
$totalorg=mysqli_query($conn,$querytotalorg);
$total_records_org=mysqli_num_rows($totalorg);  

$querytotalben= "SELECT * FROM requests INNER JOIN assistance_offered ON requests.asst_id = assistance_offered.asst_id WHERE req_status='APPROVED'";
$totalben=mysqli_query($conn,$querytotalben);
$total_records_ben=mysqli_num_rows($totalben); 

$querytotalactive= "SELECT * FROM organizations WHERE org_status='ACTIVE'";
$totalactive=mysqli_query($conn,$querytotalactive);
$total_records_active=mysqli_num_rows($totalactive); 


$_SESSION['$total_records_ben'] = $total_records_ben;
$_SESSION['$total_processed'] = $total_records;
$_SESSION['$total_records_org'] = $total_records_org;
$_SESSION['$total_records_active'] = $total_records_active;
?>