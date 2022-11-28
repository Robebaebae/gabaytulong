<?php
session_start();

$org_id = $_GET["updateID"]; 
$_SESSION["currentOrg_ID"] = $org_id;


include('../functions/superAdminCheck.php');
include('../sqlqueries/dbConnect.php');
include('../functions/fetchCurrentOrgRev.php');

?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
  <title>Organization Detail - <?php echo $currentorg_name?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link href="../main.css?v=<?php echo time(); ?>" rel="stylesheet">
    <link href="../resources/assets/css/dashboard.css?v=<?php echo time(); ?>" rel="stylesheet">
    <link rel="shortcut icon" href="../resources/assets/images/logo.svg" type="image/svg+xml"> 
</head>
<body>
<?php include('../statics/navBarSuperAdmin.php')?>

<section class="home-section">
    
<form class="wala-nako-maisip" action="" method="POST" enctype="multipart/form-data">
<!-- 
  <h1 id="newReq" ><?php echo $currentorg_name?></h1><br>          
  <h2 id="newReq" >Organization Details</h2><br>

                <div class="image-cropper">
                <img id="dp"src="<?php echo '../org_displaypic/'.$currentorg_dp?>" class="rounded" />
                </div><br>

                <label>Organization ID</label><br>
                <input readonly type="text" class="form-control form-control-lg" name="l_name" id="formFileLgLabel" value="<?php echo $currentorg_id?>">
                <br>

                <label>Organization Name</label><br>
                <input readonly type="text" class="form-control form-control-lg" name="email" id="formFileLgLabel" value="<?php echo $currentorg_name ?>">
                <br>
                <label>Contact Number</label><br>
                <input readonly type="text"  class="form-control form-control-lg" name="c_number" id="formFileLgLabel" value="<?php echo $currentorg_contact ?>">
                <br>

                <label>Address</label><br>
                <input readonly type="text" class="form-control form-control-lg" name="address" id="formFileLgLabel"  value="<?php echo  $currentorg_address  ?>">

                <br>
                <h2 id="newReq">Organization Admin Details</h2><br>

                <label>Organization Admin</label><br>
                <input readonly type="text" class="form-control form-control-lg" name="address" id="formFileLgLabel"  value="<?php echo  $currentorg_admin  ?>">
                <br>

                <label>Organization Email</label><br>
                <input readonly type="text" class="form-control form-control-lg" name="address" id="formFileLgLabel"  value="<?php echo  $currentorg_adminEmail  ?>">

             
                </div>

 -->
 <div class="dashboard-organization-pending-request">
          <div class="dashboard-organization-details-content" style="pointer-events:none ;"> 

          <h2 id="newReq" >Organization Details</h2><br>

                <div class="dashboard-organization-image">
                  <img style="width:10rem;" src="<?php echo '../org_displaypic/'.$currentorg_dp?>"/>
                </div>

                <h1 id="newReq" ><?php echo $currentorg_name?></h1><br>          
                  



                <div class="fillup-input-group">
                      <input required class="fillup-field" value="<?php echo $currentorg_id?>">
                      <label class="fillup-label">Organization ID</label>
                </div>

                <div class="fillup-input-group">
                      <input required class="fillup-field" value="<?php echo $currentorg_name ?>">
                      <label class="fillup-label">Organization Name</label>
                </div>

                <div class="fillup-input-group">
                      <input required class="fillup-field" value="<?php echo $currentorg_contact ?>">
                      <label class="fillup-label">Contact Number</label>
                </div>

                <div class="fillup-input-group">
                  <input required class="fillup-field"  value="<?php echo  $currentorg_address  ?>">
                  <label class="fillup-label">Address</label>
                </div>

          </div>
    <div class="dashboard-organization-details-content" >  
    <h2>Organization Admin Details</h2>
                <div class="fillup-input-group" style="pointer-events:none ;">
                        <input required class="fillup-field" value="<?php echo  $currentorg_admin  ?>">
                        <label class="fillup-label">Organization Admin</label>
                </div>
                  
                <div class="fillup-input-group" style="pointer-events:none ;">
                        <input required class="fillup-field" value="<?php echo  $currentorg_adminEmail  ?>">
                        <label class="fillup-label">Organization Email</label>
                </div>
    </div>


 </div>
              <div class="dashboard-organization-button-placements">
                <a class="button-secondary" style="width:15rem ;" href="../SuperAdminView/SuperAdminReports.php" >back</a>
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