<?php
session_start();

require('../functions/organizationCheck.php');
include('../sqlqueries/dbConnect.php');
include('../functions/fetchOrgDetailsPassword.php');

?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
   
    <link href="../resources/assets/css/dashboard.css?v=<?php echo time(); ?>" rel="stylesheet">
    <link href="../main.css?v=<?php echo time(); ?>" rel="stylesheet">
</head>
<body>
<?php include('../statics/navBar.php')?>

<section class="home-section">
    <div class="dashboard-organization-details-content">                     
                          
                 
                            <form  class="white" action="" method="POST" enctype="multipart/form-data" id="form"> 

                            <h4 class="organization-login-title">Change Password</h4>
                            <div class="organization-login-top">
                            <!-- old password -->
                            <div class="fillup-input-group">
                            <input required="" class="fillup-field" type="password" name="org_pass" id="formFileLgLabel" value="<?php echo $org_pass?>">
                            <label class="fillup-label">Old Password</label>
                            </div>
                            <div class="red-text"><?php echo $errors['org_pass']; ?></div>
                           
                            

                            <!-- new password -->
                            <div class="fillup-input-group">
                            <input required="" class="fillup-field" type="password" name="new_pass" id="formFileLgLabel" value="<?php echo $new_pass?>">
                            <label class="fillup-label">New Password</label>
                            </div>
                            <div class="red-text"><?php echo $errors['new_pass']; ?></div>

                            <!-- confirm password -->
                            <div class="fillup-input-group">
                            <input required="" class="fillup-field" type="password"  name="connew_pass" id="formFileLgLabel" value="<?php echo $connew_pass?>">
                            <label class="fillup-label">Confirm New Password</label>
                            </div>
                            <div class="red-text"><?php echo $errors['connew_pass']; ?></div>
                            <div class="organization-login-top">
                            </div>
                                                      

                            <!-- Submit button -->
                            <div class="dashboard-organization-button-placements">
                            <a class="button-tertiary" href="../OrganizationView/OrganizationDetails.php">Cancel</a>
                            <button class="button-quatary" id="submit_request" type="submit" name="submit" value="Update Assistance">Update Password</button>
                            </div>
                            </form>

    </div>

                            
</section>

<script type="text/javascript">
$(document).ready(function(){
$("#edit").click(function () {
$(this).next().removeAttr("disabled")
.focus()
.val("editable now");
});
});
</script>

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