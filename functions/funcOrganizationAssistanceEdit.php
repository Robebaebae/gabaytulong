<?php
$sql = 'SELECT * FROM assistance_offered';

$result = mysqli_query($conn, $sql);

$current_asst = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach($current_asst as $current_assts){

    $current_asst_id = $current_assts['asst_id'];

    if($current_asst_id == $_SESSION["asst_id"])
    {
        $currentreq_asst_name = $current_assts['asst_name'];
        $currentreq_asst_desc = $current_assts['asst_description'];
        $currentreq_asst_orgID = $_SESSION['organization'];
        $currentreq_asst_req_1 = $current_assts['asst_req1'];
        $currentreq_asst_req_2 = $current_assts['asst_req2'];
        $currentreq_asst_req_3 = $current_assts['asst_req3'];
        $currentreq_asst_req_4 = $current_assts['asst_req4'];
        $currentreq_asst_req_5 = $current_assts['asst_req5'];
        $currentreq_asst_req_6 = $current_assts['asst_req6'];
        $currentreq_asst_req_7 = $current_assts['asst_req7'];
        $currentreq_asst_req_8 = $current_assts['asst_req8'];
        $currentreq_asst_req_9 = $current_assts['asst_req9'];
        $currentreq_asst_req_10 = $current_assts['asst_req10'];
    }
}

$asst_name = $asst_desc = $req_1 = $req_2 = $req_3 = $req_4 = $req_5 = $req_6 = $req_7 = $req_8 = $req_9 = $req_10 = '';

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
  
            $asst_name = mysqli_real_escape_string($conn, $_POST['asst_name']);
            $asst_desc = mysqli_real_escape_string($conn, $_POST['asst_desc']);
            $asst_orgID = mysqli_real_escape_string($conn, $_SESSION['organization']);
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
           

            $sql = "UPDATE assistance_offered SET asst_name='$asst_name',asst_description='$asst_desc',asst_req1='$req_1',
            asst_req2='$req_2',asst_req3='$req_3',asst_req4='$req_4',asst_req5='$req_5',asst_req6='$req_6',asst_req7='$req_7'
            ,asst_req8='$req_8',asst_req9='$req_9',asst_req10='$req_10' WHERE asst_id='$asst_id'"; 
           
            if(mysqli_query($conn, $sql)){
                // success
                header('Location: ../functions/funcOrganizationAssistanceEditAct.php');
                mysqli_close($conn);
            } else {
                echo 'query error: '. mysqli_error($conn);
            }

        }
}

?>