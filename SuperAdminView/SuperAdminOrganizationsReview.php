<?php
session_start();

$current_org_id = $_GET["updateID"]; 
$_SESSION["currentOrg_ID"] = $current_org_id;
$currentSpace = "No";

include('../functions/superAdminCheck.php');
include('../sqlqueries/dbConnect.php');
include('../functions/fetchCurrentOrgRev.php');

$sqlnew = 'SELECT * FROM assistance_offered INNER JOIN organizations ON assistance_offered.org_id = organizations.org_id'; 

$resultnew = mysqli_query($conn, $sqlnew);

//fetch the resulting rows 
$request_assistances = mysqli_fetch_all($resultnew, MYSQLI_ASSOC);

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

<form action="" method="POST" enctype="multipart/form-data">
<div class="dashboard-organization-details-content">

              <div class="dashboard-organization-details"> 
                      <div class="dashboard-organization-image">
                            <img style="width:10rem;" src="<?php echo '../org_displaypic/'.$currentorg_dp?>" />
                      </div>
                      
                        <h1><?php echo $currentorg_name?></h1>    

                            <div class="fillup-input-group">
                                  <input type="text" class="fillup-field" value="<?php echo $currentorg_id?>">
                                  <label class="fillup-label">Organization ID</label><br>
                            </div>


                            <div class="fillup-input-group">
                                  <input type="text" class="fillup-field" value="<?php echo $currentorg_name ?>">
                                  <label class="fillup-label">Organization Name</label>
                            </div>

                              
                            <div class="fillup-input-group"> 
                                  <input type="text" class="fillup-field"  value="<?php echo $currentorg_contact ?>">
                                  <label class="fillup-label">Contact Number</label><br>
                            </div>


                            <div class="fillup-input-group">
                              <input type="text" class="fillup-field"  value="<?php echo  $currentorg_address  ?>">
                              <label class="fillup-label">Address</label><br>
                            </div>
                
                			 <div class="fillup-input-group">
                              <input type="text" class="fillup-field"  value="<?php echo  $currentorg_status?>">
                              <label class="fillup-label">Status</label><br>
                            </div>
                
                			 <div class="fillup-input-group">
                              <input type="text" class="fillup-field"  value="<?php echo  $currentorg_stat_remark?>">
                              <label class="fillup-label">Status Remarks</label><br>
                            </div>
                
                			
              </div>

              <div class="dashboard-organization-admin-details">

                  <br>
                  <h2 id="newReq">Organization Admin Details</h2><br>



                  <div class="fillup-input-group">
                        <input type="text" class="fillup-field" value="<?php echo  $currentorg_admin  ?>">
                        <label class="fillup-label">Organization Admin</label>
                  </div>
                 

                  <div class="fillup-input-group">
                        <input type="text" class="fillup-field" value="<?php echo  $currentorg_adminEmail  ?>">
                  <label class="fillup-label">Organization Email</label>
                  <!-- <input class="btn btn-primary btn-lg" id="submit_request" type="submit" name="accept" value="Accept">
                  <input class="btn btn-primary btn-lg" id="submit_request" type="submit" name="decline" value="Decline"> -->

               

              </div>
                <h2 id="newReq">Organization Assistance Offered</h2><br>
                <div class="assistance-offered-card-border">
                <?php

                foreach($request_assistances as $request_assistance){
                    
                    $current_organization = $request_assistance['org_id'];
                  
                    if($current_organization == $current_org_id)
                    {
                        $currentSpace = "Yes";
                        echo "


                        <div class='assistance-offered-card' >
                                <p class='assistance-offered-card-title'>$request_assistance[asst_name]</p>

                                    <div class='organizationAssistance-request'>
                                        <p class='card-title'>Requirements</p>

                                        <p class='card-text'>$request_assistance[asst_req1]</p>
                                        <p class='card-text'>$request_assistance[asst_req2]</p>
                                        <p class='card-text'>$request_assistance[asst_req3]</p>
                                        <p class='card-text'>$request_assistance[asst_req4]</p>
                                        <p class='card-text'>$request_assistance[asst_req5]</p>
                                    </div>
                        </div>
                        ";
                        
                    }
                    
                }

                if($currentSpace == "No"){
                  echo "
                    <input readonly type='text' class='form-control form-control-lg' name='address' id='formFileLgLabel'  value='None'>
                  ";
                }
            
            ?>
            </div>
                
              
              </div>   <div class="dashboard-organization-button-placements">
                <a class="button-secondary" href="../SuperAdminView/SuperAdminOrganizations.php">Back</a>
              </div>     </div>      
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