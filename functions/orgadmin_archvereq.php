<?php
session_start();
include('../sqlqueries/dbConnect.php');

$asst_id = $_GET["updateID"]; 
$_SESSION["asst_id"] = $asst_id;


            $asst_status = "ARCHIVED";
           
            $sql = "UPDATE assistance_offered SET asst_status='$asst_status' WHERE asst_id='$asst_id'"; 
           
            if(mysqli_query($conn, $sql)){
                // success
                header('Location: ../functions/funcOrganizationAssistanceArchiveAct.php');
                mysqli_close($conn);
            } else {
                echo 'query error: '. mysqli_error($conn);
            }




?>