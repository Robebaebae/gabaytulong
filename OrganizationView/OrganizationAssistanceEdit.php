<?php
session_start();

require('../functions/organizationCheck.php');
include('../sqlqueries/dbConnect.php');

$asst_id = $_GET["updateID"]; 
$_SESSION["asst_id"] = $asst_id;

include('../functions/funcOrganizationAssistanceEdit.php');
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
      <title>Edit - <?php echo $currentreq_asst_name?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../resources/assets/images/logo.svg" type="image/svg+xml">
   
    <link href="../resources/assets/css/dashboard.css?v=<?php echo time(); ?>" rel="stylesheet">
    <link href="../main.css?v=<?php echo time(); ?>" rel="stylesheet">
   
</head>
<body>
<?php include('../statics/navBar.php')?>

<section class="home-section">
    
<h1>EDIT ASSISTANCE OFFERED</h1>
<form  class="white" action="" method="POST" enctype="multipart/form-data" id="form"> 
<div class="dashboard-organization-details-content">
                            
                            

            <div class="dashboard-organization-details-edits">
                            
                  <h2> EDIT ASSSITANCE</h2>


                            <div class="fillup-input-group">
                                    <input required="" type="text" class="fillup-field" name="asst_name" id="formFileLgLabel" value="<?php echo $currentreq_asst_name ?>">
                                    <label class="fillup-label">Assitance Name</label>
                            </div>
                            <div class="red-text"><?php echo $errors['asst_name']; ?></div>

                            

                            <div class="fillup-input-group">
                                  <textarea rows="10" cols="60" type="text" class="fillup-field"  name="asst_desc" id="formFileLgLabel" value=""> <?php echo $currentreq_asst_desc ?>  </textarea>
                                  <label class="fillup-label">Assistance Description</label>
                            </div>
                            <div class="red-text"><?php echo $errors['asst_desc']; ?></div>

                            
                            <div class="fillup-input-group">
                                  <input  type="text" class="fillup-field" name="req_1" id="formFileLgLabel" value="<?php echo $currentreq_asst_req_1 ?>">
                                  <label class="fillup-label">Requirements: 1</label>
                            </div>
                             

                            <div class="fillup-input-group">
                                  <input  type="text" class="fillup-field" name="req_2" id="formFileLgLabel" value="<?php echo $currentreq_asst_req_2 ?>">
                                  <label class="fillup-label">Requirements: 2</label>
                            </div> 
                            
                            <div class="fillup-input-group">
                                  <input  type="text" class="fillup-field" name="req_3" id="formFileLgLabel" value="<?php echo $currentreq_asst_req_3 ?>">
                                  <label class="fillup-label">Requirements: 3</label>
                            </div>
                             

                            <div class="fillup-input-group">
                                  <input  type="text" class="fillup-field" name="req_4" id="formFileLgLabel" value="<?php echo $currentreq_asst_req_4 ?>">
                                  <label class="fillup-label">Requirements: 4</label>
                            </div>
                             

                            <div class="fillup-input-group">
                                  <input  type="text" class="fillup-field" name="req_5" id="formFileLgLabel" value="<?php echo $currentreq_asst_req_5 ?>">
                                  <label class="fillup-label">Requirements: 5</label>
                            </div>
                        				
              				 <div class="fillup-input-group">
                                  <input  type="text" class="fillup-field" name="req_6" id="formFileLgLabel" value="<?php echo $currentreq_asst_req_6 ?>">
                                  <label class="fillup-label">Requirements: 6</label>
                            </div> 
                            
                            <div class="fillup-input-group">
                                  <input  type="text" class="fillup-field" name="req_7" id="formFileLgLabel" value="<?php echo $currentreq_asst_req_7 ?>">
                                  <label class="fillup-label">Requirements: 7</label>
                            </div>
                             

                            <div class="fillup-input-group">
                                  <input  type="text" class="fillup-field" name="req_8" id="formFileLgLabel" value="<?php echo $currentreq_asst_req_8 ?>">
                                  <label class="fillup-label">Requirements: 8</label>
                            </div>
                             

                            <div class="fillup-input-group">
                                  <input  type="text" class="fillup-field" name="req_9" id="formFileLgLabel" value="<?php echo $currentreq_asst_req_9 ?>">
                                  <label class="fillup-label">Requirements: 9 </label>
                            </div>
              
              				<div class="fillup-input-group">
                                  <input  type="text" class="fillup-field" name="req_10" id="formFileLgLabel" value="<?php echo $currentreq_asst_req_10 ?>">
                                  <label class="fillup-label">Requirements: 10</label>
                            </div>
              
              



                           <div class="red-text"><?php echo $errors['req_1']; ?></div>
                        
            </div>





                            <!-- Submit button -->
                            <div class="dashboard-organization-button-placements">
                                  <button class="button-tertiary" ><a href="../OrganizationView/OrganizationAssistance.php">Discard changes</a> </button>
                                  <button  class='button-quatary' id="submit_request" type="submit" name="submit" value="Update Assistance"> Update Assistance</button>
                            </div>
                           

                          

                        
      
                       
</div>
</form>
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