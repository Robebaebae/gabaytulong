<?php
$sql = 'SELECT * FROM organizations';

$result = mysqli_query($conn, $sql);

$org_name = $org_add = $org_adminName = $contact =  $email = $id_file = '';

$errors = array('check' => '','org_name' => '','org_add' => '','org_adminName' => '','contact' => '','email' => '','id_file' => '');

if(isset($_POST['submit'])){

        if(isset($_POST['test'])){
     
        } else{
            $errors['check'] = 'You must accept the Term and Conditions';
        }

        //Organization Name
        if(empty($_POST['org_name'])){
            $errors['org_name'] = 'An Organization Name is required';
        } else{
            $org_name = $_POST['org_name'];
        }

        //Organization Address
        if(empty($_POST['org_add'])){
            $errors['org_add'] = 'An Organization Address is required';
        } else{
            $org_add = $_POST['org_add'];
        }

         //Organization Admin Name
         if(empty($_POST['org_adminName'])){
            $errors['org_adminName'] = 'An Organization Admin Name is required';
        } else{
            $org_adminName = $_POST['org_adminName'];
        }

         //Organization Contact
        if(empty($_POST['contact'])){
            $errors['contact'] = 'A contact number is required';
        } else{
            $contact = $_POST['contact'];
            if(!preg_match('/^[0-9]{11}+$/', $contact)){
                $errors['contact'] = 'Contact number is invalid';
            }
        }    
        //email
        if(empty($_POST['email'])){
            $errors['email'] = 'An email is required';
        } else{
            $email = $_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors['email'] = 'Email must be a valid email address';
            }
        }

        //organization admin ID

        if(empty($_FILES['id_file']['name'])){
            $errors['id_file'] = 'An Organization ID is required';
          
         }
        else{
                $id_file = $_FILES['id_file']['name'];
                $fn = $_FILES['id_file']['name'];
                $ext = explode(".",$fn);
                $cn = count($ext);
             
                if($ext[$cn-1]=='doc' || $ext[$cn-1]=='pdf'|| 
                $ext[$cn-1]=='png' || $ext[$cn-1]=='jpeg'|| 
                $ext[$cn-1]=='jpg')
                {
                    if($_FILES['id_file']['size']<500000){
                        
                   
    
                    }else{
                        $errors['id_file'] = 'File too big!';
                    }
                    
                }else{
                    $errors['id_file'] = 'File not supported';
                }
          
        }

        
        if(array_filter($errors)){
            //echo 'errors in form';
            
        } else{

            $genRef = strtoupper(uniqid(TRUE));
            $password = strtoupper(uniqid(TRUE));
            $org_dp = "../org_displaypic/default_logo.png";

            $tm = $_FILES['id_file']['tmp_name'];
            $new_nm = $genRef."_". $fn;
            move_uploaded_file( $tm, "../organization_requirements/". $new_nm);
            
            $id_file = mysqli_real_escape_string($conn, $new_nm);

            $org_name = mysqli_real_escape_string($conn, $_POST['org_name']);
            $org_add = mysqli_real_escape_string($conn, $_POST['org_add']);
            $org_adminName = mysqli_real_escape_string($conn, $_POST['org_adminName']);
            $contact = mysqli_real_escape_string($conn, $_POST['contact']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $details = mysqli_real_escape_string($conn, " ");
            $org_archive = mysqli_real_escape_string($conn, "UNARCHIVED");
            $org_status = mysqli_real_escape_string($conn, "PENDING");
            $org_date = mysqli_real_escape_string($conn, date("Y/m/d"));
        	$org_remarks = "";
            $org_statusremarks = "";
            

            $sql = "INSERT INTO organizations
            VALUES('$genRef','$org_dp','$org_name','$org_add','$contact','$details','$org_adminName','$email','$password','$id_file','$org_status','$org_remarks','$org_statusremarks','$org_archive','$org_date')";
            
            if(mysqli_query($conn, $sql)){
                // success
                header('Location: OrganizationLogin.php');
                mysqli_close($conn);
            } else {
                echo 'query error: '. mysqli_error($conn);
            }

        }
}
?>

