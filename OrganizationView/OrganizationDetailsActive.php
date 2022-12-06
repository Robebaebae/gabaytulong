<?php
session_start();

require('../functions/organizationCheck.php');
include('../sqlqueries/dbConnect.php');
include('../functions/fetchOrgDetails.php');
include('../functions/fetchOrgDetailsActive.php');

?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <title>Active Status</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../resources/assets/images/logo.svg" type="image/svg+xml">
   
    <link href="../resources/assets/css/dashboard.css?v=<?php echo time(); ?>" rel="stylesheet">
    <link href="../main.css?v=<?php echo time(); ?>" rel="stylesheet">
   
</head>
<body>
<?php include('../statics/navBar.php')?>

<section class="home-section">
    
<h2>ORGANZATION CHANGE STATUS</h2>

<div class="dashboard-organization-details-content">

                            <div class="organization-login-content">
                            
                            <form  class="white" action="" method="POST" enctype="multipart/form-data" id="form"> 

                            <div class="center" style="display:flex; align-items: center; flex-direction:column;">

                            <p>Are you sure you want change your status? 
                            <h3 style="margin-top:1%;">
                              
                            <?php echo "Current Status: ".$currentorg_status?>
                            </h3>
                              
                            </div>
                              <div class="fillup-input-group" style="margin-top:5%;">
                              <input type="text" name="otherVal" id="otherVal" style="padding:2%;border-radius: .5rem;" value="">
                              <label class="fillup-label" style="margin-top:0%;">Reason for Changing Status</label>
                          	  </div>
                              
                          
                              
                            <!-- Submit button -->
                            <div class="OrganizationAssistanceArchive-buttons">
      
                            <a class="button-tertiary" href="../OrganizationView/OrganizationDetails.php">Cancel</a>
                         
                            <button class="button-quatary" id="submit_request" type="submit" name="accept" value="Approve">
							Change Status</button>
                            </div>
                            </form>
                            </div>
                          

</div>
</section>


<script>
//navBar
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