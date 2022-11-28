<?php
session_start();
include('../sqlqueries/dbConnect.php');

if(isset($_POST["stud_archive_btn"]) && isset($_POST["stud_archive"])){

    foreach($_POST["stud_archive"] as $updateId){
    $query = "UPDATE requests SET req_archive = 'UNARCHIVED' WHERE req_refID = '$updateId'";
    $query_run = mysqli_query($conn, $query);
    }

    if($query_run)
    {
        $_SESSION['status'] = "Multiple Data Deleted Successfully";
        header("Location: ../functions/orgAsstUnarchiveAct.php");
    }
  }

?>