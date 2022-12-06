<?php
session_start();

require('../functions/organizationCheck.php');
include('../sqlqueries/dbConnect.php');
include('../functions/fetchOrgDetailsReports.php');
include('../functions/fetchOrgAsstReports.php');

$current_report = $_GET["updateId"]; 
$_SESSION["current_report"] = $current_report;

$num_per_page = 5;
$_SESSION['numpageRep'] = $num_per_page;
$_SESSION['currentPage_3'] = 1;

    if(isset($_GET["page"]))
        {
            $page=$_GET["page"];
      		$_SESSION['currentPage_3'] = $page;
        }
    else
        {
            $page=1;
        }

$start_from=($page-1)*$num_per_page;
$_SESSION['start_from_Rep'] = $start_from;

?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <title>Report</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../resources/assets/images/logo.svg" type="image/svg+xml">
    <link href="../resources/assets/css/dashboard.css?v=<?php echo time(); ?>" rel="stylesheet">
    <link href="../main.css?v=<?php echo time(); ?>" rel="stylesheet">
</head>
<body>
<?php include('../statics/navBar.php')?>

<section class="home-section">

<h1>ORGANZATION REPORTS</h1>
<div class="dashboard-organization-details-content">

          <!-- Search area -->
              <div class="fillup-input-group">
                      <input required class="fillup-field" type="text" name="search_text" id="search_text"><br>
                      <label class="fillup-label">Search requestor</label>
              </div>



              <!-- Filfter area -->
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

              <label class="activitylog-title" style="margin:1rem;">Filter By Date: </label> 
                    <div id="date_fitler" class="filter-by-date">
                          <div class="fill-input-group">
                                <label for="start_date">Start Date</label>
                                <input class="fillup-field" type="date" name="start_date" id="start_date" placeholder="Start date" />
                          </div>

                          <div class="fill-input-group">
                                <label for="end_dateact">End Date</label> 
                                <input class="fillup-field" type="date" name="end_date" id="end_date" placeholder="End date"  />
                          </div>      
                    </div>

                <div id="searchResult">
                
                </div>
        
          <!-- <button style="float:right;margin-top:1%;" onClick="window.location='../functions/reportPDF.php';" class="btn btn-success">Print Report</button> -->


</div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript">

//search
$(document).ready(function(){

  $("#fetchval").on('change',function(){
    var value = $(this).val();
    $.ajax({
    url:"../functions/orgReportSearch.php",
    method:"POST",
    data: 'request='+ value,
    success:function(data)
    {
    $('#searchResult').html(data);
    }
  });
});

$("#start_date").on('change',function(){
    var value = $(this).val();
    $.ajax({
    url:"../functions/orgReportSearch.php",
    method:"POST",
    data: 'start_date='+ value,
    success:function(data)
    {
    $('#searchResult').html(data);
    }
  });
});

$("#end_date").on('change',function(){
    var value = $(this).val();
    $.ajax({
    url:"../functions/orgReportSearch.php",
    method:"POST",
    data: 'end_date='+ value,
    success:function(data)
    {
    $('#searchResult').html(data);
    }
  });
});


load_data();

function load_data(query)
{
 $.ajax({
  url:"../functions/orgReportSearch.php",
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

$('#contentTD').click(function(){
        window.location = $(this).attr('href');
        return false;
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
