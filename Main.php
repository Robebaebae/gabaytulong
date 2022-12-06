<?php
session_start();


include('functions/mainGetData.php');

?>

<!DOCTYPE html>
<html lang="en">

  <head>
  <title>Gabay Tulong Para sa lahat ng MALOLEÑO</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8">
  <meta name="description" content="GABAY TULONG Para sa lahat ng MALOLEÑO">
  <meta name="keywords" content="tulong,malolos,bulacan,gabay,tulong,mololeno">

  <link href="main.css?v=<?php echo time(); ?>" rel="stylesheet">
  <link rel="shortcut icon" href="resources/assets/images/logo.svg" type="image/svg+xml">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/countup.js/2.0.0/countUp.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js" integrity="sha512-d8F1J2kyiRowBB/8/pAWsqUl0wSEOkG5KATkVV4slfblq9VRQ6MyDZVxWl2tWd+mPhuCbpTB4M7uU/x9FlgQ9Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"></script>
  </head>

<body>

<!-- Navigation Area -->
<!--Home-->
<!--Services  -->
<!--Features -->
<!--docs -->
<!--About Us -->
<header class="header" data-header>
    <div class="container">

      <a href="#" class="logo">
        <img src="resources/assets/images/logo.svg" alt="logo" width="42">
        <div class="logo-text">
          <span class="logo-title">GABAY TULONG</span>
          <span class="logo-subtitle">Para sa lahat ng MALOLEÑO</span>
        </div>
      </a>

      <nav class="navbar" data-navbar>

            <div class="wrapper">
              <a href="#" >
                  <div class="logo-text">
                    <span class="logo-title mobile">GABAY TULONG</span>
                    <span class="logo-subtitle mobile">Para sa lahat ng MALOLEÑO</span>
                  </div>
              </a>
                  <button class="nav-close-btn" value="close" data-nav-toggler>
                  <img src="./resources/assets/icons/close.svg" alt="close" width="24">
                  </button>
            </div>

            <ul class="navbar-list">
                                        
                                                    <li class="navbar-item">
                                                      <a href="#home" class="navbar-link" data-nav-link>Home</a>
                                                    </li>

                                                    <li class="navbar-item">
                                                      <a href="#services" class="navbar-link" data-nav-link>Services</a>
                                                    </li>

                                                    <li class="navbar-item">
                                                      <a href="#features" class="navbar-link" data-nav-link>Features</a>
                                                    </li>

                                                    <li class="navbar-item">
                                                      <a href="#total" class="navbar-link" data-nav-link>Tally</a>
                                                    </li>
                                        
                                        <div class="sidenav">
                                              <li class="navbar-item">
                                                <a href="RequestorView/Organizations.php"><button id="btn1" class="button-tertiary">Requestor</button></a>
                                              </li>
                                              <li class="navbar-item">
                                                <a href="OrganizationView/OrganizationLogin.php"><button id="btn2" class="button-secondary">Organizations</button></a>
                                              </li>
                                        </div>


            </ul>
      </nav>
  
        <!-- 
         <a  -->
    
        <div class="overlay" data-nav-toggler data-overlay></div>
  
        <button class="nav-open-btn" value="open" data-nav-toggler>
        <img src="./resources/assets/icons/menu.svg" alt="open" width="24">
        </button>
     
    </div>
  </header>





  <main>
    <article>

      <!-- Home Area -->
      <section id="home" class="view-application-container homesec" style= "background-color: white; margin: 0rem;">
               
      
        <div class="view-application-contents" >
          <div class="view-application-details-right">
              <h1 class="h1 home-text">A website that helps those in need and for those who want to help.</h1>
              <p class="home-text">
              Gabay Tulong Para sa Lahat ng Maloleno is a website that will enable an organization to provide assistance, donate to those in need, and volunteer to help. Residents of Malolos can file a request for any kind of support they need.
              </p>
            <div class="home-btns">
            <button href="OrganizationView\OrganizationLogin.php" class="button-quatary open-button">How It Works</button>
          
            </div>
          </div>

          <div class="qrcode-animation-left">
              <figure class="hero-banner">
                      <img src="resources/assets/images/new-hero-banner.png" alt="malolos" class="w-100"></img>
              </figure>
          </div>
   
          <dialog class="modal_vid" id="modal_vid">
                      <button class="button-tertiary close-button" style="right:0 ;"  data-mdb-dismiss="modal_vid">Close</button>
                      <video  width="1000" height="100%" controls style="margin-top:2%">
                      <source src="resources/assets/video/My Video.webm" alt="gabaytulong">
                      <source url="https://youtu.be/40dz5qwkRY8" alt="gabaytulong" type="video/mp4">
                      <source src="https://youtu.be/40dz5qwkRY8" alt="gabaytulong" type="video/mp4">
                      </video>
                    
          </dialog>








        </div>
      </section>
      <!-- Home End -->








      <!-- Services Area --> 
    <section id="services"  class="view-application-container services" style= "background-color: var(--section-color-services); margin: 0rem;">
     
      <div class="view-application-contents serviceSec">
      <p class="name-section">Services</p>
            <div class="qrcode-animation-left">
                <figure class="hero-banner">
                  <img src="resources/assets/images/services-banner-o.png"  width="702" height="654" alt="services" class="w-100"></img>
                </figure>
            </div>


            <div class="view-application-details-right">
                <h1 class="h1 home-text">Continuous service for the citizens of Malolos</h1>
                      <p class="home-text">
                      Accessible in both web and mobile form, Gabay Tulong Para Sa Lahat ng Maloleno has services that cater towards the requestors.  
                      </p>
                    <div class="service-list">
                      <div class="service-list-item">
                        <img src="resources/assets/images/applicationform.svg" alt="application-form" class="image-services-icons" style="--color: 	33, 80%, 76%">
                            <div class="titleofservies"><h2>Application form</h2>
                                <p>Apply now for assistance you need from our trusted organizations, just provide your given information and click submit. </p>
                             </div>
                      </div>

                      <div class="service-list-item">
                        <img src="resources/assets/images/organizationService.svg" alt="oganizationz" class="image-services-icons" style="--color:241, 63%, 91%">
                            <div class="titleofservies"><h2>Organization</h2>
                                <p>Trusted organizations from the City of Malolos will provide a variety of assistance for the requestors. </p>
                             </div>
                      </div>
                      

                      
                      <div class="service-list-item">
                        <img src="resources/assets/images/status.svg" alt="application-status" class="image-services-icons" style="--color: 351, 85%, 82%">
                            <div class="titleofservies"><h2>Realtime application status</h2>
                                <p>The application will be processed the moment you click submit. </p>
                             </div>
                      </div>

                  
                    </div>
            </div>
            


           




    </div>
    </section>
      <!-- Services End -->







      <!-- Features Area -->
      <section id="features" class="view-application-container features">
            
        <div class="view-application-contents featureSec" >
        <p class="name-section">Features</p>
       
        <div class="features-card-container">
        <div class="featured-title">
          <h2>Quality of life features of Gabay Tulong Para sa Lahat ng Maloleno</h2>
          <p>Here are the key features of our website that gives an exceptional user experience</p>
        </div>
              <div class="features-card">
                
                          <div class="features-card-icon">
                                  <img src="resources/assets/images/realtime.svg" alt="" width="200" height="200">
                          </div>
                        <div class="features-card-details">
                          <h2>Accessible</h2>
                          <p class="p">
                          Gabay Tulong Para sa Lahat ng Maloleno could be accessed through different devices for the convenience of its users.
                          </p>
                        </div>
              </div>

              <div class="features-card">
                        <div class="features-card-icon">
                                  <img src="resources/assets/images/qrcodee.svg" alt="" width="200" height="200">
                        </div>
                        <div class="features-card-details">
                              <h2>Convenient</h2>
                              <p class="p">
                              Users could check the status of their request in real time using the generated QR code and Reference ID provided.    
                              </p>
                        </div>
            </div>


            <div class="features-card">
                    <div class="features-card-icon" style="margin-top:8%;margin-left:5%">
                      <img src="resources/assets/images/dashboarrd.svg" alt="" width="220" height="200">
                    </div>
                    <div class="features-card-details">
                              <h2>Quick</h2>
                              <p class="p">
                              Users can enjoy the quick process of availing the assistance offered by the different organizations around Malolos .
                              </p>
                    </div>
            </div>


        </div>

        </div>
      </section>
      <!-- Features End -->


<!-- Total Approved Area --> 
    <section id="total"  class="view-application-container services" style= "background-color: var(--section-color-services); margin: 0rem;">
     
     <div class="view-application-contents serviceSec">
     <p class="name-section">Live Tally</p>
       
       <div class="featured-title">
          <h2 style="color:hsl(218, 72%, 18%);">A live tally for Gabay Tulong Para sa Lahat ng Maloleno.</h2>
          <p style="font-size:2rem; color:hsl(218, 72%, 18%);">Here are the tallies for Beneficiaries, Received Request,</p>
         <p style="font-size:2rem; color:hsl(218, 72%, 18%);">Active Organizations, and Available Assistance.</p>
          <p style="font-size:2rem; color:hsl(218, 72%, 18%);">As of <?php echo $today = date("F j, Y");  ?></p>
        </div> 
       
           <div class="qrcode-animation-left">
               <figure class="hero-banner" style="margin-top:-15%">
                 <img src="resources/assets/images/trial_tally_0.png" width="805" height="805" alt="services" class="w-100">
               </figure>
           </div>


           <div class="view-application-details-right" style="margin-top:0%">
           <div class="service-list">
                      <div class="service-list-item" style="margin-top:-8%">
                        <img src="resources/assets/icons/bene_logo.png" alt="application-form" class="image-services-icons" style="--color:351, 85%, 82%;margin-top:-16%">
                            <div class="titleofservies" style="text-align:left;">
                              		<h1 class="h1 home-text" style="font-size:4rem;">Beneficiaries </h1>
                                 <h1 class="h1 home-text num" style="font-size:6rem;margin-top:1%;margin-bottom:8%"><?php echo $_SESSION['$total_records_ben']?></h1>
                             </div>
                        </div>
           </div>
             
            <div class="service-list">
                      <div class="service-list-item" style="margin-top:-8%">
                        <img src="resources/assets/icons/processed_logo.png" alt="application-form" class="image-services-icons" style="--color: 33, 80%, 76%;margin-top:-18%">
                            <div class="titleofservies" style="text-align:left;">
                              		<h1 class="h1 home-text" style="font-size:4rem;">Received Request </h1>
                                 <h1 class="h1 home-text num" style="font-size:6rem;margin-top:1%;margin-bottom:8%" ><?php echo $_SESSION['$total_processed']?></h1>
                             </div>
                        </div>
           </div>
             
             <div class="service-list">
                      <div class="service-list-item" style="margin-top:-8%">
                        <img src="resources/assets/icons/ast_off_logo.png" alt="application-form" class="image-services-icons" style="--color:241, 63%, 91%;margin-top:-18%">
                            <div class="titleofservies" style="text-align:left;">
                              		<h1 class="h1 home-text" style="font-size:4rem;" >Active Organizations </h1>
                                 <h1 class="h1 home-text num" style="font-size:6rem;margin-top:1%;margin-bottom:8%"><?php echo $_SESSION['$total_records_active']?></h1>
                             </div>
                      </div>
             </div> 
             
            <div class="service-list" style="margin-top:-8%">
                      <div class="service-list-item">
                        <img src="resources/assets/icons/helped_logo.png" alt="application-form" class="image-services-icons" style="--color:90, 100%, 85%;margin-top:-18%">
                            <div class="titleofservies" style="text-align:left;">
                              		<h1 class="h1 home-text" style="font-size:4rem;" >Assistance Offered </h1>
                                 <h1 class="h1 home-text num" style="font-size:6rem;margin-top:1%;margin-bottom:8%"><?php echo $_SESSION['$total_records_org']?></h1>
                             </div>
                      </div>
             </div>
             
            
           
       
                     
         


   </div>
   </section>
<!-- Total Approved Area End --> 








    </article>
  </main>
  <footer class="footer">
  
      <div class="footer-right">

          

          <div class="kaliwa">
            <div class="footer-logo">
              <img src="resources/assets/images/logo.svg" alt="logo" width="50">
            </div>
            <div class="footer-text">
              <p>
                Gabay Tulong Para sa Lahat ng Maloleno is a website that will enable an organization to provide assistance, donate to those in need, and volunteer to help. Residents of Malolos can file a request for any kind of support they need.
              </p>
            </div>
            <div class="footer-social" style="margin-left:15%;">
              <a class="footer-link" href="https://www.facebook.com/">
                <img src="resources/assets/icons/logo-facebook.svg" alt="facebook" width="30">
              </a>
              <a class="footer-link" href="https://www.twitter.com/">
                <img src="resources/assets/icons/logo-twitter.svg" alt="twitter" width="30">
              </a>
              <a class="footer-link" href="https://www.instagram.com/">
                <img src="resources/assets/icons/logo-instagram.svg" alt="instagram" width="30">
              </a>
            </div>
          </div>
          
        
          <div class="footer-right-item">
            <h3>Main Page</h3>
            <ul>
              <li><a class="footer-link" href="#home" class="navbar-link">Home</a></li>
              <li><a class="footer-link" href="#services" class="navbar-link">Services</a></li>
              <li><a class="footer-link" href="#features" class="navbar-link">Features</a></li>
              <li><a class="footer-link" href="#total" class="navbar-link">Live Tally</a></li>
            
            </ul>
          </div>
          <div class="footer-right-item">
            <h3>Quick Links</h3>
            <ul>
              <li><a class="footer-link" href="../OrganizationView/OrganizationLogin.php">Login</a></li>
              <li><a class="footer-link" href="../RequestorView/ViewApplication.php">View Application Status</a></li>
              <li><a class="footer-link" href="../OrganizationView/OrganizationLogin.php">Organizations</a></li>
            </ul>
          </div>
          <div class="footer-right-item">
            <h3>Contacts</h3>
            <ul>
              <li><a class="footer-link row" href="tel:+09367367243"><img src="resources/assets/icons/call.svg" alt="email" width="20">: 0936969656</a></li>
              <li><a class="footer-link row" href="mailto:gabaytulong@gail.com"> <img src="resources/assets/icons/mail.svg" alt="email" width="20">: gabaytulong@gmail.com</a></li>
              <li><a class="footer-link row" href="#"><img src="resources/assets/icons/location.svg" alt="email" width="20">: Malolos, Bulacan</a></li>
            </ul>
          </div>





          <div class="footer-bottom">
          <hr>
          <p>© 2022 GabayTulong. All Rights Reserved by Group2</p>
        </div>
        
        </div>

  </footer>

  <a href="#top" class="back-top-btn has-after active"  data-back-top-btn>
    <img src="resources/assets/icons/arrow-up.svg" alt="arrow-up" width="24">
  </a>

<div id="divId" class="loader-wrapper" style="display:block">
<span class="loader" style="margin-left:49%">
  <span class="loader-inner"></span>
</span>
   
</div>

    
<script src="script.js" defer></script>
  
<script>
const modal = document.querySelector("#modal_vid");
const openModal = document.querySelector(".open-button");
const closeModal = document.querySelector(".close-button");

openModal.addEventListener("click", () => {
  modal.showModal();
});

closeModal.addEventListener("click", () => {
  modal.close();
});
</script>
    
<script type="text/javascript">
$(window).on("load",function(){
     $(".loader-wrapper").fadeOut("slow");
});
</script>
  
<script type="text/javascript">
   $(".num").counterUp({delay:10,time:1000});
</script>
        
    
</body>
</html>