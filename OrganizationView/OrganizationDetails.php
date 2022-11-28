<?php
session_start();

require('../functions/organizationCheck.php');
include('../sqlqueries/dbConnect.php');
include('../functions/fetchOrgDetails.php');

?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <title>Oganization Detail</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../resources/assets/images/logo.svg" type="image/svg+xml">



    <link href="../resources/assets/css/dashboard.css?v=<?php echo time(); ?>" rel="stylesheet">
    <link href="../main.css?v=<?php echo time(); ?>" rel="stylesheet">

</head>
<body>
<?php include('../statics/navBar.php')?>

<section class="home-section">
    


<form action="" method="POST" enctype="multipart/form-data" >  
<div class="dashboard-organization-details-content">
              
                
                <div class="dashboard-organization-details">  
                    <div class="dashboard-organization-image">
                        <img style="width:20rem;" src="<?php echo '../org_displaypic/'.$currentorg_dp?>" />
                    </div>



                    <h2 class="dashboard-organization-details-title" >Organization Details</h2>

                    <div class="fillup-input-group">
                            <input type="text" class="fillup-field" value="<?php echo $currentorg_name ?>">
                            <label  class="fillup-label">Organization name </label>
                    </div>

                    <div class="fillup-input-group">
                            <input type="text" class="fillup-field" value="<?php echo $currentorg_address ?>">
                            <label class="fillup-label">Organization address</label>
                    </div>        
                            
                    <div class="fillup-input-group">
                            
                            <input type="text" class="fillup-field" value="<?php echo $currentorg_contact ?>">
                            <label class="fillup-label">Contact number</label>
                    </div>
                    
                    <div class="fillup-input-group">
                            
                            <textarea rows="10" cols="60" type="text" class="fillup-field" value=""> <?php echo $currentorg_details ?></textarea>
                            <label class="fillup-label">Organization Decription</label> 
                    </div>
                </div>


                
                <div class="dashboard-organization-admin-details">
                      <h2 class="dashboard-organization-details-title">Organization Admin Details</h2>
                    
                       <div class="fillup-input-group">   
                            <input type="text" class="fillup-field" value="<?php echo $currentorg_admin ?>">       
                            <label class="fillup-label">Organization Admin Name</label>    
                       </div>   
                      
                       <div class="fillup-input-group">   
                            <input type="text" class="fillup-field" value="<?php echo $currentorg_adminEmail ?>">       
                            <label class="fillup-label">Organization Admin Email</label>    
                       </div> 
                </div>
                                                                     

    <div class="dashboard-organization-button-placements">
            <a class="button-tertiary" href="../OrganizationView/OrganizationDetailsEdit.php">Edit</a>
            <a class="button-secondary" href="../OrganizationView/OrganizationDetailsChangePass.php">Change Password</a>
            <a class="button-quatary open-button"><?php echo $currentorg_status?></a>
    </div>
          <dialog class="modal" id="modal">
                    <p class="dashboard-organization-details-title"> Organization Status</p>
                    <div class="dashboard-inside-model">
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    <p>Are you sure you want to set the organization status to </p><br><h2>
                    "<?php 
  					if($currentorg_status == "ACTIVE"){
                    	$change_status = "INACTIVE";
                    }
 				    else{
                    	$change_status = "ACTIVE";
                    }
 					echo $change_status?>"</h2>
                    </div>
                    <div class="dashboard-organization-button-placements">
                      
                      <button class="button-tertiary close-button"  data-mdb-dismiss="modal">Close</button>
                      <a class="button-quatary" href="../functions/fetchOrgDetailsActive.php">Change Status</a>
                    </div>
          </dialog>
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

  const modal = document.querySelector("#modal");
const openModal = document.querySelector(".open-button");
const closeModal = document.querySelector(".close-button");

openModal.addEventListener("click", () => {
  modal.showModal();
});

closeModal.addEventListener("click", () => {
  modal.close();
});
</script>


</body>
</html>