<?php
session_start();

include('../sqlqueries/dbConnect.php');
include('../functions/organizationForgetPassFunc.php');
?>

<!DOCTYPE html>
<html>
<title>Forget password - Organizations</title>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="shortcut icon" href="../resources/assets/images/logo.svg" type="image/svg+xml">
<link href="../main.css?v=<?php echo time(); ?>" rel="stylesheet">
</head>

<body>
<header class="header" data-header style="background-color: white; padding-block-start:20px; padding-block:15px; ">
    <div class="container">

     
         <a href="..\Main.php" class="logo">
        <img src="../resources/assets/images/logo.svg" alt="logo" width="42">
        <div class="logo-text">
          <span class="logo-title">GABAY TULONG</span>
          <span class="logo-subtitle">Para sa lahat ng MALOLEÑO</span>
        </div>
      </a>
        
      </a>

      <nav class="navbar" data-navbar>

        <div class="wrapper">
          <a href="#" class="logo">Gabay Tulong</a>

          <button class="nav-close-btn" aria-label="close menu" data-nav-toggler>
          <div class="box-icon"><img src="./resources/assets/icons/menu.svg" alt=""></div>
          </button>
        </div>



      </nav>
     
        <div class="overlay" data-nav-toggler data-overlay></div>
  
      <button class="nav-open-btn" aria-label="open menu" data-nav-toggler>
      <div class="box-icon"><img src="./resources/assets/icons/menu.svg" alt=""></div>
      </button>
     
    </div>
  </header>
<main>
<article>
<section class="section-organization-login">
<form action="" method="POST" enctype="multipart/form-data"> 
                <div class="organization-login-content">

                <a href="../Main.php"><img src="../resources/assets/logo-24.svg" class="organization-login-image"></a>

                <div class="organization-register-return-login">
                        <p>Back to </p><a href="../OrganizationView/OrganizationLogin.php" class="button-tertiary">Login</a>
                    </div>
                                
                                <div class="organization-login-top forget">
                                    <h4 class="organization-login-title">Forget password</h4>
                               
                                        <div class="fillup-input-group">
                                            <input type="text" name="email" autocomplete="off" placeholder="" id="" required="@" class="fillup-field">
                                            <label class="fillup-label">Email</label>
                                        </div>
                                        <div class="red-text"><?php echo $errors['email']; ?></div>

                                        <button class="button-quatary" id="submit_request" type="submit" name="submit" value="Reset Password">Reset</button>
                                </div>

                                <!-- Submit button -->
                              
                                  
                                
                             



</div>
</form>
</section>
</article>
</main>
</body>
</html>