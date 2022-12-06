<?php
session_start();

include('../functions/requestorCheck.php');

$asst_id = $_GET["updateId"]; 
$_SESSION["currentAsst"] = $asst_id;
$_SESSION["currentAsstID"] = $asst_id;

include('../sqlqueries/dbConnect.php');
include('../functions/asstFormUpload.php');


?>

<!DOCTYPE html>
<html>

<head>
<title><?php echo $_SESSION["currentOrgName"]." - ".$_SESSION["currentAsst"];?></title>
<link rel="shortcut icon" href="../resources/assets/images/logo.svg" type="image/svg+xml">
<link href="../main.css?v=<?php echo time(); ?>" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
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
                  <img src="../resources/assets/icons/close.svg" alt="" width="24">
                  </button>
            </div>

            <ul class="navbar-list">
                                        
                                                
                                        
                                        <div class="sidenav">
                                             
                                            
                                              
                                              <li class="navbar-item">
                                              <?php echo"<a class='button-secondary' href='OrganizationsDetails.php?updateId=".$_SESSION["currentOrg"]."'>
         Return to Organization</a>"?>
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
<main class="main">
<article>
<section class="section-assitance-offered-fillup-form">
        <!-- <div class="assistance-offered-name-return">
                    <p id="orgName_header"><?php echo $_SESSION["currentOrgName"];?></p>
                    <?php echo"<a class='button-secondary' href='OrganizationsDetails.php?updateId=".$_SESSION["currentOrg"]."'>Return</a>"?>
                    <p id="orgName"><?php echo $_SESSION["currentAsst"];?></p>
                
        </div> -->
        

             <!-- Animation and informative questions to answer -->
            <div class="assitance-offered-fillup-form-content-left">
                <div  class="assitance-offered-fillup-form-content-left-content">
                    <p id="orgName_header" class="assitance-offered-title"><?php echo $_SESSION["currentOrgName"];?></p>
                    
                    <p id="orgName" class="assitance-offered-title-assistance">Assistance Offered : <?php echo $_SESSION["currentAsst"];?></p>
                </div>
                    <p class="assistance-offered-message-note"> <object data="../resources/assets/icons/note.svg" width="13" height="13"></object>Note ! </p>
                    <p class="assistance-offered-message-text"> All fields must be filled out.</p>
                    <p class="assistance-offered-message-text"> Make sure to Properly name your files.</p>
                    <p class="assistance-offered-message-text"> Submited file size should not exceed 2mb.</p>
                    <p class="assistance-offered-message-text"> Submited file should match to the input field.</p>
                    <p class="assistance-offered-message-text"> Acceptable file types (PNG,JPEG,PDF).</p>
                    
                    

                    <p class="animation-description">File and Image must be clear and viewable</p>
                    <lottie-interactive path="../resources/assets/animation/capture-image.json" class="w-100"  interaction="play-on-show" loop ></lottie-interactive>
            </div>
<form action="" class="assistance-offered-sheesh" method="POST" enctype="multipart/form-data" onsubmit="document.getElementById('divId').style.display='block';">      

            <!-- area to fillup form sheeesh -->
            <div  class="assitance-offered-fillup-form-content-right">
                
                    

                    <p class="organization-login-title" id="newReq" >Personal Information</p>
                    <div class="assitance-fillup-personal-information">
                            <!-- Given name -->
                            <div class="fillup-input-group">
                                    <input required="" type="text" class="fillup-field" name="g_name" id="formFileLgLabel" value="<?php echo htmlspecialchars($g_name) ?>">
                                    <label class="fillup-label">Given name</label>
                            </div>
                            <div class="red-text"><?php echo $errors['g_name']; ?></div>


                            <!-- Middle name -->
                            <div class="fillup-input-group">
                                    <input required="" type="text" class="fillup-field" name="m_name" id="formFileLgLabel" value="<?php echo htmlspecialchars($m_name) ?>">
                                    <label class="fillup-label">Middle name</label>
                            </div>
                            <div class="red-text"><?php echo $errors['m_name']; ?></div>


                            <!-- Last name -->
                            <div class="fillup-input-group">
                                    <input required="" type="text" class="fillup-field" name="l_name" id="formFileLgLabel" value="<?php echo htmlspecialchars($l_name) ?>">
                                    <label class="fillup-label">Last name</label>
                            </div>
                            <div class="red-text"><?php echo $errors['l_name']; ?></div>

                            <!-- Email -->
                            <div class="fillup-input-group">
                                    <input required="" type="text" class="fillup-field" name="email" id="formFileLgLabel" value="<?php echo htmlspecialchars($email) ?>">
                                    <label class="fillup-label">Email</label>
                            </div>
                            <div class="red-text"><?php echo $errors['email']; ?></div>

                            <!-- Phone -->
                            <div class="fillup-input-group">
                                    <input required="" type="text" class="fillup-field" name="c_number" id="formFileLgLabel" value="<?php echo htmlspecialchars($c_number) ?>">
                                    <label class="fillup-label">Contact number</label>
                            </div>
                            <div class="red-text"><?php echo $errors['c_number']; ?></div>
                        
                            <div class="assistance-offered-fillup-form-barangay">
                            <label for="fetchval">Barangay</label>
                                <div class="select">
                                    <select name="barangay" id="fetchval" value="<?php echo htmlspecialchars($barangay) ?>">
                                        <option value="Anilao" selected="">Anilao</option>
                                        <option value="Atlag" selected="">Atlag</option>
                                        <option value="Bagna" selected="">Bagna</option>
                                        <option value="Babatnin" selected="">Babatnin</option>
                                        <option value="Bagong Bayan" selected="">Bagong Bayan</option>
                                        <option value="Balayong" selected="">Balayong</option>
                                        <option value="Balite" selected="">Balite</option>
                                        <option value="Bangkal" selected="">Bangkal</option>
                                        <option value="Barihan" selected="">Barihan</option>
                                        <option value="Bulihan" selected="">Bulihan</option>
                                        <option value="Bungahan" selected="">Bungahan</option>
                                        <option value="Caingin" selected="">Caingin</option>
                                        <option value="Calero" selected="">Calero</option>
                                        <option value="Caliligawan" selected="">Caliligawan</option>
                                        <option value="Canalate" selected="">Canalate</option>
                                        <option value="Caniogan" selected="">Caniogan</option>
                                        <option value="ACofradiall" selected="">Cofradia</option>
                                        <option value="Catmon" selected="">Catmon</option>
                                        <option value="Dakila" selected="">Dakila</option>
                                        <option value="Guinhawa" selected="">Guinhawa</option>
                                        <option value="Liang" selected="">Liang</option>
                                        <option value="Ligas" selected="">Ligas</option>
                                        <option value="Longos" selected="">Longos</option>
                                        <option value="Lugam" selected="">Lugam</option>
                                        <option value="Look 1st" selected="">Look 1st</option>
                                        <option value="Look 2nd" selected="">Look 2nd</option>
                                        <option value="Mabolo" selected="">Mabolo</option>
                                        <option value="Mambog" selected="">Mambog</option>
                                        <option value="Masile" selected="">Masile</option>
                                        <option value="Matimbo" selected="">Matimbo</option>
                                        <option value="Mojon" selected="">Mojon</option>
                                        <option value="Namayan" selected="">Namayan</option>
                                        <option value="Niugan" selected="">Niugan</option>
                                        <option value="Pamarawan" selected="">Pamarawan</option>
                                        <option value="Panasahan" selected="">Panasahan</option>
                                        <option value="Pinagbakahan" selected="">Pinagbakahan</option>
                                        <option value="San Agustin" selected="">San Agustin</option>
                                        <option value="San Gabriel" selected="">San Gabriel</option>
                                        <option value="San Juan" selected="">San Juan</option>
                                        <option value="San Pablo" selected="">San Pablo</option>
                                        <option value="Santiago" selected="">Santiago</option>
                                        <option value="Santor" selected="">Santor</option>
                                        <option value="San Vicente" selected="">San Vicente</option>
                                        <option value="Santisima Trinidad" selected="">Santisima Trinidad</option>
                                        <option value="Santo Cristo" selected="">Santo Cristo</option>
                                        <option value="Santo Rosario" selected="">Santo Rosario</option>
                                        <option value="Santo Niño" selected="">Santo Niño</option>
                                        <option value="Sumapang Bata" selected="">Sumapang Bata</option>
                                        <option value="Sumapang Matanda" selected="">Sumapang Matanda</option>
                                        <option value="Taal" selected="">Taal </option>
                                        <option value="Tikay" selected="">Tikay</option>
                                        <option value="" selected="">Choose Barangay</option>
                                    </select>
                                </div>
                            </div>
                            <div class="red-text"><?php echo $errors['barangay']; ?></div>

                            <div class="fillup-input-group">
                                <input required="" type="text" class="fillup-field" name="address" id="formFileLgLabel"  value="<?php echo htmlspecialchars($address) ?>">
                                <label class="fillup-label">Address line</label>
                            </div>
                            <div class="red-text"><?php echo $errors['address']; ?></div>
                    </div>
                        
                       
                    
                        <p class="organization-login-title">Requirements</p>
                        <div class="assistance-offered-fillup-form-requirements">
                           
                        <?php 
                        $number_requests = $_SESSION["reqCounter"];
                        while($number_requests <= $_SESSION["allowedReq"]){
                        ?>

                        <?php if(${'currentReq'.$number_requests} != ""){
                            $_SESSION['req'.$number_requests.'_status'] = "active";
                            ?>
                            

                        
                            <label class="requirements-name"><?php echo htmlspecialchars(${'currentReq'.$number_requests}) ?></label>
                            <div class="drop-zone">
                                        <span class="drop-zone__prompt">
                                          <img src="../resources/assets/icons/cloud-upload-dark.svg" width="60" alt="upload">
                                          Drop file here or click to upload
                                        </span>
                                        <input type="file" class="drop-zone__input" name="<?php echo ('req_'.$number_requests) ?>" value="<?php echo htmlspecialchars(${'req_'.$number_requests}) ?>"> 
                                        
                            </div>
                            <div class="red-text"><?php echo $errors['req_'.$number_requests]; ?></div>
                            <?php }
                        
                        else{ 
                        $_SESSION['req'.$number_requests.'_status'] = "inactive";
                        
                        }
                          $number_requests++;
                        }?>
                        </div>


                        <div class="organizationAsstform-checkbox">
                                      <label class="checkboxxer">
                                            <input type="checkbox" name="check" value="checked" id="defaultCheck1">
                                           
                                            <div class="checkmark"></div>
                                            
                                      </label> 
                                     <p>Acccept</p><button class="button-tertiary myImages" id="myImg">Privacy and Policy</button>
                                     
                        </div>
                         <div class="red-text"><?php echo $errors['check']; ?></div>

                        
                        <button id="submit_request" type="submit" name="submit" value="Submit" class="button-quatary">Submit</button>
                    
                    
                    




            </div>

</form>
  <div id="myModal" class="modal" >
  <span class="close"><img src="../resources/assets/icons/close.svg" alt="close-modal-view"></span>
  <div class="policyandprivacy">
    <ul class="grid-list">
    <p class="privacypolicy-title">Privacy Policy for Gabay Tulong para sa lahat ng Maloleño</p>
    <p align="justify"> At Gabay Tulong para sa lahat ng Maloleño, accessible from GabayTulong, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains 
      types of information that is collected and recorded by Gabay Tulong para sa lahat ng Maloleño and how we use it.</p>

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

          <div class="card-content" >
            <p align="justify">The personal information that you are asked to provide, and the reasons why you are asked to provide it, will be made clear to you at the point we ask you to provide your personal information.
            </p>
            <p align="justify">If you contact us directly, we may receive additional information about you such as your name, email address, phone number, the contents of the message and/or attachments you may send us, and any other information you may choose to provide.
            </p>
            <p align="justify">When you register for an Account, we may ask for your contact information, including items such as name, company name, address, email address, and telephone number.
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
            <p align="justify">
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
            <p align="justify">
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
            <p align="justify">
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
            <p align="justify">
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

                <p align="justify"> Request that a business that collects a consumer's personal data disclose the categories and specific pieces of personal data that a business has collected about consumers.</p>
                <p align="justify"> Request that a business delete any personal data about the consumer that a business has collected.</p>
                <p align="justify"> Request that a business that sells a consumer's personal data, not sell the consumer's personal data.</p>
                <p align="justify"> If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.</p>
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
            <p align="justify">Would like to make sure you are fully aware of all of your data protection rights. Every user is entitled to the following:</p>
            <p align="justify">The right to access – You have the right to request copies of your personal data. We may charge you a small fee for this service.</p>
            <p align="justify">The right to rectification – You have the right to request that we correct any information you believe is inaccurate. You also have the right to request that we complete the information you believe is incomplete.</p>
            <p align="justify">The right to erasure – You have the right to request that we erase your personal data, under certain conditions.</p>
            <p align="justify">The right to restrict processing – You have the right to request that we restrict the processing of your personal data, under certain conditions.</p>
            <p align="justify">The right to object to processing – You have the right to object to our processing of your personal data, under certain conditions.</p>
            <p align="justify">The right to data portability – You have the right to request that we transfer the data that we have collected to another organization, or directly to you, under certain conditions.</p>
            <p align="justify">If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.</p>
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
            <p align="justify">Another part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and/or monitor and guide their online activity.</p>

          <p align="justify"> Gabay Tulong para sa lahat ng Maloleño does not knowingly collect any Personal Identifiable Information from children under the age of 13. If you think that your child provided this kind of information on our website, we strongly encourage you to contact us immediately and we will do our best efforts to promptly remove such information from our records.</p>
          </div>

        </div>
      </li>



    </ul>
  </div>
 


        </div>  
</section>
</article>
  
 
  
</main>

<div id="divId" class="loader-wrapper" style="display:none">
<span class="loader" style="margin-left:49%">
  <span class="loader-inner"></span>
</span>
    <p style="text-align:center;margin-top:1%; color:white;font-weight:bold; font-size:2rem;">Processing Request</p>
</div>


<script src="..\script.js" defer></script>
<script type="text/javascript" src="https://unpkg.com/lottie-interactive@latest/dist/lottie-interactive.js"></script>
<script src="https://unpkg.com/@lottiefiles/lottie-interactivity@latest/dist/lottie-interactivity.min.js"></script>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
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
  
  
</body>
</html>