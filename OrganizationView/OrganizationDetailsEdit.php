<?php
session_start();

require('../functions/organizationCheck.php');
include('../sqlqueries/dbConnect.php');
include('../functions/fetchOrgDetails.php');

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

   
<form  class="white" action="" method="POST" enctype="multipart/form-data" id="form"> 
<div class="dashboard-organization-details-content">
                              
                     
               
                                 

                                    
                              <div class="dashboard-organization-details-edits">
                                    <div class="dashboard-organization-image">
                                          <img style="width:20rem;" src="<?php echo '../org_displaypic/'.$currentorg_dp?>"/>
                                          <a class="button-tertiary" href="../OrganizationView/OrganizationDetailsNewDP.php">Change photo</a>
                                    </div>


                                    <p class="dashboard-organization-details-title">Organization Details</p>
                                    <div class="fillup-input-group">
                                          <input type="text" class="fillup-field" name="org_name" id="formFileLgLabel" value="<?php echo $currentorg_name ?>">
                                          <label class="fillup-label">Organization Name</label>
                                    </div>
                                    <div class="red-text"><?php echo $errors['org_name']; ?></div>

                                      <!-- <label>Organization Address</label> -->
                                    <div class="fillup-input-group">
                                          <input required="" type="text" class="fillup-field" name="org_address" id="formFileLgLabel" value="<?php echo $currentorg_address ?>">
                                          <label class="fillup-label">Organization Address</label>
                                    </div>
                                    <div class="red-text"><?php echo $errors['org_address']; ?></div>

                                      <!-- organization contact -->
                                    <div class="fillup-input-group">
                                          <input required="" type="text" class="fillup-field" name="org_contact" id="formFileLgLabel" value="<?php echo $currentorg_contact ?>">
                                          <label class="fillup-label">Organization Contact Number</label>
                                    </div>
                                    <div class="red-text"><?php echo $errors['org_contact']; ?></div>


                                      <!-- organization description -->
                                   
                                    <div class="fillup-input-group">
                                      <!-- <input type="text" class="form-control form-control-lg" name="org_details" id="formFileLgLabel" value="<?php echo $currentorg_details ?>"> -->
                                          <textarea required="" type="text" class="fillup-field" name="org_details" id="formFileLgLabel" style="height:30rem;" value=""><?php echo $currentorg_details ?></textarea>
                                          <label class="fillup-label">Organization Decription</label>
                                    </div>
                                    <div class="red-text"><?php echo $errors['org_details']; ?></div>


                                </div>


                                  <div class="dashboard-organization-details-edits">
                                    <p class="dashboard-organization-details-title">Organization Admin Details</p>
                                    <!-- <label>Organization Admin Name</label><br> -->
                                    <div class="fillup-input-group">
                                          <input required="" type="text" class="fillup-field" name="org_admin" id="formFileLgLabel" value="<?php echo $currentorg_admin ?>">
                                          <label class="fillup-label">Organization Admin Name</label><br>
                                    </div>
                                    <div class="red-text"><?php echo $errors['org_admin']; ?></div>

                                    <!-- <label>Organization Admin Email</label><br> -->
                                    <div class="fillup-input-group">
                                            <input required="" type="text" class="fillup-field" name="org_adminEmail" id="formFileLgLabel" value="<?php echo $currentorg_adminEmail ?>">
                                            <label class="fillup-label">Organization Admin Email</label><br>
                                    </div>  
                                    <div class="red-text"><?php echo $errors['org_adminEmail']; ?></div>
                                  </div>    



                             

                              <!-- organzitaiong description -->
                              
                           







                                         
                    



                      
                             
                         
                          
         
                              <div class="dashboard-organization-button-placements">
                                      <a class="button-tertiary" href="../OrganizationView/OrganizationDetails.php"> Discard changes</a>
                                      <button class="button-quatary" id="submit_request" type="submit" name="submit" value="Update Organization Details">Save changes</button>
                              </div>          
 </div>
 
 </form>



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