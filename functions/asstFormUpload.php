<?php
$_SESSION["reqCounter"] = 1;
$_SESSION["reqCounterInput"] = 1;
$reqCounter = $_SESSION["reqCounter"];
$reqCounterInput = $_SESSION["reqCounterInput"];
$_SESSION["allowedReq"] = 10;

//query
$sql = 'SELECT * FROM assistance_offered';


//make query
$result = mysqli_query($conn, $sql);


//fetch the resulting rows 
$assistances_offered = mysqli_fetch_all($result, MYSQLI_ASSOC);


//print_r ($organizations);
foreach($assistances_offered as $assistance_offered){
    $orgUnder = $assistance_offered['asst_id'];
   
    if($asst_id == $orgUnder)
    {
        $currentAsst = $assistance_offered['asst_name'];
        $_SESSION["currentAsst"] = $currentAsst;
        $currentReq1 = $assistance_offered['asst_req1'];
        $currentReq2 = $assistance_offered['asst_req2'];
        $currentReq3 = $assistance_offered['asst_req3'];
        $currentReq4 = $assistance_offered['asst_req4'];
        $currentReq5 = $assistance_offered['asst_req5'];
        $currentReq6 = $assistance_offered['asst_req6'];
        $currentReq7 = $assistance_offered['asst_req7'];
        $currentReq8 = $assistance_offered['asst_req8'];
        $currentReq9 = $assistance_offered['asst_req9'];
        $currentReq10 = $assistance_offered['asst_req10'];
    }
}

$req_refID = $org_id = $asst_id = $asst_name = $g_name = $m_name = $l_name = $email = $c_number = $address = $barangay = 
$req_date = $req_1 = $req_2 = $req_3 = $req_4 = $req_5 = $req_6 = $req_7 = $req_8 = $req_9 = $req_10 ='';
	
$errors = array('check' => '','asst_name' => '','g_name' => '', 'm_name' => '', 'l_name' => '', 'email' => '', 
'c_number' => '','address' => '','barangay' => '','req_date' => '', 'req_1' => '', 'req_2' => '', 'req_3' => '', 'req_4' => '', 'req_5' => ''
 , 'req_6' => '', 'req_7' => '', 'req_8' => '', 'req_9' => '', 'req_10' => '');

if(isset($_POST['submit'])){
 	
 
  
    //given name
    if(empty($_POST['g_name'])){
        $errors['g_name'] = 'A given name is required';
    } else{
        $g_name = $_POST['g_name'];
        if(!preg_match('/^[a-zA-Z\s]+$/', $g_name)){
            $errors['g_name'] = 'Given name must be letters and spaces only';
        }
    }

    //middle name
    if(empty($_POST['m_name'])){
        $errors['m_name'] = 'A middle name is required';
    } else{
        $m_name = $_POST['m_name'];
        if(!preg_match('/^[a-zA-Z\s]+$/', $m_name)){
            $errors['m_name'] = 'Middle name must be letters and spaces only';
        }
    }

    //last name
    if(empty($_POST['l_name'])){
        $errors['l_name'] = 'A last name is required';
    } else{
        $l_name = $_POST['l_name'];
        if(!preg_match('/^[a-zA-Z\s]+$/', $l_name)){
            $errors['l_name'] = 'Last name must be letters and spaces only';
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

    //contact number
    if(empty($_POST['c_number'])){
        $errors['c_number'] = 'A contact number is required';
    } else{
        $c_number = $_POST['c_number'];
        if(!preg_match('/^[0-9]{11}+$/', $c_number)){
            $errors['c_number'] = 'Contact number is invalid';
        }
    }    

    //address
    if(empty($_POST['address'])){
        $errors['address'] = 'An address is required';
    }else{
        $address = $_POST['address'];
    }

        //address
    if(empty($_POST['barangay'])){
        $errors['barangay'] = 'An barangay is required';
    }else{
        $address = $_POST['address'];
    }

    //check
    if(empty($_POST['check'])){
        $errors['check'] = 'You must agree to the Terms and Conditions';
    }else{
        
    }

    //requirements

    while($reqCounter <= $_SESSION["allowedReq"]){

        if($_SESSION['req'.$reqCounter.'_status'] == "inactive")
        {
            $reqCounter++;
        }
        
        else{
            if(empty($_FILES['req_'.$reqCounter]['name'])){
            $errors['req_'.$reqCounter] = 'An '.${'currentReq'.$reqCounter}.' is required';
          
            }
            else{
                ${'req_'.$reqCounter} = $_FILES['req_'.$reqCounter]['name'];
                ${'fn_'.$reqCounter} = $_FILES['req_'.$reqCounter]['name'];
                ${'ext_'.$reqCounter} = explode(".",${'fn_'.$reqCounter});
                ${'cn_'.$reqCounter} = count(${'ext_'.$reqCounter});
             
                if(${'ext_'.$reqCounter}[${'cn_'.$reqCounter}-1]=='doc' || ${'ext_'.$reqCounter}[${'cn_'.$reqCounter}-1]=='pdf'|| 
                ${'ext_'.$reqCounter}[${'cn_'.$reqCounter}-1]=='png' || ${'ext_'.$reqCounter}[${'cn_'.$reqCounter}-1]=='jpeg'|| 
                ${'ext_'.$reqCounter}[${'cn_'.$reqCounter}-1]=='jpg')
                {
                    if($_FILES['req_'.$reqCounter]['size']<500000){
                        
    
                    }else{
                        $errors['req_'.$reqCounter] = 'File too big!';
                    }
                    
                }else{
                    $errors['req_'.$reqCounter] = 'File not supported';
                }
          
            }

            $reqCounter++;
        }
    }
    
                
    if(array_filter($errors)){
        //echo 'errors in form';
   
      
        
    }else {
      
      
        //generate reference id

        $genRef = strtoupper(uniqid(TRUE));
        
        //generate QRcode

            include('../phpqrcode/qrlib.php');
            // how to save PNG codes to server
            
            $tempDir = "../qrcodes/";
            
            //intergrating ref id to qr code
            $codeContents = $genRef;
            
            // we need to generate filename somehow, 
            $fileName =  $genRef.'.png';
            
            $pngAbsoluteFilePath = $tempDir.$fileName;
            $urlRelativeFilePath = $tempDir.$fileName;
            
            // generating
            QRcode::png($codeContents, $pngAbsoluteFilePath, QR_ECLEVEL_L, 10);


        // upload files

        while($reqCounterInput <= $_SESSION["allowedReq"]){

            if($_SESSION['req'.$reqCounterInput.'_status'] == "inactive"){ 
                $reqCounterInput++;
                }
                
                else{

                ${'tm_'.$reqCounterInput} = $_FILES['req_'.$reqCounterInput]['tmp_name'];
                ${'new_nm_'.$reqCounterInput} = $genRef."_". ${'fn_'.$reqCounterInput};
                move_uploaded_file( ${'tm_'.$reqCounterInput}, "../request_requirements/". ${'new_nm_'.$reqCounterInput} );

                //requirements
                ${'req_'.$reqCounterInput} = mysqli_real_escape_string($conn, ${'new_nm_'.$reqCounterInput});
                $reqCounterInput++;
                }

        }

        // escape sql chars
        $req_refID = mysqli_real_escape_string($conn, $genRef);
        $asst_orgID = mysqli_real_escape_string($conn, $_SESSION['currentOrg']);
        $asst_ID= mysqli_real_escape_string($conn, $_SESSION['currentAsstID']);
        $req_date = mysqli_real_escape_string($conn, date("Y/m/d"));

        //personal info
        $g_name = mysqli_real_escape_string($conn, $_POST['g_name']);
        $m_name = mysqli_real_escape_string($conn, $_POST['m_name']);
        $l_name = mysqli_real_escape_string($conn, $_POST['l_name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $c_number = mysqli_real_escape_string($conn, $_POST['c_number']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $barangay = mysqli_real_escape_string($conn, $_POST['barangay']);
        $req_status = mysqli_real_escape_string($conn, "PENDING");
        $req_archive = mysqli_real_escape_string($conn, "UNARCHIVED");
        $completeAddress = $address." ,".$barangay." , Malolos, Bulacan";
        $_SESSION["currentRef"] = $genRef;
        $remarks = "";
        //

     
        // create sql
        $sql = "INSERT INTO requests
        VALUES('$genRef','$fileName','$asst_orgID','$asst_ID','$g_name','$m_name','$l_name','$email','$c_number',
        '$completeAddress','$req_status','$req_archive','$req_date','$remarks','$req_1','$req_2','$req_3','$req_4','$req_5',
        '$req_6','$req_7','$req_8','$req_9','$req_10')";

        // save to db and check
        if(mysqli_query($conn, $sql)){
            // success
            header('Location: ../RequestorView/OrganizationLoading.php');
        } else {
            echo 'query error: '. mysqli_error($conn);
        }
        
    }

}

?>


