<?php
session_start();
include('../functions/requestorCheck.php');

include('../sqlqueries/dbConnect.php');
include('../functions/fetchApplication.php');
$_SESSION["qrCodeValue"] = "";

?>

<!DOCTYPE html>
<html>
<head>
<title>Gabay Tulong Para sa lahat ng MALOLEÑO</title>
<link href="../main.css?v=<?php echo time(); ?>" rel="stylesheet">
<link rel="shortcut icon" href="../resources/assets/images/logo.svg" type="image/svg+xml">
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
                <a href="..\Main.php" >
                    <div class="logo-text">
                      <span class="logo-title mobile">GABAY TULONG</span>
                      <span class="logo-subtitle mobile">Para sa lahat ng MALOLEÑO</span>
                    </div>
                </a>

                  <button class="nav-close-btn" data-nav-toggler>
                  <img src="../resources/assets/icons/close.svg" alt="closebutton" width="24"></img>
                  </button>
            </div>

            <ul class="navbar-list">
                                        
                                                
                                        
                                        <div class="sidenav">
                                             
                                    
                                              
                                              <li class="navbar-item">
                                                <a href="..\RequestorView\Organizations.php"><button id="btn2" class="button-secondary">Organizations</button></a>
                                              </li>
                                        </div>


            </ul>
      </nav>
  
        <!-- 
         <a  -->
    
        <div class="overlay" data-nav-toggler data-overlay></div>
  
        <button class="nav-open-btn"  data-nav-toggler>
        <img src="../resources/assets/icons/menu.svg" alt="openbutton" width="24">
        </button>
     
    </div>
  </header>

<main>
<article>
    <section class="view-application-container">
    <div class="view-application-contents">

        <div class="view-application-details-right">
        <h1 class="view-application-details-title">View Application Status</h1>
            <p class="view-application-text">
                            To view Application Status you need to upload or Scan 
                            the QR Code or Reference ID number that been sent to
                            your Email or Phone Number.
                            </p>
                    <form class="white" action="" method="POST" enctype="multipart/form-data">
                    <div class="view-application-details-file-input">
                        
                            <div class="form-input-file-show">
                                    <div class="preview">
                                        <img id="file-ip-1-preview">
                                    </div>
                                
                                <label for="file1-ip-1" ><img src="../resources/assets/icons/qr-code.svg" alt="qrcode"> Upload Qr-code </label> 
                                <input type="file" accept="image/*" name="qr_code" id="file1-ip-1" onchange="showPreview(event);">
                            </div>
                      		<br>
                            <div class="red-text"><?php echo $errors['qr_ID']; ?></div>
                                

                            <h4 style="margin: auto;">OR</h4>
                        
                            <div class="fillup-input-group">   
                                <input required="true" type="text" autocomplete="off" class="fillup-field" name="ref_id" id="edname" value="<?php echo $_SESSION["qrCodeValue"]?>">
                                <label class="fillup-label" for="ref_id">Reference ID</label><br> 
                            </div>
                      		<br>
                            <div class="red-text"><?php echo $errors['ref_ID']; ?></div>
                    
                           
                             <button required="" id="submit_ref" type="submit" name="submit" value="Submit" class="button-quatary">Submit</button>
                           
                       
                    </div>
                    </form>
        </div>

        <div class="qrcode-animation-left">

              <lottie-interactive path="../resources/assets/animation/qrcode_scanning_animation.json" class="w-100" interaction="play-on-show" loop ></lottie-interactive>

                <figure></figure>
        </div>












    </div>    
    </section>
</article>
</main>
    
    <script src="..\script.js" defer></script>
    <script type="text/javascript" src="https://unpkg.com/lottie-interactive@latest/dist/lottie-interactive.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-interactivity@latest/dist/lottie-interactivity.min.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script type="text/javascript">
  function showPreview(event){
  if(event.target.files.length > 0){
    var src = URL.createObjectURL(event.target.files[0]);
    var preview = document.getElementById("file-ip-1-preview");
    preview.src = src;
    preview.style.display = "block";
    document.getElementById("edname").required = false;
  }
}


</script>
</body>
</html>