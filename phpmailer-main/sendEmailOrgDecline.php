<?php
session_start();
include('../sqlqueries/dbConnect.php');
$sql = 'SELECT * FROM organizations'; 

$result = mysqli_query($conn, $sql);

//fetch the resulting rows 
$current_requestor_details = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach($current_requestor_details as $current_requestor_detail){

    $current_organization = $current_requestor_detail['org_id'];

    if($current_organization == $_SESSION["selectedOrg"])
    {
        $_SESSION["currentorgAdmin_fullname"] = $current_requestor_detail['req_givenname'];
        $_SESSION["currentorg_email"] = $current_requestor_detail['org_adminEmail'];
        $_SESSION["currentorg_status"] = $current_requestor_detail['org_status'];
        $_SESSION["currentorg_remarks"] = $current_requestor_detail['org_remarks'];
        $_SESSION["currentorg_adminpassword"] = $current_requestor_detail['org_adminPassword'];

        if($_SESSION["currentorg_status"] == "ACTIVE"){
            $_SESSION["currentbody"] = "Your organization has been accepted! Here is your generated password, ". $_SESSION["currentorg_adminpassword"];
        }
        else if($_SESSION["currentorg_status"] == "DECLINED"){
            $_SESSION["currentbody"] = "Your organization has been declined!";
        }

    }
}    

    sendmail();

    use PHPMailer\PHPMailer\PHPMailer;
    function sendmail(){
        $name = "Gabay Tulong Para sa lahat ng Maloleño";  // Name of your website or yours
        $to =  $_SESSION["currentorg_email"] ;  // mail of reciever
        $subject = "Application Status Update";
        $body =  "We are sorry to inform you that after thorough review of your application,
		your organization has been declined. Remarks:".$_SESSION["currentorg_remarks"];
        $from = "gabaytulong.pslnm@gmail.com";  // you mail
        $password = "frvorzwdeiqhomqa";  // your mail password

        // Ignore from here

        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";
        $mail = new PHPMailer();

        // To Here

        //SMTP Settings
        $mail->isSMTP();
        // $mail->SMTPDebug = 3;  Keep It commented this is used for debugging                          
        $mail->Host = "smtp.gmail.com"; // smtp address of your email
        $mail->SMTPAuth = true;
        $mail->Username = $from;
        $mail->Password = $password;
        $mail->Port = 587;  // port
        $mail->SMTPSecure = "tls";  // tls or ssl
        $mail->smtpConnect([
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            ]
        ]);

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom($from, $name);
        $mail->addAddress($to); // enter email address whom you want to send
        $mail->Subject = ("$subject");
        $mail->Body = $body;
        if ($mail->send()) {
            header( "Location: ../SuperAdminView/SuperAdminPendingOrganizations.php");
        } else {
            echo "Something is wrong: <br><br>" . $mail->ErrorInfo;
        }
    }


        // sendmail();  // call this function when you want to

     
           
      
?>
