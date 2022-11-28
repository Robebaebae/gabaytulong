<?php
session_start();

require('../functions/organizationCheck.php');
include('../sqlqueries/dbConnect.php');
include('../functions/fetchOrgAsst.php');

$num_per_page = 5;
$_SESSION['numpage'] = $num_per_page;
$_SESSION['currentPage'] = 1;


    if(isset($_GET["page"]))
        {
            $page=$_GET["page"];
      		$_SESSION['currentPage'] = $page;
        }
    else
        {
            $page=1;
        }

$start_from=($page-1)*$num_per_page;
$_SESSION['start_from'] = $start_from

?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <title>Pending Request</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../resources/assets/images/logo.svg" type="image/svg+xml">
    <link href="../resources/assets/css/dashboard.css?v=<?php echo time(); ?>" rel="stylesheet">
    <link href="../main.css?v=<?php echo time(); ?>" rel="stylesheet">
</head>
<body>
<?php include('../statics/navBar.php')?>

<section class="home-section">

<h1>ORGANZATION PENDING REQUESTS</h1>
<div class="dashboard-organization-details-content" style="height: 80rem;">



            <div class="fillup-input-group">
                      <input required type="text" name="search_text" id="search_text"  class="fillup-field">
                      <label class="fillup-label">Search requestor</label>
            </div>


    <div class="assistance-offered-fillup-form-barangay" style="margin:1rem;">
        <label for="fetchVal" class="activitylog-title">Filter By: </label>  
            <div class="select">
                      <select name="fetchVal" id="fetchval">
                            <?php
                            foreach($assistances_offered as $assistance_offered) { 
                              echo "working";
                              $currentAsst = $assistance_offered["asst_id"];
                              $orgUnder = $assistance_offered["org_id"];
                              
                              if ($orgUnder == $_SESSION["organization"])
                                  {
                                      echo ("<option value='$assistance_offered[asst_name]' selected=''>$assistance_offered[asst_name]</option>");
                                  }
                            }

                            ?>
                            <option value="APPROVED" selected="">APPROVED</option>
                            <option value="DECLINED" selected="">DECLINED</option>
                            <option value="PENDING" selected="">PENDING</option>
                            <option value="All" selected="">All</option>
                      </select>
          </div>
    </div>

  
    <div id="searchResult" >

    </div>
  
</div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript">

//filter
$(document).ready(function(){ 

  $("#fetchval").on('change',function(){
    var value = $(this).val();
    $.ajax({
    url:"../functions/orgRequestSearch.php",
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
  url:"../functions/orgRequestSearch.php",
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

<script>
$(document).ready(function(){
    $('#selectAll').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
	
    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#selectAll').prop('checked',true);
        }else{
            $('#selectAll').prop('checked',false);
        }
    });
});
</script>




</body>
</html>
