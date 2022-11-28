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
<main>
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
                    
                    <p id="orgName" class="assitance-offered-title-assistance">Assistance offered : <?php echo $_SESSION["currentAsst"];?></p>
                </div>
                    <p class="assistance-offered-message-note"> <object data="../resources/assets/icons/note.svg" width="13" height="13"></object>Note ! </p>
                    <p class="assistance-offered-message-text"> All field is required to fillup</p>
                    <p class="assistance-offered-message-text"> Make sure to </p>
                    <p class="assistance-offered-message-text"> Properly name your submited file</p>
                    <p class="assistance-offered-message-text"> Submited file size should not exceed 2mb</p>
                    <p class="assistance-offered-message-text"> Submited file should match to the field input</p>
                    <p class="assistance-offered-message-text"> All field is required to fillup</p>

                    <p class="animation-description">File and Image must be clear and viewable</p>
                    <lottie-interactive path="../resources/assets/animation/capture-image.json" class="w-100"  interaction="play-on-show" loop ></lottie-interactive>
            </div>
<form action="" class="assistance-offered-sheesh" method="POST" enctype="multipart/form-data">      

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
                                     <p>Acccept</p><a class="button-tertiary" href="../RequestorView/PrivacyandPolicy.php" target="_blank"> Privacy and Policy</a>
                                     
                        </div>
                         <div class="red-text"><?php echo $errors['check']; ?></div>


                    
                        
                        <button id="submit_request" type="submit" name="submit" value="Submit" class="button-quatary">Submit</button>
                        </div>
                    
                    




            </div>

            
            
            



</form>
</section>
</article>
</main>
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
</body>
</html>