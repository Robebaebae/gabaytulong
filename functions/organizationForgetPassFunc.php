<?php
$sql = 'SELECT * FROM organizations';

$result = mysqli_query($conn, $sql);

$email = '';

$errors = array('email' => '');

if(isset($_POST['submit'])){

        //email
        if(empty($_POST['email'])){
            $errors['email'] = 'An email is required';
        } else{
            $email = $_POST['email'];
        }
        if(array_filter($errors)){
            //echo 'errors in form';
            
        }else{
        while($request = mysqli_fetch_object($result)) {
                $current_orgid = ($request->org_id);
                $current_email = ($request->org_adminEmail);
                $current_status = ($request->org_status);
                 //check email
                if($current_email == $email && ($current_status == "ACTIVE" || $current_status == "INACTIVE")){
                        $_SESSION['currentForgot_orgid']=$current_orgid;
                        $genPassword = strtoupper(uniqid(TRUE));
                        $query = "UPDATE organizations SET org_adminPassword='$genPassword' WHERE org_id ='$current_orgid'"; 
                        $update = mysqli_query($conn, $query);
                        header('Location: ../phpmailer-main/sendEmailForgot.php');
                }
                else{
                    $errors['email'] = 'Email not registered!';
                }
            }
        }
    }
?>