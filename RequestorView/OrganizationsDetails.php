<?php
session_start();
include('../functions/requestorCheck.php');

$org_id = $_GET["updateId"]; 
$_SESSION["currentOrg"] = $org_id;

include('../sqlqueries/dbConnect.php');
include('../functions/fetchOrgAsst.php');

?>

<!DOCTYPE html>
<html>

<title><?php echo $_SESSION["currentOrgName"];?></title>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="../main.css?php echo time(); ?>" rel="stylesheet">
<link rel="shortcut icon" href="../resources/assets/images/logo.svg" type="image/svg+xml">
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
                                             
                                              <!-- <li class="navbar-item">
                                                <a href="..\RequestorView\Organizations.php"><button id="btn2" class="button-secondary">Organizations</button></a>
                                              </li> -->
                                              
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
<section class="section-assitance-offered">
<div class="assitance-offered-content">
   

<div class="assistance-organization-name-details">
        <p class="assistance-organization-name"><?php echo $_SESSION["currentOrgName"];?></p>


        <p class="assistance-organization-details"><?php echo $currentorg_details?></p>
</div>  




    <p id="orgName" class="assistance-offered-text">Assistance Offered</p>
                         
    <div class="assistance-offered-card-border ">
                   

                        <?php foreach($assistances_offered as $assistance_offered) { 
                        
                        $currentAsst = $assistance_offered['asst_id'];
                        $currentAsstStatus = $assistance_offered['asst_status'];
                        $orgUnder = $assistance_offered['org_id'];
                        $output = "";
                        if ($orgUnder == $_SESSION["currentOrg"] && $currentAsstStatus == "UNARCHIVED")
                            {
                            $output.='
                            <div id="assistance_offered" class="OrganizationsDetails assistance-offered-card " >
                       
                         
                            <p id="asst_name" class="assistance-offered-card-title">'.htmlspecialchars($assistance_offered['asst_name']).'</p>
                            <p class="assistance-offered-card-description">'.htmlspecialchars($assistance_offered['asst_description']).'</p>
                    
                            <div class="assistance-offered-card-content-bottom">
                                <p class="assistance-offered-card-content-bottom-title" ><object data="../resources/assets/icons/requirements.svg" width="13" height="13"></object> Requirements:</p>
                                <p class="requestor-view-org-offered-req"> '.htmlspecialchars($assistance_offered['asst_req1']).'</p>
                                <p class="requestor-view-org-offered-req"> '.htmlspecialchars($assistance_offered['asst_req2']).'</p>
                                <p class="requestor-view-org-offered-req"> '.htmlspecialchars($assistance_offered['asst_req3']).'</p>
                                <p class="requestor-view-org-offered-req"> '.htmlspecialchars($assistance_offered['asst_req4']).'</p>
                                <p class="requestor-view-org-offered-req"> '.htmlspecialchars($assistance_offered['asst_req5']).'</p>
                                <p class="requestor-view-org-offered-req"> '.htmlspecialchars($assistance_offered['asst_req6']).'</p>
                                <p class="requestor-view-org-offered-req"> '.htmlspecialchars($assistance_offered['asst_req7']).'</p>
                                <p class="requestor-view-org-offered-req"> '.htmlspecialchars($assistance_offered['asst_req8']).'</p>
                                <p class="requestor-view-org-offered-req"> '.htmlspecialchars($assistance_offered['asst_req9']).'</p>
                                <p class="requestor-view-org-offered-req"> '.htmlspecialchars($assistance_offered['asst_req10']).'</p>
                            </div>
                            <a class="button-secondary" href="OrganizationAsstForm.php?updateId='.$currentAsst.'">Apply now</a>
                        
                            </div>
                            
                            
                            
                            ';
                            
                            
            
                            echo $output;
                            }
                        }
                        ?>
              
    </div>


   
    


</div>
</section>
</article>
</main>
<script src="..\script.js" defer></script>

</body>
</html>