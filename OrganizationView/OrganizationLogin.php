<?php
session_start();

include('../sqlqueries/dbConnect.php');
include('../functions/organizationLoginFunc.php');
?>

<!DOCTYPE html>
<html>

<head>
<title>Log in - Gabay Tulong</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="../resources/assets/images/logo.svg" type="image/svg+xml">
<link href="../main.css?v=<?php echo time(); ?>" rel="stylesheet">
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
                  <img src="../resources/assets/icons/close.svg" alt="" width="24">
                  </button>
            </div>

            <ul class="navbar-list">
                                        
                                                
                                        
                                        <div class="sidenav">
                                             
                                    
                                              
                                              <li class="navbar-item">
                                                <a href="..\Main.php"><button id="btn2" class="button-secondary">Main Page</button></a>
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
    <form action="" method="POST" enctype="multipart/form-data" > 

            <section class="section-organization-login">
                <div class="organization-login-content">
                   
                            <a href="../Main.php"><img src="../resources/assets/logo-24.svg" class="organization-login-image"></a>
                        
                               
                                <h4 class="organization-login-title">Organizations</h4>
                                
                                <div class="organization-login-top">
                                <!-- Email input -->
                                <div class="fillup-input-group">
                                    <input type="text" name="email" autocomplete="off" placeholder="" id="" required="@" class="fillup-field">
                                    <!-- <span class="required">*</span> -->
                                    <!-- balikan ko to pag tapos na lahat shet -->
                                    <label class="fillup-label">Email</label>
                                </div>
                                <div class="red-text"><?php echo $errors['email']; ?></div>
                                
                                <!-- Email input end -->



                                <!-- Password input -->
                                <div class="fillup-input-group">
                                <input required="" type="password" name="password" autocomplete="off" id="" class="fillup-field">
                                <label class="fillup-label">Password</label>
                                </div>
                                <div class="red-text"><?php echo $errors['password']; ?></div>
                                <!-- Passwrod input end -->
                                </div>


                                <div class="organization-login-middle">
                                <a href="../OrganizationView/OrganizationForgotPassword.php" class="button-tertiary">Forgot password?</a>
                                </div>

                                    <!-- Submit button -->
                                <div class="organization-login-bottom">
                                    <button id="submit_request" type="submit" name="submit" value="Login" class="button-quatary"> Log In </button>
                                    <a href="OrganizationRegister.php" class="button-secondary">Register</a>
                                </div>
                               

                                    

                        
                </div>
            </section>
            </form>
    </article>
    </main>
    <script src="../script.js" defer></script>
</body>
</html>