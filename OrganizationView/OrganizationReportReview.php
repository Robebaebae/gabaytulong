<?php
session_start();

$req_id = $_GET["updateID"]; 
$_SESSION["currentReq_ID"] = $req_id;
$_SESSION["allowedReq"] = 10;

require('../functions/organizationCheck.php');
include('../sqlqueries/dbConnect.php');
include('../functions/fetchCurrentReqRev.php');

?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <title>Pending - <?php echo $currentreq_req_type?> -<?php echo $currentreq_fullname?> </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../resources/assets/images/logo.svg" type="image/svg+xml">
   
    <link href="../resources/assets/css/dashboard.css?v=<?php echo time(); ?>" rel="stylesheet">
    <link href="../main.css?v=<?php echo time(); ?>" rel="stylesheet">
</head>
<body>
<?php include('../statics/navBar.php')?>

<section class="home-section">

<h1>PROCESSED REQUEST :  <?php echo $currentreq_req_type?> </h1>
<form class="wala-nako-maisip" action="" method="POST" enctype="multipart/form-data">
  <div class="dashboard-organization-pending-request">
        <div class="dashboard-organization-details-content">



                                  
                        <h3 >Personal Information :</h3>
                        <div class="organization-requestor-preview-text">
                            
                            <div class="fillup-input-group">
                                <input  required class="fillup-field" type="text" name="l_name" id="formFileLgLabel" value="<?php echo $currentreq_fullname?>">
                                <label class="fillup-label">Full Name</label>
                            </div>
                            

                            <div class="fillup-input-group">
                                  <input required class="fillup-field" type="text" name="email" id="formFileLgLabel" value="<?php echo $currentreq_req_email ?>">
                                  <label class="fillup-label">Email</label>
                            </div>

                            <div class="fillup-input-group">
                                  <input required class="fillup-field" type="text" name="c_number" id="formFileLgLabel" value="<?php echo $currentreq_req_contact ?>">
                                  <label class="fillup-label">Contact Number</label>
                            </div>

                            <div class="fillup-input-group">
                                  <input required class="fillup-field" type="text" name="address" id="formFileLgLabel"  value="<?php echo  $currentreq_req_address  ?>">
                                  <label class="fillup-label">Address</label>
                            </div>
                        </div>
                        <h4 id="newReq">Requirements</h4>
                        <div class="organization-requestor-preview">
                            <?php 
                            $number_requests = 1;
                            while($number_requests <= $_SESSION["allowedReq"]){
                            ?>

                            <?php if(${'currentreq_req_'.$number_requests} != ""){
                              
                                ?>
                              
                                <!-- <label><?php echo ${'currentreq_title_'.$number_requests}; ?></label><br>
                                  <a href="../functions/orgRequestorDownload.php?file=<?php echo ${'currentreq_req_'.$number_requests}; ?>">
                                  <embed src="../request_requirements/<?php echo ${'currentreq_req_'.$number_requests}; ?>"  style="margin-left:1rem;" width="90rem" height="115rem" />
                                  <p><?php echo ${'currentreq_req_'.$number_requests} ?></p>
                                  </a> -->
                                  <div class="organization-requestor-review-images">
                                            <label class="request-preview-title"><?php echo ${'currentreq_title_'.$number_requests}; ?></label>
                                            <embed src="../request_requirements/<?php echo ${'currentreq_req_'.$number_requests}; ?>"  style="margin-left:1rem;" width="90rem" height="115rem" />
                                            <label class="request-preview-result"><?php echo ${'currentreq_req_'.$number_requests}; ?></label>
                                  </div>

                                <?php }
                            
                            else{ 
                          
                              
                            } $number_requests++;
                            }?>
                        </div>
          </div>
          <div class="dashboard-organization-details-content">
                        <h2 style="margin:auto;">Status</h2>
                        <?php
                                if($currentreq_status == "PENDING")
                                {
                                echo ("<p class='view-applciation-status-label-animation-pending'>Pending</p><lottie-interactive path='../resources/assets/animation/pending.json' style='width:4rem; height: 4rem; position:absolute; right:4rem; top:-3rem;' interaction='play-on-show' loop ></lottie-interactive></label>");
                                
                                }
                                if($currentreq_status == "DECLINED")
                                {
                                echo ("<p class='view-applciation-status-label-animation-declined'>Declined</p><lottie-interactive path='../resources/assets/animation/declined.json' style='width:4rem; height: 4rem; position:absolute; right:4rem; top:-3rem;' interaction='play-on-show' loop ></lottie-interactive></label>");
                                }
                                if($currentreq_status == "APPROVED")
                                {
                                echo ("<p class='view-applciation-status-label-animation-approved'> Approved</p><lottie-interactive path='../resources/assets/animation/approved.json' style='width:5rem; height: 5rem; position:absolute; right:4rem; top:-4rem;' interaction='play-on-show' loop ></lottie-interactive></label>");
                                }
                ?>


                      
                                    <!-- <label class="view-applciation-status-label">Date of submission :
                                    <p class="view-applciation-status-label-result"><?php echo $currentreq_req_date; ?></p>
                                    </label> -->

        

          </div>
    </div>
    <div class="dashboard-organization-button-placements">
        <a class="button-secondary" href="../OrganizationView/OrganizationProcessedRequest.php">return</a>
    </div>

</form>
</section>


<script>
  let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");

  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();//calling the function(optional)
  });

  // following are the code to change sidebar button(optional)
  function menuBtnChange() {
   if(sidebar.classList.contains("open")){
     closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
   }else {
     closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
   }
  }
</script>

</body>
</html>