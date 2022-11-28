<?php
session_start();

require('../functions/organizationCheck.php');
include('../sqlqueries/dbConnect.php');
include('../functions/fetchOrgAsstOffered.php');

?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <title>Assistance Offered</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../resources/assets/images/logo.svg" type="image/svg+xml">

    <link href="../resources/assets/css/dashboard.css?v=<?php echo time(); ?>" rel="stylesheet">
    <link href="../main.css?v=<?php echo time(); ?>" rel="stylesheet">
    
   
</head>
<body>
<?php include('../statics/navBar.php')?>

<section class="home-section">
    
<h1>ORGANZATION ASSISTANCE OFFERED</h1>
<div class="dashboard-organization-details-content">

<div class="add-new-assistance">
<a href='OrganizationAssistanceNew.php' id="submit_request" class="add-new button-quatary">
<object data="../resources/assets/icons/add.svg" width="24" height="24"></object>
  ADD NEW ASSISTANCE
</a>
</div>

<div class="assistance-offered-card-border">
     
     <?php
        foreach($request_assistances as $request_assistance){

            $current_organization = $request_assistance['org_id'];
            $current_asst_status = $request_assistance['asst_status'];
        
            if($current_organization == $org_UpdateID && $current_asst_status == "UNARCHIVED")
            {
                $current_asst_id = $request_assistance['asst_id'];
                $current_asst_name = $request_assistance['asst_name'];
                echo "
                <div class='assistance-offered-card' >
                    <p class='assistance-offered-card-title'>$request_assistance[asst_name]</p>

                    <div class='organizationAssistance-request'>
                        <p class='card-text-title'>Requirements </p>

                        <p class='card-text'>$request_assistance[asst_req1]</p>
                        <p class='card-text'>$request_assistance[asst_req2]</p>
                        <p class='card-text'>$request_assistance[asst_req3]</p>
                        <p class='card-text'>$request_assistance[asst_req4]</p>
                        <p class='card-text'>$request_assistance[asst_req5]</p>
                        <p class='card-text'>$request_assistance[asst_req6]</p>
                        <p class='card-text'>$request_assistance[asst_req7]</p>
                        <p class='card-text'>$request_assistance[asst_req8]</p>
                        <p class='card-text'>$request_assistance[asst_req9]</p>
                        <p class='card-text'>$request_assistance[asst_req10]</p>
                        
                    </div>
                        

                    <div class='edit-and-archive'>
                          <a class='button-tertiary' href='../OrganizationView/OrganizationAssistanceEdit.php?updateID=$request_assistance[asst_id]' id='submit_request' >Edit</a>
                          <a class='button-quatary' href='../OrganizationView/OrganizationAssistanceArchive.php?updateID=$request_assistance[asst_id]' id='submit_request' >Archive</a>
                    </div>
                    
                       
                </div>


                ";
                
            }
        }
    ?>

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