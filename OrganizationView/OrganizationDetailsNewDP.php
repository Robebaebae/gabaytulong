<?php
session_start();

require('../functions/organizationCheck.php');
include('../sqlqueries/dbConnect.php');
include('../functions/fetchOrgDetailsDP.php');

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
    
<h1 class="dashboard-organization-details-title">Change Photo</h1>
<div class="dashboard-organization-details-content">
    <form  class="white" action="" method="POST" enctype="multipart/form-data" id="form"> 

                            <h4 class="dashboard-organization-details-title">Organization Display Photo</h4>
                            
                            <div class="dashboard-organization-image">
                                  <img style="width:20rem;" src="<?php echo '../org_displaypic/'.$currentorg_dp?>" class="rounded" />
                                  <br>

                                  <div class="form-input-file-show">
                                          <div class="preview">
                                              <img id="file-ip-1-preview">
                                          </div>

                                          <label for="file1-ip-1" >Upload New Photo </label>
                                          <input type="file" accept="image/*" name="org_dp" value="<?php echo $currentorg_dp?>" id="file1-ip-1" onchange="showPreview(event);">
                                  </div>
                                  <br>   
                                  <div class="red-text"><?php echo $errors['org_dp']; ?></div>
                                  <br>             

                                  <!-- Submit button -->
                                  <div class="dashboard-organization-button-placements">
                                  <a class="button-tertiary" href="../OrganizationView/OrganizationDetailsEdit.php"> Discard Changes</a>
                                  <button class="button-quatary" id="submit_request" type="submit" name="submit" value="Update Display Photo">Update Display Picture<br>
                                  </div>
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
<script type="text/javascript">
  function showPreview(event){
  if(event.target.files.length > 0){
    var src = URL.createObjectURL(event.target.files[0]);
    var preview = document.getElementById("file-ip-1-preview");
    preview.src = src;
    preview.style.display = "block";
  }
}


</script>
</body>
</html>