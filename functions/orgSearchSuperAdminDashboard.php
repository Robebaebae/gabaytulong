<?php
session_start();
include('../sqlqueries/dbConnect.php');


$output = '';
unset($dataDate);
unset($data);

if(isset($_POST["request"]))
{
    $selected_year = $_POST["request"];
}
else{
    $current_year = date("Y");
    $selected_year = $current_year;
}

//donut chart data

$querytotal= "SELECT * FROM organizations";
$resulttotal=mysqli_query($conn,$querytotal);
$total_records=mysqli_num_rows($resulttotal);  

$queryAcc= "SELECT * FROM organizations WHERE org_status ='ACTIVE' AND year(org_date)='$selected_year'";
$resultAcc=mysqli_query($conn,$queryAcc);
$total_recordsAcc=mysqli_num_rows($resultAcc);  
$total_recordsAccPercent = $total_recordsAcc;

$queryDec= "SELECT * FROM organizations WHERE org_status ='INACTIVE' AND year(org_date)='$selected_year'";
$resultDec=mysqli_query($conn,$queryDec);
$total_recordsDec=mysqli_num_rows($resultDec);  
$total_recordsDecPercent = $total_recordsDec;

$queryPen= "SELECT * FROM organizations WHERE org_status ='PENDING' AND year(org_date)='$selected_year'";
$resultPen=mysqli_query($conn,$queryPen);
$total_recordsPen=mysqli_num_rows($resultPen);  
$total_recordsPenPercent = $total_recordsPen;

$data[] = $total_recordsAcc;
$data[] = $total_recordsDec;
$data[] = $total_recordsPen;

//bar chart data

$queryJan= "SELECT * FROM organizations WHERE month(org_date)='01' AND year(org_date)='$selected_year'";
$resultDatesJan=mysqli_query($conn,$queryJan);
$total_Jan=mysqli_num_rows($resultDatesJan);  

$queryFeb= "SELECT * FROM organizations WHERE month(org_date)='02' AND year(org_date)='$selected_year'";
$resultDatesFeb=mysqli_query($conn,$queryFeb);
$total_Feb=mysqli_num_rows($resultDatesFeb);  

$queryMar= "SELECT * FROM organizations WHERE month(org_date)='03' AND year(org_date)='$selected_year'";
$resultDatesMar=mysqli_query($conn,$queryMar);
$total_Mar=mysqli_num_rows($resultDatesMar);  

$queryApr= "SELECT * FROM organizations WHERE month(org_date)='04' AND year(org_date)='$selected_year'";
$resultDatesApr=mysqli_query($conn,$queryApr);
$total_Apr=mysqli_num_rows($resultDatesApr);  

$queryMay= "SELECT * FROM organizations WHERE month(org_date)='05' AND year(org_date)='$selected_year'";
$resultDatesMay=mysqli_query($conn,$queryMay);
$total_May=mysqli_num_rows($resultDatesMay);  

$queryJun= "SELECT * FROM organizations WHERE month(org_date)='06' AND year(org_date)='$selected_year'";
$resultDatesJun=mysqli_query($conn,$queryJun);
$total_Jun=mysqli_num_rows($resultDatesJun);  

$queryJul= "SELECT * FROM organizations WHERE month(org_date)='07' AND year(org_date)='$selected_year'";
$resultDatesJul=mysqli_query($conn,$queryJul);
$total_Jul=mysqli_num_rows($resultDatesJul);  

$queryAug= "SELECT * FROM organizations WHERE month(org_date)='08' AND year(org_date)='$selected_year'";
$resultDatesAug=mysqli_query($conn,$queryAug);
$total_Aug=mysqli_num_rows($resultDatesAug);  

$querySep= "SELECT * FROM organizations WHERE month(org_date)='09' AND year(org_date)='$selected_year'";
$resultDatesSep=mysqli_query($conn,$querySep);
$total_Sep=mysqli_num_rows($resultDatesSep);  

$queryOct= "SELECT * FROM organizations WHERE month(org_date)='10' AND year(org_date)='$selected_year'";
$resultDatesOct=mysqli_query($conn,$queryOct);
$total_Oct=mysqli_num_rows($resultDatesOct);  

$queryNov= "SELECT * FROM organizations WHERE month(org_date)='11' AND year(org_date)='$selected_year'";
$resultDatesNov=mysqli_query($conn,$queryNov);
$total_Nov=mysqli_num_rows($resultDatesNov);  

$queryDec= "SELECT * FROM organizations WHERE month(org_date)='12' AND year(org_date)='$selected_year'";
$resultDatesDec=mysqli_query($conn,$queryDec);
$total_Dec=mysqli_num_rows($resultDatesDec);  


$dataDate[] = $total_Sep;
$dataDate[] = $total_Oct;
$dataDate[] = $total_Nov;
$dataDate[] = $total_Dec;
$dataDate[] = $total_Jan;
$dataDate[] = $total_Feb;
$dataDate[] = $total_Mar;
$dataDate[] = $total_Apr;
$dataDate[] = $total_May;
$dataDate[] = $total_Jun;
$dataDate[] = $total_Jul;
$dataDate[] = $total_Aug;

$output .= '
<div class="chart">
          <div class="chart-1">
                  <div class="row-a">
                        <p class="dash-title">Approve Request</p>
                            <h1 class="">'.$total_recordsAccPercent.'</h1>
                  </div>

                  <div class="donut">
                          <canvas id="donut" ></canvas>
                   </div>


          </div>

          <div class="chart-2">
                          <div class="row-p-d">
                                <div class="row-p">
                                      <p class="dash-title">Pending Request</p>
                                      <h1 class="">'.$total_recordsPenPercent.'</h1>   
                                </div>

                                <div class="row-d">
                                      <p class="dash-title">Pending Organizations</p>
                                      <h1 class="">'.$total_recordsDecPercent.'</h1>
                                </div>
                          </div>
          

                          <div class="bargraph">
                                  <canvas id="bar"></canvas>
                           </div>
          </div>
  </div>        
</div>   


  <script>
  //doughnut
        data = {
        labels: [
          "Accepted",
          "Declined",
          "Pending",
        ],
        datasets: [{
          label: "Number of Requests",
          data: '.json_encode($data).',
          backgroundColor: [
            "rgb(32, 32, 107)",
            "rgb(101,117,164)",
            "rgb(47,48,62)"
          ],
          hoverOffset: 4
        }]
      };

      config = {
        type: "doughnut",
        data: data,
      };

      donut = new Chart(
          document.getElementById("donut"),
          config
        );
</script>

<script>
      //bar
      labels = [
        "September",
        "October",
        "November",
        "December",
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August"
      ];
      data_bar = {
        labels: labels,
        datasets: [{
          label: "",
          data: '.json_encode($dataDate).',
          backgroundColor: [
            "rgb(32, 32, 107)",
            "rgb(101,117,164)",
            "rgb(47,48,62)",
            "rgb(32, 32, 107)",
            "rgb(101,117,164)",
            "rgb(47,48,62)",
            "rgb(32, 32, 107)",
            "rgb(101,117,164)",
            "rgb(47,48,62)",
            "rgb(32, 32, 107)",
            "rgb(101,117,164)",
            "rgb(47,48,62)"
          ],
        }]
      };

      config_bar = {
      type: "bar",
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
          document.getElementById("bar"),
          config_bar
        );

</script>

  
';

if(isset($_POST["request"])){
    echo $output;
}

else{
    echo $output;
}




?>

