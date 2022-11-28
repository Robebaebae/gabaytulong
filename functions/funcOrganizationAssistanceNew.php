<?php
$sql = 'SELECT * FROM assistance_offered';

$result = mysqli_query($conn, $sql);

$asst_name = $asst_desc = $req_1 = $req_2 =  $req_3 = $req_4 = $req_5 = $req_6 = $req_7 =  $req_8 = $req_9 = $req_10 = '';

$errors = array('asst_name' => '','asst_desc' => '','req_1' => '');

if(isset($_POST['submit'])){

        //Organization Name
        if(empty($_POST['asst_name'])){
            $errors['asst_name'] = 'An Organization Name is required';
        } else{
            $asst_name = $_POST['asst_name'];
        }

        //Organization Address
        if(empty($_POST['asst_desc'])){
            $errors['asst_desc'] = 'An Organization Address is required';
        } else{
            $asst_desc = $_POST['asst_desc'];
        }

        if(empty($_POST['req_1'])){
            $errors['req_1'] = 'Needs atleast one requirement!';
        } else{
            $req_1 = $_POST['req_1'];
        }
     
      
        if(array_filter($errors)){
            //echo 'errors in form';
            
        } else{
  
            $genRef = strtoupper(uniqid(true));

            $asst_name = mysqli_real_escape_string($conn, $_POST['asst_name']);
            $asst_desc = mysqli_real_escape_string($conn, $_POST['asst_desc']);
            $asst_orgID = mysqli_real_escape_string($conn, $_SESSION['organization']);
            $asst_status = "UNARCHIVED";
            $req_1 = mysqli_real_escape_string($conn, $_POST['req_1']);
            $req_2 = mysqli_real_escape_string($conn, $_POST['req_2']);
            $req_3 = mysqli_real_escape_string($conn, $_POST['req_3']);
            $req_4 = mysqli_real_escape_string($conn, $_POST['req_4']);
            $req_5 = mysqli_real_escape_string($conn, $_POST['req_5']);
            $req_6 = mysqli_real_escape_string($conn, $_POST['req_6']);
            $req_7 = mysqli_real_escape_string($conn, $_POST['req_7']);
            $req_8 = mysqli_real_escape_string($conn, $_POST['req_8']);
            $req_9 = mysqli_real_escape_string($conn, $_POST['req_9']);
            $req_10 = mysqli_real_escape_string($conn, $_POST['req_10']);

            $sql = "INSERT INTO assistance_offered
            VALUES('$genRef','$asst_name','$asst_desc','$asst_orgID','$asst_status','$req_1','$req_2','$req_3','$req_4','$req_5','$req_6',
            '$req_7','$req_8','$req_9','$req_10')";

            if(mysqli_query($conn, $sql)){
                // success
                header('Location: ../functions/OrganizationAssistanceNewAct.php');
                mysqli_close($conn);
            } else {
                echo 'query error: '. mysqli_error($conn);
            }

        }
}


?>