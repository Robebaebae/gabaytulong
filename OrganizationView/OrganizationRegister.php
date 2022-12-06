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
                                                <a href="..\OrganizationView\OrganizationLogin.php"><button id="btn1" class="button-secondary">Back to Login</button></a>
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
        
                        
                            
                <form  action="" method="POST" enctype="multipart/form-data" id="form" onsubmit="document.getElementById('divId').style.display='block';"> 
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
                                            <p>Acccept</p>
                                            <button class="button-tertiary myImages" id="myImg">Privacy and Policy</button>
                                    		
                                        </div>
                                    
                                        <div class="red-text"><?php echo $errors['check']; ?></div>



                                        <!-- Submit button -->
                                        
                                      <button id="submit_request" type="submit" name="submit" value="Register" class="button-quatary" >Register</button> 
                                       
                                </div>
                  
                  
                </form>

                          
<div id="myModal" class="modal">
  <span class="close"><img src="../resources/assets/icons/close.svg" alt="close-modal-view"></span>
    <div class="policyandprivacy">
    <ul class="grid-list">
    <p class="privacypolicy-title">Privacy Policy for Gabay Tulong para sa lahat ng Maloleño</p>
    <p> At Gabay Tulong para sa lahat ng Maloleño, accessible from GabayTulong, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by Gabay Tulong para sa lahat ng Maloleño and how we use it.<

    <p class="privacypolicy-title">Consent</p>
    <p> By using our website, you hereby consent to our Privacy Policy and agree to its terms.</p>

      <li>
        <div class="faq-card">

          <button class="card-action accordion">
            <h3 class="h3 card-title">
              Information we collect
            </h3>

            <div class="action-icon">
              <ion-icon name="add-outline" aria-hidden="true" class="open"></ion-icon>
              <ion-icon name="remove-outline" aria-hidden="true" class="close"></ion-icon>
            </div>
          </button>

          <div class="card-content">
            <p>The personal information that you are asked to provide, and the reasons why you are asked to provide it, will be made clear to you at the point we ask you to provide your personal information.
            </p>
            <p>If you contact us directly, we may receive additional information about you such as your name, email address, phone number, the contents of the message and/or attachments you may send us, and any other information you may choose to provide.
            </p>
            <p>When you register for an Account, we may ask for your contact information, including items such as name, company name, address, email address, and telephone number.
            </p>      
          </div>

        </div>
      </li>

      <li>
        <div class="faq-card">

          <button class="card-action accordion">
            <h3 class="h3 card-title">
              How we use your information
            </h3>

            <div class="action-icon">
              <ion-icon name="add-outline" aria-hidden="true" class="open"></ion-icon>
              <ion-icon name="remove-outline" aria-hidden="true" class="close"></ion-icon>
            </div>
          </button>

          <div class="card-content">
            <p>
              We use the information we collect in various ways, including to:

                Provide, operate, and maintain our website
                Improve, personalize, and expand our website
                Understand and analyze how you use our website
                Develop new products, services, features, and functionality
                Communicate with you, either directly or through one of our partners, including for customer service, to provide you with updates and other information relating to the website, and for marketing and promotional purposes
                Send you emails
                Find and prevent fraud
            </p>
          </div>

        </div>
      </li>

      <li>
        <div class="faq-card">

          <button class="card-action accordion">
            <h3 class="h3 card-title">
              Log Files
            </h3>

            <div class="action-icon">
              <ion-icon name="add-outline" aria-hidden="true" class="open"></ion-icon>
              <ion-icon name="remove-outline" aria-hidden="true" class="close"></ion-icon>
            </div>
          </button>

          <div class="card-content">
            <p>
              Gabay Tulong para sa lahat ng Maloleño follows a standard procedure of using log files. These files log visitors when they visit websites. All hosting companies do this and a part of hosting services' analytics. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks. These are not linked to any information that is personally identifiable. The purpose of the information is for analyzing trends, administering the site, tracking users' movement on the website, and gathering demographic information.
            </p>
          </div>

        </div>
      </li>

      <li>
        <div class="faq-card">

          <button class="card-action accordion">
            <h3 class="h3 card-title">
              Advertising Partners Privacy Policies
            </h3>

            <div class="action-icon">
              <ion-icon name="add-outline" aria-hidden="true" class="open"></ion-icon>
              <ion-icon name="remove-outline" aria-hidden="true" class="close"></ion-icon>
            </div>
          </button>

          <div class="card-content">
            <p>
              You may consult this list to find the Privacy Policy for each of the advertising partners of Gabay Tulong para sa lahat ng Maloleño.

              Third-party ad servers or ad networks uses technologies like cookies, JavaScript, or Web Beacons that are used in their respective advertisements and links that appear on Gabay Tulong para sa lahat ng Maloleño, which are sent directly to users' browser. They automatically receive your IP address when this occurs. These technologies are used to measure the effectiveness of their advertising campaigns and/or to personalize the advertising content that you see on websites that you visit.

            Note that Gabay Tulong para sa lahat ng Maloleño has no access to or control over these cookies that are used by third-party advertisers.
            </p>
          </div>

        </div>
      </li>

      <li>
        <div class="faq-card">

          <button class="card-action accordion">
            <h3 class="h3 card-title">
              Third Party Privacy Policies
            </h3>

            <div class="action-icon">
              <ion-icon name="add-outline" aria-hidden="true" class="open"></ion-icon>
              <ion-icon name="remove-outline" aria-hidden="true" class="close"></ion-icon>
            </div>
          </button>

          <div class="card-content">
            <p>
              Gabay Tulong para sa lahat ng Maloleño's Privacy Policy does not apply to other advertisers or websites. Thus, we are advising you to consult the respective Privacy Policies of these third-party ad servers for more detailed information. It may include their practices and instructions about how to opt-out of certain options.  </p>
              <p>You can choose to disable cookies through your individual browser options. To know more detailed information about cookie management with specific web browsers, it can be found at the browsers' respective websites.</p>
          
          </div>

        </div>
      </li>
      <li>
        <div class="faq-card">

          <button class="card-action accordion">
            <h3 class="h3 card-title">
              CCPA Privacy Rights (Do Not Sell My Personal Information)
            </h3>

            <div class="action-icon">
              <ion-icon name="add-outline" aria-hidden="true" class="open"></ion-icon>
              <ion-icon name="remove-outline" aria-hidden="true" class="close"></ion-icon>
            </div>
          </button>

          <div class="card-content">
            Under the CCPA, among other rights, California consumers have the right to:

                <p> Request that a business that collects a consumer's personal data disclose the categories and specific pieces of personal data that a business has collected about consumers.</p>
                <p> Request that a business delete any personal data about the consumer that a business has collected.</p>
                <p> Request that a business that sells a consumer's personal data, not sell the consumer's personal data.</p>
                <p> If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.</p>
          </div>

        </div>
      </li>

      <li>
        <div class="faq-card">

          <button class="card-action accordion">
            <h3 class="h3 card-title">
              GDPR Data Protection Rights
            </h3>

            <div class="action-icon">
              <ion-icon name="add-outline" aria-hidden="true" class="open"></ion-icon>
              <ion-icon name="remove-outline" aria-hidden="true" class="close"></ion-icon>
            </div>
          </button>

          <div class="card-content">
            <p> would like to make sure you are fully aware of all of your data protection rights. Every user is entitled to the following:</p>
            <p>The right to access – You have the right to request copies of your personal data. We may charge you a small fee for this service.</p>
            <p>The right to rectification – You have the right to request that we correct any information you believe is inaccurate. You also have the right to request that we complete the information you believe is incomplete.</p>
            <p>The right to erasure – You have the right to request that we erase your personal data, under certain conditions.</p>
            <p>The right to restrict processing – You have the right to request that we restrict the processing of your personal data, under certain conditions.</p>
            <p>The right to object to processing – You have the right to object to our processing of your personal data, under certain conditions.</p>
            <p>The right to data portability – You have the right to request that we transfer the data that we have collected to another organization, or directly to you, under certain conditions.</p>
            <p>If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.</p>
          </div>

        </div>
      </li>
      <li>
        <div class="faq-card">

          <button class="card-action accordion">
            <h3 class="h3 card-title">
              Children's Information
            </h3>

            <div class="action-icon">
              <ion-icon name="add-outline" aria-hidden="true" class="open"></ion-icon>
              <ion-icon name="remove-outline" aria-hidden="true" class="close"></ion-icon>
            </div>
          </button>

          <div class="card-content">
            <p>Another part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and/or monitor and guide their online activity.</p>

          <p> Gabay Tulong para sa lahat ng Maloleño does not knowingly collect any Personal Identifiable Information from children under the age of 13. If you think that your child provided this kind of information on our website, we strongly encourage you to contact us immediately and we will do our best efforts to promptly remove such information from our records.</p>
          </div>

        </div>
      </li>



    </ul>
  </div>
</div>    


        </div>     
	
    </section>
  

  
<div id="divId" class="loader-wrapper" style="display:none">
<span class="loader">
  <span class="loader-inner"></span>
</span>
</div>
  
  


  
  
  
    
</article>
</main>
  
<script type="text/javascript">
  // create references to the modal...
var modal = document.getElementById('myModal');
// to all images -- note I'm using a class!
var images = document.getElementsByClassName('myImages');
// the image in the modal
var modalImg = document.getElementById("img01");


// Go through all of the images with our custom class
for (var i = 0; i < images.length; i++) {
  var img = images[i];
  // and attach our click listener for this image.
  img.onclick = function(evt) {
    console.log(evt);
    modal.style.display = "block";
  }
}

var span = document.getElementsByClassName("close")[0];

span.onclick = function() {
  modal.style.display = "none";
}
</script>
  <script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    /* Toggle between adding and removing the "active" class,
    to highlight the button that controls the panel */
    this.classList.toggle("active");

    /* Toggle between hiding and showing the active panel */
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}

  </script>  
  
  
  
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