<?php
//donut chart data

$querytotal= "SELECT * FROM organizations";
$resulttotal=mysqli_query($conn,$querytotal);
$total_records=mysqli_num_rows($resulttotal);  

$queryAcc= "SELECT * FROM organizations WHERE org_status ='ACTIVE'";
$resultAcc=mysqli_query($conn,$queryAcc);
$total_recordsAcc=mysqli_num_rows($resultAcc);  
$total_recordsAccPercent = $total_recordsAcc;

$queryDec= "SELECT * FROM organizations WHERE org_status ='INACTIVE'";
$resultDec=mysqli_query($conn,$queryDec);
$total_recordsDec=mysqli_num_rows($resultDec);  
$total_recordsDecPercent = $total_recordsDec;

$queryPen= "SELECT * FROM organizations WHERE org_status ='PENDING'";
$resultPen=mysqli_query($conn,$queryPen);
$total_recordsPen=mysqli_num_rows($resultPen);  
$total_recordsPenPercent = $total_recordsPen;

$data[] = $total_recordsAcc;
$data[] = $total_recordsDec;
$data[] = $total_recordsPen;

//bar chart data

$queryJan= "SELECT * FROM organizations WHERE month(org_date)='01'";
$resultDatesJan=mysqli_query($conn,$queryJan);
$total_Jan=mysqli_num_rows($resultDatesJan);  

$queryFeb= "SELECT * FROM organizations WHERE month(org_date)='02'";
$resultDatesFeb=mysqli_query($conn,$queryFeb);
$total_Feb=mysqli_num_rows($resultDatesFeb);  

$queryMar= "SELECT * FROM organizations WHERE month(org_date)='03'";
$resultDatesMar=mysqli_query($conn,$queryMar);
$total_Mar=mysqli_num_rows($resultDatesMar);  

$queryApr= "SELECT * FROM organizations WHERE month(org_date)='04'";
$resultDatesApr=mysqli_query($conn,$queryApr);
$total_Apr=mysqli_num_rows($resultDatesApr);  

$queryMay= "SELECT * FROM organizations WHERE month(org_date)='05'";
$resultDatesMay=mysqli_query($conn,$queryMay);
$total_May=mysqli_num_rows($resultDatesMay);  

$queryJun= "SELECT * FROM organizations WHERE month(org_date)='06'";
$resultDatesJun=mysqli_query($conn,$queryJun);
$total_Jun=mysqli_num_rows($resultDatesJun);  

$queryJul= "SELECT * FROM organizations WHERE month(org_date)='07'";
$resultDatesJul=mysqli_query($conn,$queryJul);
$total_Jul=mysqli_num_rows($resultDatesJul);  

$queryAug= "SELECT * FROM organizations WHERE month(org_date)='08'";
$resultDatesAug=mysqli_query($conn,$queryAug);
$total_Aug=mysqli_num_rows($resultDatesAug);  

$querySep= "SELECT * FROM organizations WHERE month(org_date)='09'";
$resultDatesSep=mysqli_query($conn,$querySep);
$total_Sep=mysqli_num_rows($resultDatesSep);  

$queryOct= "SELECT * FROM organizations WHERE month(org_date)='10'";
$resultDatesOct=mysqli_query($conn,$queryOct);
$total_Oct=mysqli_num_rows($resultDatesOct);  

$queryNov= "SELECT * FROM organizations WHERE month(org_date)='11'";
$resultDatesNov=mysqli_query($conn,$queryNov);
$total_Nov=mysqli_num_rows($resultDatesNov);  

$queryDec= "SELECT * FROM organizations WHERE month(org_date)='12'";
$resultDatesDec=mysqli_query($conn,$queryDec);
$total_Dec=mysqli_num_rows($resultDatesDec);  


$dataDate[] = $total_Sep;
$dataDate[] = $total_Oct;
$dataDate[] = $total_Nov;
$dataDate[] = $total_Dec;
$dataDate[] = $total_Jan;
$dataDate[] = $total_Feb;
$dataDate[] = $total_Mar;
$dataDate[] = $total_Apr;
$dataDate[] = $total_May;
$dataDate[] = $total_Jun;
$dataDate[] = $total_Jul;
$dataDate[] = $total_Aug;
?>