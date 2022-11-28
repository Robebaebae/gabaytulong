<?php
session_start();
$_SESSION['requestor'] = "requestor";

$_SESSION["allowedReq"] = 10;
$_SESSION["reqCounter"] = 1;

include('../functions/requestorCheck.php');
include('../sqlqueries/dbConnect.php');

$num_per_page = 3;
$_SESSION['numOrgpage'] = $num_per_page;
$_SESSION['currentPage_7'] = 1;


    if(isset($_GET["page"]))
        {
            $page=$_GET["page"];
      		$_SESSION['currentPage_7'] = $page;
        }
    else
        {
            $page=1;
        }

$start_from=($page-1)*$num_per_page;
$_SESSION['start_from_org'] = $start_from

?>

<!DOCTYPE html>
<html>
<title>Gabay Tulong - Organizations</title>
<head>
<link rel="shortcut icon" href="../resources/assets/images/logo.svg" type="image/svg+xml">
<link href="../main.css?v=<?php echo time(); ?>" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<header class="header" data-header style="background-color: white;  padding-block:25px;box-shadow:0px 4px 4px hsla(231, 20%, 49%, 0.06); ">
    <div class="container">

      <a href="..\Main.php" class="logo">
        <img src="../resources/assets/images/logo.svg" alt="logo" width="42">
        <div class="logo-text">
          <span class="logo-title">GABAY TULONG</span>
          <span class="logo-subtitle">Para sa lahat ng MALOLEÑO</span>
        </div>
      </a>

      <nav class="navbar" data-navbar>

            <div class="wrapper">
                  <a href="..\Main.php">
                      <div class="logo-text">
                          <span class="logo-title mobile">GABAY TULONG</span>
                          <span class="logo-subtitle mobile">Para sa lahat ng MALOLEÑO</span>
                        </div>
                  </a>

                  <button class="nav-close-btn" data-nav-toggler>
                  <img src="../resources/assets/icons/close.svg" alt="" width="24"></img>
                  </button>
            </div>

            <ul class="navbar-list">
                                        
                                                
                                        
                                        <div class="sidenav">
                                             
                                              <li class="navbar-item">
                                                <a href="ViewApplication.php"><button id="btn2" class="button-secondary">View Application Status</button></a>
                                              </li>
                                        </div>


            </ul>
      </nav>
  
        <!-- 
         <a  -->
    
        <div class="overlay" data-nav-toggler data-overlay></div>
  
        <button class="nav-open-btn"  data-nav-toggler>
        <img src="../resources/assets/icons/menu.svg" alt="" width="24">
        </button>
     
    </div>
  </header>

<main>
<article>
<section class="section-organizations">
    <div class="organizations-content">

        <h1 class="organization-title">ORGANIZATIONS</h1>
            <div class="search-container">
                <img src="../resources/assets/icons/search1.svg" aria-hidden="true" class="icon" alt="search">
                <input type="text" name="search_text" id="search_text" placeholder="Search Organizations" class="organization-search" />
            </div>
        
    

                <div id="searchResult">
                </div>

          
    </div>
</section>
</article>
</main>
    <script src="..\script.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">

//filter
$(document).ready(function(){ 

load_data();

//search
function load_data(query)
{
 $.ajax({
  url:"../functions/reqOrgSearch.php",
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