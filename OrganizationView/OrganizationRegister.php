<?php
session_start();

include('../sqlqueries/dbConnect.php');
include('../functions/orgRegister.php');

?>

<!DOCTYPE html>
<html>


<head>
<title>Register - Gabay Tulong</title>

<link rel="shortcut icon" href="../resources/assets/images/logo.svg" type="image/svg+xml">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

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
                  <img src="../resources/assets/icons/close.svg" alt="" width="24"></img>
                  </button>
            </div>

            <ul class="navbar-list">
                             
                                        <div class="sidenav">
                                              <li class="navbar-item">
                                                <a href="..\RequestorView\Organizations.php"><button id="btn1" class="button-secondary">View organizations</button></a>
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
    <!-- <div id="header">
        <a href="OrganizationLogin.php" class="button-quatary"><input id="register_btn" type="submit" name="submit" value="Back to Login"></a>
    </div>  -->
 
    

    <section class=section-organization-register id="regForm">
            <div id="registerDiv" class="organization-register-content">
        
                        
                            
                <form  action="" method="POST" enctype="multipart/form-data" id="form"> 
                <a href="../Main.php"><img src="../resources/assets/logo-24.svg" class="organization-register-image"></a>
                    <div class="organization-register-return-login">
                        <p>Already have an account?</p><a href="../OrganizationView/OrganizationLogin.php" class="button-tertiary">Login</a>
                    </div>
                    <h4 id="orgLoginHeader" >Organization Application Form</h4>
                    
                            <div class="organization-register-top">
                            <h4 id="orgForm" >Organization Details</h4>
                                <!-- Organization Name input -->
                                <!-- Organization Address input -->

                                <!-- Organization Name -->
                                <div class="fillup-input-group">
                                    <input required="" type="text" class="fillup-field" name="org_name" id="formFileLgLabel" value="<?php echo htmlspecialchars($org_name) ?>">
                                    <label class="fillup-label">Organization Name</label>
                                </div>
                                <div class="red-text"><?php echo $errors['org_name']; ?></div>

                                <!-- Organization Address -->
                                <div class="fillup-input-group">
                                    <input required="" type="text" class="fillup-field" name="org_add" id="formFileLgLabel" require="" value="<?php echo htmlspecialchars($org_add) ?>">
                                    <label class="fillup-label">Organization Address</label>
                                </div>
                                <div class="red-text"><?php echo $errors['org_add']; ?></div>
                            
                            </div>

                            <div class="organization-register-middle">
                            <h4 id="orgForm" >Organization Admin Details</h4>
                            <!-- Organization Admin Name input -->
                            <!-- Organization Admin Contact Number input -->
                            <!-- Organization Admin Email input -->

                            <!-- Organization Admin Name -->
                                <div class="fillup-input-group">
                                    <input required="" type="text" class="fillup-field" name="org_adminName" id="formFileLgLabel" value="<?php echo htmlspecialchars($org_adminName) ?>">
                                    <label class="fillup-label">Organization Admin Name</label>
                                </div>
                                <div class="red-text"><?php echo $errors['org_adminName']; ?></div>

                                <!-- Contact Number -->
                                <div class="fillup-input-group">
                                    <input required="" type="text" class="fillup-field" name="contact" id="formFileLgLabel" value="<?php echo htmlspecialchars($contact)?>">
                                    <label class="fillup-label">Contact Number</label>
                                </div>
                                <div class="red-text"><?php echo $errors['contact']; ?></div>

                                <!-- Email Address -->
                                <div class="fillup-input-group">
                                <input required="" type="text" class="fillup-field" name="email" id="formFileLgLabel" value="<?php echo htmlspecialchars($email) ?>">
                                <label class="fillup-label">Email Address</label>
                                </div>
                                <div class="red-text"><?php echo $errors['email']; ?></div>

                            </div>



                            <div class="organization-register-bottom">
                                <h4 id="orgForm" >ID of Organization Admin Name</h4><br>
                                <label class="requirements-name">Organization Admin ID</label>
                                        <div class="drop-zone">
                                                <span class="drop-zone__prompt">
                                                <img src="../resources/assets/icons/cloud-upload-dark.svg" width="60" alt="upload">
                                                Drop file here or click to upload
                                                </span>
                                                 <input type="file" class="drop-zone__input" name="id_file" value="<?php echo htmlspecialchars($id_file) ?>">
                                        </div>
                                        <br>
                                        <div class="red-text"><?php echo $errors['id_file']; ?></div>













                                        <div class="organizationAsstform-checkbox">
                                            <label class="checkboxxer">
                                                <input type="checkbox" value="check" name="test" id="defaultCheck1">
                                                <div class="checkmark"></div>
                                            </label> 
                                            <p>Acccept</p><a class="button-tertiary" href="../RequestorView/PrivacyandPolicy.php" target="_blank"> Privacy and Policy</a>
                                    
                                        </div>
                                    
                                        <div class="red-text"><?php echo $errors['check']; ?></div>



                                        <!-- Submit button -->
                                        
                                      <button id="submit_request" type="submit" name="submit" value="Register" class="button-quatary" >Register</button> 
                                       
                                </div>
                </form>

                          

                        

        </div>     
    </section>

    
</article>
</main>
<script src="..\script.js" defer></script>
<script>
        



        document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
          const dropZoneElement = inputElement.closest(".drop-zone");
        
          dropZoneElement.addEventListener("click", (e) => {
            inputElement.click();
          });
        
          inputElement.addEventListener("change", (e) => {
            if (inputElement.files.length) {
              updateThumbnail(dropZoneElement, inputElement.files[0]);
            }
          });
        
          dropZoneElement.addEventListener("dragover", (e) => {
            e.preventDefault();
            dropZoneElement.classList.add("drop-zone--over");
          });
        
          ["dragleave", "dragend"].forEach((type) => {
            dropZoneElement.addEventListener(type, (e) => {
              dropZoneElement.classList.remove("drop-zone--over");
            });
          });
        
          dropZoneElement.addEventListener("drop", (e) => {
            e.preventDefault();
        
            if (e.dataTransfer.files.length) {
              inputElement.files = e.dataTransfer.files;
              updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
            }
        
            dropZoneElement.classList.remove("drop-zone--over");
          });
        });
        
        /**
         * Updates the thumbnail on a drop zone element.
         *
         * @param {HTMLElement} dropZoneElement
         * @param {File} file
         */
        function updateThumbnail(dropZoneElement, file) {
          let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");
        
          // First time - remove the prompt
          if (dropZoneElement.querySelector(".drop-zone__prompt")) {
            dropZoneElement.querySelector(".drop-zone__prompt").remove();
          }
        
          // First time - there is no thumbnail element, so lets create it
          if (!thumbnailElement) {
            thumbnailElement = document.createElement("div");
            thumbnailElement.classList.add("drop-zone__thumb");
            dropZoneElement.appendChild(thumbnailElement);
          }
        
          thumbnailElement.dataset.label = file.name;
        
          // Show thumbnail for image files
          if (file.type.startsWith("image/")) {
            const reader = new FileReader();
        
            reader.readAsDataURL(file);
            reader.onload = () => {
              thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
            };
          } else {
            thumbnailElement.style.backgroundImage = null;
          }
        }
        
        </script>
</body>
</html>