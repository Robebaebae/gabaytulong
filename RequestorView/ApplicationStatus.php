<?php
session_start();

include('../functions/requestorCheck.php');
include('../sqlqueries/dbConnect.php');
include('../functions/fetchAppStatus.php');

?>
<!DOCTYPE html>
<html>


    <head>
    <title><?php echo $currentOrg;?> - <?php echo  $currentAsstName;?></title>
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
                                               <?php echo"<a class='button-secondary' href='Organizations.php'>
         Organizations</a>"?>
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
<section class="view-application-container status">
    <div class="view-application-contents-status">
                
                <div class="view-application-details-right">
                        <div class="view-application-details-right-header-status">
                        <!-- mas magand kung meron ding logo nung org sheesh -->
                            <p><?php echo $currentOrg;?></p>
                            <p><?php echo  $currentAsstName;?></p>
                        </div>

                        <div class="view-application-status-personal-information">
                            <label class="view-applciation-status-label">Full name : 
                            <p class="view-applciation-status-label-result"><?php echo ($currentGivenName.' '.$currentMiddleName.' '.$currentLastName);?></p>
                            </label>

                            <label class="view-applciation-status-label">Address :
                            <p class="view-applciation-status-label-result"><?php echo $currentAddress;?></p>
                            </label>

                            <label class="view-applciation-status-label">Email :
                            <p class="view-applciation-status-label-result"><?php echo $currentEmail;?></p>
                            </label>

                            <label class="view-applciation-status-label">Contact number :
                            <p class="view-applciation-status-label-result"><?php echo $currentContact;?></p>
                            </label>

                        </div>
                    <div class="view-application-class-status-requirments">
                    <p>Requirements:</p>
                
                    <?php
                    $number_requests = $_SESSION["reqCounter"];
                     $_SESSION["allowedReq"] = 10;
                
                    while($number_requests <= $_SESSION["allowedReq"])
                    {?>
                        <?php if(${'currentreq_'.$number_requests} != "") {?>

                            <p><object data="../resources/assets/icons/document-attach.svg"></object>  <?php echo ${'currentreq_'.$number_requests};?></p>
                            

                    <?php }
                    
                    $number_requests++;

                    }
                    ?>
                    </div>
                </div>


                <div class="view-application-details-right">

                    <div class="view-application-class-status-requirments">
                            <label class="view-applciation-status-label">Date of submission :
                            <p class="view-applciation-status-label-result"><?php echo $currentdate; ?></p>
                            </label>
                    </div>
                    <div class="view-application-status-personal-information">
                    <label class="view-applciation-status-label">STATUS:
                
                                <?php
                                if($currentstatus == "PENDING")
                                {
                                echo ("<p class='view-applciation-status-label-animation-pending'>Pending</p><lottie-interactive path='../resources/assets/animation/pending.json' style='width:4rem; height: 4rem; position:absolute; right:3.9rem; top:-3rem;' interaction='play-on-show' loop ></lottie-interactive></label>");
                                
                                }
                                if($currentstatus == "DECLINED")
                                {
                                echo ("<p class='view-applciation-status-label-animation-declined'>Declined</p><lottie-interactive path='../resources/assets/animation/declined.json' style='width:4rem; height: 4rem; position:absolute; right:4rem; top:-3rem;' interaction='play-on-show' loop ></lottie-interactive></label>");
                                }
                                if($currentstatus == "APPROVED")
                                {
                                echo ("<p class='view-applciation-status-label-animation-approved'> Approved</p><lottie-interactive path='../resources/assets/animation/approved.json' style='width:5rem; height: 5rem; position:absolute; right:4rem; top:-4rem;' interaction='play-on-show' loop ></lottie-interactive></label>");
                                }
                                ?>
                    </div>
                    <div class="view-application-class-status-remarks">
                    <h6 id="remarks_header">REMARKS:</h6>
                    <textarea disabled="yes" rows="10" id="comment" class="view-applciation-status-textarea"><?php echo  $currentremarks?></textarea>
                    </div>
                </div>
                
    </div>
    <div class="Term-and-conditions">
                    <p></p>
                </div>
</section>    
</article>
</main>
    <script src="..\script.js" defer></script>
    <script type="text/javascript" src="https://unpkg.com/lottie-interactive@latest/dist/lottie-interactive.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-interactivity@latest/dist/lottie-interactivity.min.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

</body>
</html>