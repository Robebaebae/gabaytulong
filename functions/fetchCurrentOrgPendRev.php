<?php

$sql = 'SELECT * FROM organizations';

$result = mysqli_query($conn, $sql);

//fetch the resulting rows 
$current_requestor_details = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach($current_requestor_details as $current_requestor_detail){

    $current_organization = $current_requestor_detail['org_id'];
    $_SESSION['selectedOrg']= $current_organization;

    if($current_organization == $_SESSION["currentOrg_ID"])
    {
        $currentorg_id = $current_requestor_detail['org_id'];
        $currentorg_dp = $current_requestor_detail['org_dp'];
        $currentorg_name = $current_requestor_detail['org_name'];
        $currentorg_contact = $current_requestor_detail['org_contact'];
        $currentorg_address = $current_requestor_detail['org_address'];
        $currentorg_admin = $current_requestor_detail['org_admin'];
        $currentorg_adminEmail = $current_requestor_detail['org_adminEmail'];
        $currentorg_adminID = $current_requestor_detail['org_adminID'];
        $currentorg_status = $current_requestor_detail['org_status'];
        $currentorg_remarks = $current_requestor_detail['org_remarks'];
      

    }
}

if(isset($_POST['accept'])){
  $remarks = $_POST['fetchVal']." ".$_POST['otherVal'];
  $status = "ACTIVE";
  $currentReqID = $_SESSION["currentReq_ID"];
  $genPassword = strtoupper(uniqid(TRUE));
  $query = "UPDATE organizations SET org_status='$status',org_adminPassword='$genPassword',org_remarks='$remarks' WHERE org_id ='$currentorg_id'"; 
  $update = mysqli_query($conn, $query);

  if($update){
      header( "Location: ../phpmailer-main/sendEmailOrg.php?updateID=$currentReqID");
  }
}

if(isset($_POST['decline'])){
  $remarks =  $_POST['fetchVal']." ".$_POST['otherVal'];
  $status = "DECLINED";
  $currentReqID = $_SESSION["currentReq_ID"];
  $query = "UPDATE  organizations SET org_status='$status',org_remarks='$remarks' WHERE org_id ='$currentorg_id'"; 
  $update = mysqli_query($conn, $query);
  
  if($update){
      header( "Location: ../phpmailer-main/sendEmailOrgDecline.php?updateID=$currentReqID");
  }   
}

?>