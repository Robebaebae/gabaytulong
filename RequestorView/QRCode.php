<?php
session_start();
include('../functions/requestorCheck.php');

$qr_id = $_GET["updateID"]; 
$_SESSION["qrCode"] = $qr_id;

include('../sqlqueries/dbConnect.php');
include('../functions/genQRCode.php');

?>

<!DOCTYPE html>
<html>

<head>
<title>Gabay Tulong - Qr-code</title>
<link rel="shortcut icon" href="../resources/assets/images/logo.svg" type="image/svg+xml">

<link href="../main.css?v=<?php echo time(); ?>" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1.0">



</head>
<body>
<header class="header" data-header style="background-color: white;  padding-block:25px;box-shadow:0px 4px 4px hsla(231, 20%, 49%, 0.06); ">
    <div class="container">

      <a href="..\Main.php" class="logo">
        <img src="../resources/assets/images/logo.svg" alt="logo" width="42">
        <div class="logo-text">
          <span class="logo-title">GABAY TULONG</span>
          <span class="logo-subtitle">Para sa lahat ng MALOLEÑO</span>
        </div>
      </a>

      <nav class="navbar" data-navbar>

            <div class="wrapper">
                  <div class="logo-text">
                    <span class="logo-title mobile">GABAY TULONG</span>
                    <span class="logo-subtitle mobile">Para sa lahat ng MALOLEÑO</span>
                  </div>

                  <button class="nav-close-btn" data-nav-toggler>
                  <img src="../resources/assets/icons/close.svg" alt="" width="24"></img>
                  </button>
            </div>

            <ul class="navbar-list">
                                        
                                                
                                        
                                        <div class="sidenav">
                                             
                                              <li class="navbar-item">
                                                <a href="ViewApplication.php"><button id="btn2" class="button-secondary">View Application Status</button></a>
                                              </li>
                                        </div>


            </ul>
      </nav>
  
        <!-- 
         <a  -->
    
        <div class="overlay" data-nav-toggler data-overlay></div>
  
        <button class="nav-open-btn"  data-nav-toggler>
        <img src="../resources/assets/icons/menu.svg" alt="" width="24">
        </button>
     
    </div>
  </header>




<main>
<article>

    
    <section class="view-application-container">
        <div class="view-application-contents">


        <div class="qr-code-contents">
         	<center><h2 style="font-size:3rem;">Request sent Successfully!</h2></center>
            <center><h3 >Please download the QR Code or copy the Reference ID number.</h3></center>
          
          	<h4>QR Code:</h4>
            <img  class="qrcode-image" src="<?php echo ('../qrcodes/'.$qrCode_file)?>">
           



            
            <h4>Reference ID:</h4>
            <div class="reference-number-container">
                <h4 id="copy"><?php echo $_SESSION["qrCodeRefID"]?></h4>
                <button type="button"  onclick="copyEvent('copy')">
                    <div class="hover-text">
                          <img  class="copy-text" src="../resources/assets/icons/copy.svg" >
                          <span class="tooltip-text" id="fade">Copy reference</span>
                    </div>
              </button>
            </div>

            <a href="../sqlqueries/downloadQR.php?file=<?php echo $qrCode_file; ?>" > <button class="button-quatary"><img src="../resources/assets/icons/download.svg" width="24" > Download Qr-code</button></a>
            <a href="ApplicationStatus.php?updateId=<?php echo ($_SESSION["qrCode"])?>"><button class="button-quatary">View Application Status</button></a>


        </div>
        </div>
    
    </section>
</article>
</main>
<script src="..\script.js" defer></script>
<script>
    function copyEvent(id)
    {
        var str = document.getElementById(id);
        window.getSelection().selectAllChildren(str);
        document.execCommand("Copy")
    }
</script>
</body>
</html>