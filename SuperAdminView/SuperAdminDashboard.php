<?php
session_start();
include('../functions/superAdminCheck.php');
include('../sqlqueries/dbConnect.php');
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <title>Organization Dashboard</title>
    <meta charset="UTF-8">
    <link href="../main.css?v=<?php echo time(); ?>" rel="stylesheet">
    <link href="../resources/assets/css/dashboard.css?v=<?php echo time(); ?>" rel="stylesheet">
    <link rel="shortcut icon" href="../resources/assets/images/logo.svg" type="image/svg+xml">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
   
</head>
<body>
<?php include('../statics/navBarSuperAdmin.php')?>
  
<section class="home-section">
<div class="assistance-offered-fillup-form-barangay" style="margin:1rem;">
        <label for="fetchVal" class="activitylog-title">Filter Year: </label>  
            <div class="select">
                      <select name="fetchVal" id="fetchval">
                            <option value="2026" selected="">2026</option>
                            <option value="2025" selected="">2025</option>
                            <option value="2024" selected="">2024</option>
                            <option value="2023" selected="">2023</option>
                            <option value="2022" selected="">2022</option>
                      </select>
          </div>
    </div>


<div id="searchResult">

</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script>
  //navbar
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

<script type="text/javascript">

//filter
$(document).ready(function(){ 

  $("#fetchval").on('change',function(){
    var value = $(this).val();
    $.ajax({
    url:"../functions/orgSearchSuperAdminDashboard.php",
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
  url:"../functions/orgSearchSuperAdminDashboard.php",
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
  //doughnut
        data = {
        labels: [
          'Active',
          'Inactive',
          'Pending',
        ],
        datasets: [{
          label: 'Number of Requests',
          data: <?php echo json_encode($data);?>,
          backgroundColor: [
            'rgb(32, 32, 107)',
            'rgb(101,117,164)',
            'rgb(47,48,62)'
          ],
          hoverOffset: 4
        }]
      };

       config = {
        type: 'doughnut',
        data: data,
      };

       donut = new Chart(
          document.getElementById('donut'),
          config
        );
</script>

<script>
      //bar
       labels = [
        'September',
        'October',
        'November',
        'December',
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August'
      ];
       data_bar = {
        labels: labels,
        datasets: [{
          label: "",
          data: <?php echo json_encode($dataDate);?>,
          backgroundColor: [
            'rgb(32, 32, 107)',
            'rgb(101,117,164)',
            'rgb(47,48,62)',
            'rgb(32, 32, 107)',
            'rgb(101,117,164)',
            'rgb(47,48,62)',
            'rgb(32, 32, 107)',
            'rgb(101,117,164)',
            'rgb(47,48,62)',
            'rgb(32, 32, 107)',
            'rgb(101,117,164)',
            'rgb(47,48,62)'
          ],
        }]
      };

       config_bar = {
      type: 'bar',
      data: data_bar,
      options: {
        plugins:{
          legend:{
            display: false
          }
        },
        
        scales: {
          y: {
            beginAtZero: true
          }
        }
      },
    };

       bar = new Chart(
          document.getElementById('bar'),
          config_bar
        );

</script>





</body>
</html>