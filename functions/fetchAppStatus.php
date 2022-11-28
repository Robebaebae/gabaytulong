<?php
$request_ref = $_GET["updateId"]; 
$_SESSION["currentRequest"] = $request_ref;

$sql = 'SELECT * FROM requests INNER JOIN assistance_offered ON requests.asst_id = assistance_offered.asst_id INNER JOIN organizations ON requests.org_id = organizations.org_id';

$result = mysqli_query($conn, $sql);

//fetch the resulting rows 
$request_details = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach($request_details as $request_detail){
    $current_request = $request_detail['req_refID'];
    if($current_request == $request_ref)
    {
        $currentRequest = $request_detail['req_refID'];
        $currentOrg = $request_detail['org_name'];
        $currentAsstID = $request_detail['asst_id'];
        $currentAsstName = $request_detail['asst_name'];
        $currentGivenName = $request_detail['req_givenname'];
        $currentMiddleName = $request_detail['req_middlename'];
        $currentLastName = $request_detail['req_lastname'];
        $currentEmail = $request_detail['req_email'];
        $currentContact = $request_detail['req_contact'];
        $currentAddress = $request_detail['req_address'];
        $currentreq_1 = $request_detail['req_1'];
        $currentreq_2 = $request_detail['req_2'];
        $currentreq_3 = $request_detail['req_3'];
        $currentreq_4 = $request_detail['req_4'];
        $currentreq_5 = $request_detail['req_5'];
        $currentreq_6 = $request_detail['req_6'];
        $currentreq_7 = $request_detail['req_7'];
        $currentreq_8 = $request_detail['req_8'];
        $currentreq_9 = $request_detail['req_9'];
        $currentreq_10 = $request_detail['req_10'];
        $currentstatus = $request_detail['req_status'];
        $currentdate = $request_detail['req_date'];
        $currentremarks = $request_detail['req_remarks'];
    }
}

?>