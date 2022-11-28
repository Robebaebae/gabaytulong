<?php

$sql = 'SELECT * FROM requests INNER JOIN assistance_offered ON requests.asst_id = assistance_offered.asst_id';

$result = mysqli_query($conn, $sql);

//fetch the resulting rows 
$current_requestor_details = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach($current_requestor_details as $current_requestor_detail){

    $current_organization = $current_requestor_detail['req_refID'];

    if($current_organization == $_SESSION["currentReq_ID"])
    {
        $currentreq_fullname = $current_requestor_detail['req_givenname'].' '.$current_requestor_detail['req_middlename'].' '.$current_requestor_detail['req_lastname'];
        $currentreq_req_email = $current_requestor_detail['req_email'];
        $currentreq_req_contact= $current_requestor_detail['req_contact'];
        $currentreq_req_address = $current_requestor_detail['req_address'];
        $currentreq_req_date = $current_requestor_detail['req_date'];
        $currentreq_req_1 = $current_requestor_detail['req_1'];
        $currentreq_req_2 = $current_requestor_detail['req_2'];
        $currentreq_req_3 = $current_requestor_detail['req_3'];
        $currentreq_req_4 = $current_requestor_detail['req_4'];
        $currentreq_req_5 = $current_requestor_detail['req_5'];
        $currentreq_req_6 = $current_requestor_detail['req_6'];
        $currentreq_req_7 = $current_requestor_detail['req_7'];
        $currentreq_req_8 = $current_requestor_detail['req_8'];
        $currentreq_req_9 = $current_requestor_detail['req_9'];
        $currentreq_req_10 = $current_requestor_detail['req_10'];
        $currentreq_status = $current_requestor_detail['req_status'];
        $currentreq_req_type = $current_requestor_detail['asst_name'];
        $currentreq_title_1 = $current_requestor_detail['asst_req1'];
        $currentreq_title_2 = $current_requestor_detail['asst_req2'];
        $currentreq_title_3 = $current_requestor_detail['asst_req3'];
        $currentreq_title_4 = $current_requestor_detail['asst_req4'];
        $currentreq_title_5 = $current_requestor_detail['asst_req5'];
        $currentreq_title_6 = $current_requestor_detail['asst_req6'];
        $currentreq_title_7 = $current_requestor_detail['asst_req7'];
        $currentreq_title_8 = $current_requestor_detail['asst_req8'];
        $currentreq_title_9 = $current_requestor_detail['asst_req9'];
        $currentreq_title_10 = $current_requestor_detail['asst_req10'];

    }
}

if(isset($_POST['accept'])){
$remarks = $_POST['fetchVal']." ".$_POST['otherVal'];
$status = "APPROVED";
$currentReqID = $_SESSION["currentReq_ID"];

$query = "UPDATE requests SET req_status='$status',req_remarks='$remarks' WHERE req_refID='$currentReqID'"; 
$update = mysqli_query($conn, $query);

if($update){
    header( "Location: ../phpmailer-main/sendEmail.php?updateID=$currentReqID");
}

}

if(isset($_POST['decline'])){
    $remarks = $_POST['fetchVal']." ".$_POST['otherVal'];
    $status = "DECLINED";
    $currentReqID = $_SESSION["currentReq_ID"];
    $query = "UPDATE requests SET req_status='$status',req_remarks='$remarks' WHERE req_refID='$currentReqID'"; 
    
    $update = mysqli_query($conn, $query);

if($update){
    header( "Location: ../phpmailer-main/sendEmailDenied.php?updateID=$currentReqID");
}
    
}

?>