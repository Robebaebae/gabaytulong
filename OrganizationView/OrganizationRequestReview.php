<?php
session_start();

$req_id = $_GET["updateID"]; 
$_SESSION["currentReq_ID"] = $req_id;
$_SESSION["allowedReq"] = 10;

require('../functions/organizationCheck.php');
include('../sqlqueries/dbConnect.php');
include('../functions/fetchCurrentReqRev.php');

if(!empty($_GET['file']))
{
	$filename = basename($_GET['file']);
	$filepath = '../request_requirements/'.$filename;
}
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
  <title>Pending - <?php echo $currentreq_req_type?> - <?php echo $currentreq_fullname?> </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../resources/assets/images/logo.svg" type="image/svg+xml">
   
    <link href="../resources/assets/css/dashboard.css?v=<?php echo time(); ?>" rel="stylesheet">
    <link href="../main.css?v=<?php echo time(); ?>" rel="stylesheet">  
</head>
<body>
<?php include('../statics/navBar.php')?>

<section class="home-section">

<h1>PENDING REQUEST :  <?php echo $currentreq_req_type?> </h1>


<form class="wala-nako-maisip" action="" method="POST" enctype="multipart/form-data">
  
<div class="dashboard-organization-pending-request">
      <div class="dashboard-organization-details-content" >

                
                <h3 >Personal Information :</h3>
                <div class="organization-requestor-preview-text">
                     
                    <div class="fillup-input-group">
                        <input  required class="fillup-field" type="text" name="l_name" id="formFileLgLabel" value="<?php echo $currentreq_fullname?>">
                        <label class="fillup-label">Full Name</label>
                    </div>
                    

                    <div class="fillup-input-group">
                          <input required class="fillup-field" type="text" name="email" id="formFileLgLabel" value="<?php echo $currentreq_req_email ?>">
                          <label class="fillup-label">Email</label>
                    </div>

                    <div class="fillup-input-group">
                          <input required class="fillup-field" type="text" name="c_number" id="formFileLgLabel" value="<?php echo $currentreq_req_contact ?>">
                          <label class="fillup-label">Contact Number</label>
                    </div>

                    <div class="fillup-input-group">
                          <input required class="fillup-field" type="text" name="address" id="formFileLgLabel"  value="<?php echo  $currentreq_req_address  ?>">
                          <label class="fillup-label">Address</label>
                    </div>
                </div>


                <h3>Requirements :</h3>
                <div class="organization-requestor-preview">
                <?php 
                $number_requests = 1;
 				$_SESSION["allowedReq"] = 10;
                while($number_requests <= $_SESSION["allowedReq"]){
                ?>

                <?php if(${'currentreq_req_'.$number_requests} != ""){
                   
                    ?>
                    <div class="organization-requestor-review-images">
                      <label class="request-preview-title"><?php echo ${'currentreq_title_'.$number_requests}; ?></label>
                      <embed class="myImages" id="myImg" src="../request_requirements/<?php echo ${'currentreq_req_'.$number_requests}; ?>"  style="margin-left:25%;" width="150rem" height="100rem" />
                      <label class="request-preview-result" style="text-align:center;"><?php echo ${'currentreq_req_'.$number_requests}; ?></label>
                    


                      <div class="download-and-preview" >
                              <a class="button-quatary" style="width:100%;"href="../functions/orgRequestorDownload.php?file=<?php echo ${'currentreq_req_'.$number_requests}; ?>">
                              <object data="../resources/assets/icons/download.svg" width="24" height="24"></object> Download
                              </a>
                
                      </div>
                                
                                
                    </div>

                    <?php }
                
                else{ 
               
                   
                } $number_requests++;
                }?>
                </div>
             
      </div>
      <div class="dashboard-organization-details-content-right">
            
              
   
            <div class="assistance-offered-fillup-form-barangay" >
            
                <h3 for="fetchVal" style="margin-top:1%" >Remarks :</h3>
                    <div class="select">
                                <select name="fetchVal" id="fetchval">
                                        <option value="Complete Requirements!" selected="">Complete Requirements!</option>
                                        <option value="Incomplete Requirements!" selected="">Incomplete Requirements!</option>
                                  		<option value="Invalid Requirements!" selected="">Invalid Requirements!</option>
                                        <option value="Requirements does not match!" selected="">Requirements does not match!</option>
                                  		<option value="Credentials does not match" selected="">Credentials does not match!</option>
                                   		<option value="Duplicate Request!" selected="">Duplicate Request!</option>
                                 		<option value="Other Reason:" selected="">Other Reason.</option>
                                        <option value="No Remarks" selected="">No Remarks.</option>
                                </select>
                    </div>
              		<div class="fillup-input-group" style="width:102%;margin-left:-1%;padding:1%">
                        <input type="text" name="otherVal" id="otherVal" value="" style="padding:1.5%;border-radius: .5rem;">
                        <label class="fillup-label" style="margin-top:0%;">Other Remarks</label>
                    </div>
            </div>
            <div id="searchResult" class="a-c"></div>
            
      </div>
  


</div>
      <div class="dashboard-organization-button-placements">
       <a class="button-secondary" href="../OrganizationView/OrganizationRequest.php" style="width:15rem ;">Back</a>
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
    url:"../functions/adminRequestButtons.php",
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
  url:"../functions/adminRequestButtons.php",
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


</body>
</html>