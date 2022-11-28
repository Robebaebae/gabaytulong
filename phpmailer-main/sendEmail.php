<?php
session_start();
include('../sqlqueries/dbConnect.php');
$sql = 'SELECT * FROM requests'; 

$result = mysqli_query($conn, $sql);

//fetch the resulting rows 
$current_requestor_details = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach($current_requestor_details as $current_requestor_detail){

    $current_organization = $current_requestor_detail['req_refID'];

    if($current_organization == $_SESSION["currentReq_ID"])
    {
        $_SESSION["currentreq_fullname"] = $current_requestor_detail['req_givenname'].' '.$current_requestor_detail['req_middlename'].' '.$current_requestor_detail['req_lastname'];
        $_SESSION["currentreq_req_email"] = $current_requestor_detail['req_email'];
        $_SESSION["currentreq_Status"] = $current_requestor_detail['req_status'];
   		$_SESSION["currentreq_remarks"] = $current_requestor_detail['req_remarks'];

    }
}    

    sendmail();

    use PHPMailer\PHPMailer\PHPMailer;
    function sendmail(){
        $name = "Gabay Tulong";  // Name of your website or yours
        $to = $_SESSION["currentreq_req_email"];  // mail of reciever
        $subject = "Application Status Update";
        $body =   "Congratulations! After thorough review, your request has been ".$_SESSION["currentreq_Status"].". Remarks: ".$_SESSION["currentreq_remarks"];
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
            header( "Location: ../functions/fetchCurrentReqRevAct.php");
        } else {
            echo "Something is wrong: <br><br>" . $mail->ErrorInfo;
        }
    }


        // sendmail();  // call this function when you want to

     
           
      
?>
