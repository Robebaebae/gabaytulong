<?php
$sql = 'SELECT * FROM requests';    

$result = mysqli_query($conn, $sql);

$errors = array('ref_ID' => "",'qr_ID' => "");

require('../vendor/autoload.php');
use Zxing\QrReader;

if(isset($_POST['submit'])){

    if(isset($_POST['ref_id'])){
       $filename = $_FILES["qr_code"]["name"];
       $filetype = $_FILES["qr_code"]["type"];
       $filetemp = $_FILES["qr_code"]["tmp_name"];
       $filesize= $_FILES["qr_code"]["size"];

       $filetype = explode("/",$filetype);
       if($filetype[0] !== "image"){
        $errors['qr_ID'] = 'Either a QR code or Reference ID is required!';
       }
       
       else if($filesize>5242880){
        $errors['qr_ID'] = "File size too big. Maximum size is 5mb.";
       }
       
       else {
       $qrScan = new QrReader("../qrcodes/".$filename);
    //    echo $qrScan->text();
       $qrCode = $qrScan->text();
       echo $qrCode;
            while($request = mysqli_fetch_object($result)) { 
            $currentReq = ($request->req_refID);
            if($currentReq == $qrCode){
                header('Location: ApplicationStatus.php?updateId='.$qrCode.'');

            }
            else{
                $errors['ref_ID'] = 'Reference Code Invalid!';
            }
        
        
        }
       }

    } 

    if(empty($_POST['ref_id'])){
        $errors['ref_ID'] = 'Either a QR code or Reference ID is required!';
    } 
    
    else{

        while($request = mysqli_fetch_object($result)) { 
            $currentReq = ($request->req_refID);
            $refID = $_POST['ref_id'];
            if($currentReq == $refID){
                header('Location: ApplicationStatus.php?updateId='.$refID.'');
            }
            else{
                $errors['ref_ID'] = 'Reference Code Invalid!';
            }
        
        
        }
       
    }
  
}
?>