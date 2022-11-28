<?php
//donut chart data


$querytotal= "SELECT * FROM requests INNER JOIN assistance_offered ON requests.asst_id = assistance_offered.asst_id WHERE requests.org_id = '$_SESSION[currentOrg]'";
$resulttotal=mysqli_query($conn,$querytotal);
$total_records=mysqli_num_rows($resulttotal);  

$queryAcc= "SELECT * FROM requests INNER JOIN assistance_offered ON requests.asst_id = assistance_offered.asst_id WHERE requests.org_id = '$_SESSION[currentOrg]' AND req_status ='APPROVED'";
$resultAcc=mysqli_query($conn,$queryAcc);
$total_recordsAcc=mysqli_num_rows($resultAcc);
if($total_recordsAcc == 0){
    $total_recordsAccPercent = 0;
}
else{
    $total_recordsAccPercent = $total_recordsAcc;
}


$queryDec= "SELECT * FROM requests INNER JOIN assistance_offered ON requests.asst_id = assistance_offered.asst_id WHERE requests.org_id = '$_SESSION[currentOrg]' AND req_status ='DECLINED'";
$resultDec=mysqli_query($conn,$queryDec);
$total_recordsDec=mysqli_num_rows($resultDec);  
if($total_recordsDec == 0){
    $total_recordsDecPercent = 0;
}
else{
    $total_recordsDecPercent = $total_recordsDec;
}


$queryPen= "SELECT * FROM requests INNER JOIN assistance_offered ON requests.asst_id = assistance_offered.asst_id WHERE requests.org_id = '$_SESSION[currentOrg]' AND req_status ='PENDING'";
$resultPen=mysqli_query($conn,$queryPen);
$total_recordsPen=mysqli_num_rows($resultPen);  
if($total_recordsPen == 0){
    $total_recordsPenPercent = 0;
}
else{
    $total_recordsPenPercent = $total_recordsPen;
}


$data[] = $total_recordsAcc;
$data[] = $total_recordsDec;
$data[] = $total_recordsPen;

//bar chart data

$queryJan= "SELECT * FROM requests INNER JOIN assistance_offered ON requests.asst_id = assistance_offered.asst_id WHERE requests.org_id = '$_SESSION[currentOrg]' AND month(req_date)='01'";
$resultDatesJan=mysqli_query($conn,$queryJan);
$total_Jan=mysqli_num_rows($resultDatesJan);  

$queryFeb= "SELECT * FROM requests INNER JOIN assistance_offered ON requests.asst_id = assistance_offered.asst_id WHERE requests.org_id = '$_SESSION[currentOrg]' AND month(req_date)='02'";
$resultDatesFeb=mysqli_query($conn,$queryFeb);
$total_Feb=mysqli_num_rows($resultDatesFeb);  

$queryMar= "SELECT * FROM requests INNER JOIN assistance_offered ON requests.asst_id = assistance_offered.asst_id WHERE requests.org_id = '$_SESSION[currentOrg]' AND month(req_date)='03'";
$resultDatesMar=mysqli_query($conn,$queryMar);
$total_Mar=mysqli_num_rows($resultDatesMar);  

$queryApr= "SELECT * FROM requests INNER JOIN assistance_offered ON requests.asst_id = assistance_offered.asst_id WHERE requests.org_id = '$_SESSION[currentOrg]' AND month(req_date)='04'";
$resultDatesApr=mysqli_query($conn,$queryApr);
$total_Apr=mysqli_num_rows($resultDatesApr);  

$queryMay= "SELECT * FROM requests INNER JOIN assistance_offered ON requests.asst_id = assistance_offered.asst_id WHERE requests.org_id = '$_SESSION[currentOrg]' AND month(req_date)='05'";
$resultDatesMay=mysqli_query($conn,$queryMay);
$total_May=mysqli_num_rows($resultDatesMay);  

$queryJun= "SELECT * FROM requests INNER JOIN assistance_offered ON requests.asst_id = assistance_offered.asst_id WHERE requests.org_id = '$_SESSION[currentOrg]' AND month(req_date)='06'";
$resultDatesJun=mysqli_query($conn,$queryJun);
$total_Jun=mysqli_num_rows($resultDatesJun);  

$queryJul= "SELECT * FROM requests INNER JOIN assistance_offered ON requests.asst_id = assistance_offered.asst_id WHERE requests.org_id = '$_SESSION[currentOrg]' AND month(req_date)='07'";
$resultDatesJul=mysqli_query($conn,$queryJul);
$total_Jul=mysqli_num_rows($resultDatesJul);  

$queryAug= "SELECT * FROM requests INNER JOIN assistance_offered ON requests.asst_id = assistance_offered.asst_id WHERE requests.org_id = '$_SESSION[currentOrg]' AND month(req_date)='08'";
$resultDatesAug=mysqli_query($conn,$queryAug);
$total_Aug=mysqli_num_rows($resultDatesAug);  

$querySep= "SELECT * FROM requests INNER JOIN assistance_offered ON requests.asst_id = assistance_offered.asst_id WHERE requests.org_id = '$_SESSION[currentOrg]' AND month(req_date)='09'";
$resultDatesSep=mysqli_query($conn,$querySep);
$total_Sep=mysqli_num_rows($resultDatesSep);  

$queryOct= "SELECT * FROM requests INNER JOIN assistance_offered ON requests.asst_id = assistance_offered.asst_id WHERE requests.org_id = '$_SESSION[currentOrg]' AND month(req_date)='10'";
$resultDatesOct=mysqli_query($conn,$queryOct);
$total_Oct=mysqli_num_rows($resultDatesOct);  

$queryNov= "SELECT * FROM requests INNER JOIN assistance_offered ON requests.asst_id = assistance_offered.asst_id WHERE requests.org_id = '$_SESSION[currentOrg]' AND month(req_date)='11'";
$resultDatesNov=mysqli_query($conn,$queryNov);
$total_Nov=mysqli_num_rows($resultDatesNov);  

$queryDec= "SELECT * FROM requests INNER JOIN assistance_offered ON requests.asst_id = assistance_offered.asst_id WHERE requests.org_id = '$_SESSION[currentOrg]' AND month(req_date)='12'";
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