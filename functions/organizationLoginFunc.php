<?php
$sql = 'SELECT * FROM organizations';

$result = mysqli_query($conn, $sql);

$email = $password = '';

$errors = array('email' => '','password' => '');

if(isset($_POST['submit'])){

        //email
        if(empty($_POST['email'])){
            $errors['email'] = 'An email is required';
        } else{
            $email = $_POST['email'];
        }

        //password
        if(empty($_POST['password'])){
            $errors['password'] = 'A password is required';
        } else{
            $password = $_POST['password'];
        }
        if(array_filter($errors)){
            //echo 'errors in form';
            
        }else{

        while($request = mysqli_fetch_object($result)) {
                $current_email = ($request->org_adminEmail);
                 //check email
                if($current_email == $email){
                    $current_org = ($request->org_id);
                    $current_Password = ($request->org_adminPassword);
                    //check password
                    if($current_Password== $password){
                        $_SESSION["currentOrg"]= $current_org;
                        $_SESSION['organization'] = $current_org;
                        header('Location: ../functions/organizationLoginFuncAct.php');

                    }else{

                        $errors['email'] = 'Invalid Email and Password ';
                        $errors['password'] = 'Invalid Email and Password ';
                    }
                }
                if($email == 'superadmin@gmail.com'){
                    if($password == 'superadmin123'){
                        $_SESSION['superAdmin'] = "superAdmin";
                        header('Location: ../SuperAdminView/SuperAdminDashboard.php');
                    }
                    else{
                        $errors['email'] = 'Invalid Email and Password ';
                        $errors['password'] = 'Invalid Email and Password ';
                    }

                }
                else{
                    $errors['email'] = 'Invalid Email and Password ';
                    $errors['password'] = 'Invalid Email and Password ';
                }
            }
        }
    }
?>