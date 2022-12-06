<?php
session_start();

$org_id = $_GET["updateID"]; 
$_SESSION["currentOrg_ID"] = $org_id;


include('../functions/superAdminCheck.php');
include('../sqlqueries/dbConnect.php');
include('../functions/fetchCurrentOrgPendRev.php');

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
                      <div class="dashboard-organization-button-placements">
                           <div id="searchResult" style="margin:0%;"></div>
                      </div> 



                <h2>Organization Admin Details</h2>

                
                <div class="fillup-input-group" style="pointer-events:none ;">
                        <input required class="fillup-field" value="<?php echo  $currentorg_admin  ?>">
                        <label class="fillup-label">Organization Admin</label>
                </div>
                  
                <div class="fillup-input-group" style="pointer-events:none ;">
                        <input required class="fillup-field" value="<?php echo  $currentorg_adminEmail  ?>">
                        <label class="fillup-label">Organization Email</label>
                </div>
                      <label style="margin-left:1%">Organization Admin ID</label>

                      <div class="organization-requestor-review-images" style="margin-left:1%">
                            
                            <embed class="myImages" id="myImg" src="../organization_requirements/<?php echo $currentorg_adminID;?>" style="margin-left:1rem;" width="200rem" height="120rem" >
                            <label class="request-preview-title"><?php echo $currentorg_adminID; ?></label>
                                    
                            <div class="download-and-preview">
                                    <a class="button-quatary" style="width:100%;"href="../functions/adminRequestorDownload.php?file=<?php echo $currentorg_adminID; ?>">
                                    <object data="../resources/assets/icons/download.svg" width="24" height="24"></object> Download
                                    </a>
                                    
                            </div>
                      </div>

				<div class="assistance-offered-fillup-form-barangay" >
            
                <h3 for="fetchVal" >Remarks :</h3>
                    <div class="select" style="margin-left:-1%">
                                <select name="fetchVal" id="fetchval">
                                        <option value="Complete Requirements!" selected="">Complete Requirements!</option>
                                        <option value="Incomplete Requirements!" selected="">Incomplete Requirements!</option>
                                  		<option value="Invalid Requirements!" selected="">Invalid Requirements!</option>
                                        <option value="Requirements does not match!" selected="">Requirements does not match!</option>
                                  		<option value="Credentials does not match" selected="">Credentials does not match!</option>
                                   		<option value="Duplicate Application!" selected="">Duplicate Application!</option>
                                        <option value="Other Reason:" selected="">Other Reason.</option>
                                        <option value="No Remarks" selected="">No Remarks.</option>
                                </select>
              
                    </div>
                  <div class="fillup-input-group" style="width:102%;margin-left:-2%;">
                        <input  required class="fillup-field" type="text" name="otherVal" id="otherVal" value="">
                        <label class="fillup-label">Other Remarks</label>
                    </div>
            	</div>
			







           </div>

          


                
              


    
       






</div>
          <div class="dashboard-organization-button-placements">
                <a class="button-secondary" href="../SuperAdminView/SuperAdminOrganizations.php" style="width:15rem ;">Back</a>
          </div>
</form>
  
  <div id="myModal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="img01">
  </div>
  
</section>

<script type="text/javascript">
  // create references to the modal...
var modal = document.getElementById('myModal');
// to all images -- note I'm using a class!
var images = document.getElementsByClassName('myImages');
// the image in the modal
var modalImg = document.getElementById("img01");


// Go through all of the images with our custom class
for (var i = 0; i < images.length; i++) {
  var img = images[i];
  // and attach our click listener for this image.
  img.onclick = function(evt) {
    console.log(evt);
    modal.style.display = "block";
    modalImg.src = this.src;
  }
}

var span = document.getElementsByClassName("close")[0];

span.onclick = function() {
  modal.style.display = "none";
}
</script>
  

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript">

//filter
$(document).ready(function(){ 

    $("#fetchval").on('change',function(){
    var value = $(this).val();
    $.ajax({
    url:"../functions/adminsuperRequestButtons.php",
    method:"POST",
    data: 'request='+ value,
    success:function(data)
    {
    $('#searchResult').html(data);
    }
  });
});


load_data();

//search
function load_data(query)
{
 $.ajax({
  url:"../functions/adminsuperRequestButtons.php",
  method:"POST",
  data:{query:query},
  success:function(data)
  {
   $('#searchResult').html(data);
  }
 });
}

$('#search_text').keyup(function(){
 var search = $(this).val();
 if(search != '')
 {
  load_data(search);
 }
 else
 {
  load_data();
 }
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