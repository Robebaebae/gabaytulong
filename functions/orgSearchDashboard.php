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
$querytotal= "SELECT * FROM requests INNER JOIN assistance_offered ON requests.asst_id = assistance_offered.asst_id WHERE requests.org_id = '$_SESSION[currentOrg]'";
$resulttotal=mysqli_query($conn,$querytotal);
$total_records=mysqli_num_rows($resulttotal);  

$queryAcc= "SELECT * FROM requests INNER JOIN assistance_offered ON requests.asst_id = assistance_offered.asst_id WHERE requests.org_id = '$_SESSION[currentOrg]' AND req_status ='APPROVED' AND year(req_date)='$selected_year'";
$resultAcc=mysqli_query($conn,$queryAcc);
$total_recordsAcc=mysqli_num_rows($resultAcc);
if($total_recordsAcc == 0){
    $total_recordsAccPercent = 0;
}
else{
    $total_recordsAccPercent = $total_recordsAcc;
}


$queryDec= "SELECT * FROM requests INNER JOIN assistance_offered ON requests.asst_id = assistance_offered.asst_id WHERE requests.org_id = '$_SESSION[currentOrg]' AND req_status ='DECLINED' AND year(req_date)='$selected_year'";
$resultDec=mysqli_query($conn,$queryDec);
$total_recordsDec=mysqli_num_rows($resultDec);  
if($total_recordsDec == 0){
    $total_recordsDecPercent = 0;
}
else{
    $total_recordsDecPercent = $total_recordsDec;
}


$queryPen= "SELECT * FROM requests INNER JOIN assistance_offered ON requests.asst_id = assistance_offered.asst_id WHERE requests.org_id = '$_SESSION[currentOrg]' AND req_status ='PENDING' AND year(req_date)='$selected_year'";
$resultPen=mysqli_query($conn,$queryPen);
$total_recordsPen=mysqli_num_rows($resultPen);  
if($total_recordsPen == 0){
    $total_recordsPenPercent = 0;
}
else{
    $total_recordsPenPercent = $total_recordsPen;
}


$data[] = $total_recordsAcc;
$data[] = $total_recordsDec;
$data[] = $total_recordsPen;

$total_processed = $total_recordsAcc + $total_recordsDec;
$_SESSION['$total_processed'] = $selected_year;



//bar chart data
$queryJan= "SELECT * FROM requests INNER JOIN assistance_offered ON requests.asst_id = assistance_offered.asst_id WHERE requests.org_id = '$_SESSION[currentOrg]' AND month(req_date)='01' AND year(req_date)='$selected_year'";
$resultDatesJan=mysqli_query($conn,$queryJan);
$total_Jan=mysqli_num_rows($resultDatesJan);  

$queryFeb= "SELECT * FROM requests INNER JOIN assistance_offered ON requests.asst_id = assistance_offered.asst_id WHERE requests.org_id = '$_SESSION[currentOrg]' AND month(req_date)='02' AND year(req_date)='$selected_year'";
$resultDatesFeb=mysqli_query($conn,$queryFeb);
$total_Feb=mysqli_num_rows($resultDatesFeb);  

$queryMar= "SELECT * FROM requests INNER JOIN assistance_offered ON requests.asst_id = assistance_offered.asst_id WHERE requests.org_id = '$_SESSION[currentOrg]' AND month(req_date)='03' AND year(req_date)='$selected_year'";
$resultDatesMar=mysqli_query($conn,$queryMar);
$total_Mar=mysqli_num_rows($resultDatesMar);  

$queryApr= "SELECT * FROM requests INNER JOIN assistance_offered ON requests.asst_id = assistance_offered.asst_id WHERE requests.org_id = '$_SESSION[currentOrg]' AND month(req_date)='04' AND year(req_date)='$selected_year'";
$resultDatesApr=mysqli_query($conn,$queryApr);
$total_Apr=mysqli_num_rows($resultDatesApr);  

$queryMay= "SELECT * FROM requests INNER JOIN assistance_offered ON requests.asst_id = assistance_offered.asst_id WHERE requests.org_id = '$_SESSION[currentOrg]' AND month(req_date)='05' AND year(req_date)='$selected_year'";
$resultDatesMay=mysqli_query($conn,$queryMay);
$total_May=mysqli_num_rows($resultDatesMay);  

$queryJun= "SELECT * FROM requests INNER JOIN assistance_offered ON requests.asst_id = assistance_offered.asst_id WHERE requests.org_id = '$_SESSION[currentOrg]' AND month(req_date)='06' AND year(req_date)='$selected_year'";
$resultDatesJun=mysqli_query($conn,$queryJun);
$total_Jun=mysqli_num_rows($resultDatesJun);  

$queryJul= "SELECT * FROM requests INNER JOIN assistance_offered ON requests.asst_id = assistance_offered.asst_id WHERE requests.org_id = '$_SESSION[currentOrg]' AND month(req_date)='07' AND year(req_date)='$selected_year'";
$resultDatesJul=mysqli_query($conn,$queryJul);
$total_Jul=mysqli_num_rows($resultDatesJul);  

$queryAug= "SELECT * FROM requests INNER JOIN assistance_offered ON requests.asst_id = assistance_offered.asst_id WHERE requests.org_id = '$_SESSION[currentOrg]' AND month(req_date)='08' AND year(req_date)='$selected_year'";
$resultDatesAug=mysqli_query($conn,$queryAug);
$total_Aug=mysqli_num_rows($resultDatesAug);  

$querySep= "SELECT * FROM requests INNER JOIN assistance_offered ON requests.asst_id = assistance_offered.asst_id WHERE requests.org_id = '$_SESSION[currentOrg]' AND month(req_date)='09' AND year(req_date)='$selected_year'";
$resultDatesSep=mysqli_query($conn,$querySep);
$total_Sep=mysqli_num_rows($resultDatesSep);  

$queryOct= "SELECT * FROM requests INNER JOIN assistance_offered ON requests.asst_id = assistance_offered.asst_id WHERE requests.org_id = '$_SESSION[currentOrg]' AND month(req_date)='10' AND year(req_date)='$selected_year'";
$resultDatesOct=mysqli_query($conn,$queryOct);
$total_Oct=mysqli_num_rows($resultDatesOct);  

$queryNov= "SELECT * FROM requests INNER JOIN assistance_offered ON requests.asst_id = assistance_offered.asst_id WHERE requests.org_id = '$_SESSION[currentOrg]' AND month(req_date)='11' AND year(req_date)='$selected_year'";
$resultDatesNov=mysqli_query($conn,$queryNov);
$total_Nov=mysqli_num_rows($resultDatesNov);  

$queryDec= "SELECT * FROM requests INNER JOIN assistance_offered ON requests.asst_id = assistance_offered.asst_id WHERE requests.org_id = '$_SESSION[currentOrg]' AND month(req_date)='12' AND year(req_date)='$selected_year'";
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
<div class="chart" >
           <div class="chart-1" style="margin-top:-1%;">
                  
                  <a class="Dashboard-button" href="../OrganizationView/OrganizationReport.php?updateId=APPROVED">
                  <div class="row-a">
                        <p class="dash-title">Approve Request</p>
                            <h1 class="">'.$total_recordsAccPercent.'</h1>
                  </div>
                  </a>

                  <div class="donut">
                          <canvas id="donut" ></canvas>
                   </div>


          </div>

          <div class="chart-2" style="margin-top:-1%;">
                          
                    
                           <div class="row-p-d">
                           
                                    <a class="Dashboard-button" href="../OrganizationView/OrganizationReport.php?updateId=PENDING">
                                        <div class="row-p">
                                              <p class="dash-title">Pending Request</p>
                                              <h1 class="">'.$total_recordsPenPercent.'</h1>  
                                        </div>
                                    </a>
                           
                         		        <a class="Dashboard-button" href="../OrganizationView/OrganizationReport.php?updateId=DECLINED">
                                        <div class="row-d">
                                              <p class="dash-title">Declined Request</p>
                                              <h1 class="">'.$total_recordsDecPercent.'</h1>
                                        </div>
                                    </a> 
                           
                          </div>
          

                          <div class="bargraph">
                                  <canvas id="bar"></canvas>
                           </div>
          </div>
  </div>    
          <a href="../functions/funcOrganizationPrintChart.php">
		  <button class="button-quatary print" onClick="downloadPDF()" class="btn btn-success">
          <object data="../resources/assets/icons/print.svg" width="20" height="20"></object>Print Graph
          </button></a>
</div>   

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.0.279/pdf.min.js" integrity="sha512-QJy1NRNGKQoHmgJ7v+45V2uDbf2me+xFoN9XewaSKkGwlqEHyqLVaLtVm93FzxVCKnYEZLFTI4s6v0oD0FbAlw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>


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
          fill: true,
          backgroundColor: [
            "rgb(32, 32, 107)",
            "rgb(101,117,164)",
            "rgb(47,48,62)"
          ],
          hoverOffset: 4
        }]
      };
      
      plugin_1 = {
      id: "custom_canvas_background_color_1",
      beforeDraw: (chart) => {
        const {ctx} = chart;
        ctx.save();
        ctx.globalCompositeOperation = "destination-over";
        ctx.fillStyle = "white";
        ctx.fillRect(0, 0, chart.width, chart.height);
        ctx.restore();
      }
   	 };

      config = {
        type: "doughnut",
        data: data,
        plugins: [plugin_1]
      };

      donut = new Chart(
          document.getElementById("donut"),
          config
        );

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
          fill: true,
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
		
     plugin = {
      id: "custom_canvas_background_color",
      beforeDraw: (chart) => {
        const {ctx} = chart;
        ctx.save();
        ctx.globalCompositeOperation = "destination-over";
        ctx.fillStyle = "white";
        ctx.fillRect(0, 0, chart.width, chart.height);
        ctx.restore();
      }
    };
      
      config_bar = {
      type: "bar",
      data: data_bar,
      options: {
        plugins:{
          legend:{
            display: false
          },
          
          
        },
        
        scales: {
          y: {
            beginAtZero: true
          }
        }
      },
      plugins: [plugin]
   
    
     
    };

      bar = new Chart(
          document.getElementById("bar"),
          config_bar
        );
        
	function downloadPDF(){
      const canvasDonut = document.getElementById("donut");
      const canvasBar = document.getElementById("bar");

      const canvasDonutImage = canvasDonut.toDataURL("image/jpeg",1.0);
      const canvasBarImage = canvasBar.toDataURL("image/jpeg",1.0);

      console.log(canvasDonutImage)

      let pdf = new jsPDF();
      pdf.setFontSize(20);
      pdf.text(80,15,"CHART REPORT");
      pdf.text(100,25,"'.$selected_year.'");
      pdf.text(15,40,"Donut Chart");
      pdf.addImage(canvasDonutImage,"JPEG", 55,45,100,100);
      pdf.text(15,155,"Bar Chart");
      pdf.addImage(canvasBarImage,"JPEG", 15,160,180,100);
      pdf.save("ChartReport.pdf");
    
    }
</script>

  
';

if(isset($_POST["request"])){
    echo $output;
}
else{
    echo $output;
}




?>

