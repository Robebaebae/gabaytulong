<?php
session_start();

include('../functions/superAdminCheck.php');
include('../sqlqueries/dbConnect.php');


$num_per_page = 5;
$_SESSION['numpage'] = $num_per_page;
$_SESSION['currentPage_5'] = 1;


    if(isset($_GET["page"]))
        {
            $page=$_GET["page"];
      		$_SESSION['currentPage_5']=$page;
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
  <title>Pending Organization</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <link href="../main.css?v=<?php echo time(); ?>" rel="stylesheet">
    <link href="../resources/assets/css/dashboard.css?v=<?php echo time(); ?>" rel="stylesheet">
    <link rel="shortcut icon" href="../resources/assets/images/logo.svg" type="image/svg+xml">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
</head>
<body>
<?php include('../statics/navBarSuperAdmin.php')?>

<section class="home-section">

<h1>PENDING ORGANIZATIONS</h1>
<div class="dashboard-organization-details-content" style="height: 80rem;">



            <div   div class="fillup-input-group">
                      <input required type="text" name="search_text" id="search_text"  class="fillup-field">
                      <label class="fillup-label">Search pending organization</label>
            </div>
            <br>

            <div id="searchResult">

            </div>
  
</div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript">

//filter
$(document).ready(function(){ 

load_data();

//search
function load_data(query)
{
 $.ajax({
  url:"../functions/adminPendingRequestSearch.php",
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
