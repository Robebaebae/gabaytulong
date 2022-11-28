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
        $currentorg_name = $request_organization['org_name'];
        $_SESSION['currentOrgName'] = $currentorg_name;
        $currentorg_dp = $request_organization['org_dp'];
        $currentorg_address = $request_organization['org_address'];
        $currentorg_contact = $request_organization['org_contact'];
        $currentorg_details = $request_organization['org_details'];
        $currentorg_admin = $request_organization['org_admin'];
        $currentorg_adminEmail = $request_organization['org_adminEmail'];
        $currentorg_adminPassword = $request_organization['org_adminPassword'];
        $currentorg_status = $request_organization['org_status'];
    }
}

$org_name = $org_address = $org_admin = $org_details =  $org_contact = $org_adminEmail = '';

$errors = array('org_name' => '','org_address' => '','org_admin' => ''
,'org_details' => '','org_contact' => '','org_adminEmail' => '','org_dp' => '');

if(isset($_POST['submit'])){

        //Organization Name
        if(empty($_POST['org_name'])){
            $errors['org_name'] = 'An Organization Name is required';
        } else{
            $org_name = $_POST['org_name'];
        }

        //Organization Address
        if(empty($_POST['org_address'])){
            $errors['org_address'] = 'An Organization Address is required';
        } else{
            $org_address = $_POST['org_address'];
        }

        //Organization Contact
        if(empty($_POST['org_contact'])){
            $errors['org_contact'] = 'A contact number is required';
        } else{
            $org_contact = $_POST['org_contact'];
            if(!preg_match('/^[0-9]{11}+$/', $org_contact)){
                $errors['org_contact'] = 'Contact number is invalid';
            }
        }     

        //Organization Address
        if(empty($_POST['org_details'])){
            $errors['org_details'] = 'Orgnization details are required';
        } else{
            $org_details = $_POST['org_details'];
        }

        //Organization Admin Name
        if(empty($_POST['org_admin'])){
            $errors['org_admin'] = 'An Organization Admin Name is required';
        } else{
            $org_admin = $_POST['org_admin'];
        }

        //email
        if(empty($_POST['org_adminEmail'])){
            $errors['org_adminEmail'] = 'An email is required';
        } else{
            $org_adminEmail = $_POST['org_adminEmail'];
            if(!filter_var($org_adminEmail, FILTER_VALIDATE_EMAIL)){
                $errors['org_adminEmail'] = 'Email must be a valid email address';
            }
        }
      
        if(array_filter($errors)){
            //echo 'errors in form';
            
        } else{
            
            $org_name = mysqli_real_escape_string($conn,$_POST['org_name']);
            $org_address = mysqli_real_escape_string($conn, $_POST['org_address']);
            $org_details = mysqli_real_escape_string($conn, $_POST['org_details']);
            $org_contact = mysqli_real_escape_string($conn, $_POST['org_contact']);
            $org_admin = mysqli_real_escape_string($conn, $_POST['org_admin']);
            $org_adminEmail = mysqli_real_escape_string($conn, $_POST['org_adminEmail']);
        
            $queryUpdate = "UPDATE organizations SET org_name='$org_name', org_address='$org_address', org_details='$org_details',
            org_contact='$org_contact', org_admin='$org_admin', org_adminEmail='$org_adminEmail' 
            WHERE org_id='$org_UpdateID'"; 
           
            if(mysqli_query($conn, $queryUpdate)){
                // success
                header('Location: ../functions/fetchOrgDetailsAct.php');
                mysqli_close($conn);
            } else {
                
                echo $_SESSION["currentError"]= 'query error: '. mysqli_error($conn);
            }

        }
}


?>