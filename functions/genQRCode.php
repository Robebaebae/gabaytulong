<?php
//query
$sql = 'SELECT req_refID,req_qr FROM requests';

//make query
$result = mysqli_query($conn, $sql);

//fetch the resulting rows 
$qrcode = mysqli_fetch_all($result, MYSQLI_ASSOC);

//close connection
mysqli_close($conn);

//print_r ($organizations);
foreach($qrcode as $qrcodes){
    $currentQR = $qrcodes['req_refID'];
    if($qr_id == $currentQR)
    {
        $qrCode_file = $qrcodes['req_qr'];
        $_SESSION["qrCodeRefID"] = $currentQR;
        $_SESSION["qrCodeName"] = $qrCode_file;
    }
}
?>