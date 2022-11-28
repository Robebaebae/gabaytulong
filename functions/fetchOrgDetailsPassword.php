<?php

$org_UpdateID = $_SESSION["organization"];

$sql = 'SELECT * FROM organizations'; 

$result = mysqli_query($conn, $sql);

//fetch the resulting rows 
$request_organizations = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach($request_organizations as $request_organization){

    $current_organization = $request_organization['org_id'];

    if($current_organization == $org_UpdateID)
    {
        $currentorg_adminPassword = $request_organization['org_adminPassword'];
    }
}

$org_pass = $new_pass = $connew_pass = '';

$errors = array('org_pass' => '','new_pass' => '','connew_pass' => '');

        if(isset($_POST['submit'])){

        //Old Password
        if(empty($_POST['org_pass'])){
            $errors['org_pass'] = 'Old Password is required';
        } else{
            if($currentorg_adminPassword == $_POST['org_pass']){
               $org_pass = $_POST['org_pass']; 
            }
            else{
                $errors['org_pass'] = 'Incorrect Password!';
            }
            
        }

        if(empty($_POST['new_pass'])){
            $errors['new_pass'] = 'New Password is required';
        } else{
            if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,12}$/', $_POST['new_pass'])) 
            {
                $errors['new_pass'] = 'The password must have atleast a letter and a number, and must be 6-12 charcters long!';
            }
            if($_POST['connew_pass'] == $_POST['new_pass']){
               $new_pass = $_POST['new_pass']; 
            }
            else{
                $errors['new_pass'] = 'Does not match with Confirm New Password!';
            }
            
        }

        if(empty($_POST['connew_pass'])){
            $errors['connew_pass'] = 'Confirm New Password is required';
        } else{
            if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,12}$/', $_POST['connew_pass'])) 
            {
                $errors['connew_pass'] = 'The password must have atleast a letter and a number, and must be 6-12 charcters long!';
            }
            if($_POST['connew_pass'] == $_POST['new_pass']){
            
            }
            else{
                $errors['connew_pass'] = 'Does not match with New Password!';
            }
            
        }

      
        if(array_filter($errors)){
            //echo 'errors in form';
            
        } else{
            
            $update_new_pass = mysqli_real_escape_string($conn,$_POST['new_pass']);

            $query = "UPDATE organizations SET org_adminPassword='$update_new_pass'
            WHERE org_id='$org_UpdateID'"; 
           
            if(mysqli_query($conn, $query)){
                // success
                header('Location: ../functions/fetchOrgDetailsPasswordAct.php');
                
                mysqli_close($conn);
            } else {
                echo 'query error: '. mysqli_error($conn);
            }

        }
}


?>