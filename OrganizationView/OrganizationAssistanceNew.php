<?php
session_start();

require('../functions/organizationCheck.php');
include('../sqlqueries/dbConnect.php');
include('../functions/funcOrganizationAssistanceNew.php');

?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
      <title>Add New Assistance</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../resources/assets/images/logo.svg" type="image/svg+xml">
   
    <link href="../resources/assets/css/dashboard.css?v=<?php echo time(); ?>" rel="stylesheet">
    <link href="../main.css?v=<?php echo time(); ?>" rel="stylesheet">
   
</head>
<body>
<?php include('../statics/navBar.php')?>

<section class="home-section">
    
<h1>NEW ASSISTANCE OFFERED</h5>
<div class="dashboard-organization-details-content">

                            
                            <form  class="white" action="" method="POST" enctype="multipart/form-data" id="form"> 

                        <div class="dashboard-organization-details-edits">
                            <h2 >NEW ASSSITANCE</h2>

                            <div class="fillup-input-group">
                                  <input required type="text" class="fillup-field" name="asst_name" id="formFileLgLabel" value="<?php echo htmlspecialchars($asst_name) ?>">
                                  <label class="fillup-label">Assitance Name</label>
                            </div>
                            <div class="red-text"><?php echo $errors['asst_name']; ?></div>

                            
                            <div class="fillup-input-group">
                                  <textarea required type="text" class="fillup-field" name="asst_desc" id="formFileLgLabel" value=""<?php echo htmlspecialchars($asst_desc) ?>></textarea>
                                  <label class="fillup-label">Assistance Description</label>
                            </div>
                            <div class="red-text"><?php echo $errors['asst_desc']; ?></div>
							<h2>NUMBER OF REQUIREMENTS</h2>
                          	<div class="select" style="margin-left:.5%">
               			
                                <select name="fetchVal" id="fetchval">
                                     
                                  <option value="1" selected="">1</option>
                                  <option value="2" selected="">2</option>
                                  <option value="3" selected="">3</option>
                                  <option value="4" selected="">4</option>
                                  <option value="5" selected="">5</option>
                                  <option value="6" selected="">6</option>
                                  <option value="7" selected="">7</option>
                                  <option value="8" selected="">8</option>
                                  <option value="9" selected="">9</option>
                                  <option value="10" selected="">10</option>
                                  <option value="" selected="">Choose Number of Requirements</option>
                                  
                                </select>
                    		</div>
                          
                          
                          	<div id="searchResult" style="width:100%"></div>
                            
                            
                          
                            <div class="red-text"><?php echo $errors['req_1']; ?></div>

                            <!-- Submit button -->
                            <div class="dashboard-organization-button-placements">
                                        <button class="button-tertiary"><a href="../OrganizationView/OrganizationAssistance.php">Cancel</a></button>
                                        <button class='button-quatary' id="submit_request" type="submit" name="submit" >Add New Assistance</button>
                            </div>
                        </div>
                            </form>
</div>

</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript">

//filter
$(document).ready(function(){ 

    $("#fetchval").on('change',function(){
    var value = $(this).val();
    $.ajax({
    url:"../functions/numberOfReq.php",
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
  url:"../functions/numberOfReq.php",
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