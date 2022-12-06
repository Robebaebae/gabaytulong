<?php

require_once '../vendor/autoload.php';
include('../sqlqueries/dbConnect.php');
session_start();


$result = mysqli_query($conn, $_SESSION['newQuery']);

$mpdf = new \Mpdf\Mpdf();

$data = "";

$data .= '
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link href="../resources/assets/css/dashboard.css?v=<?php echo time(); ?>" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
	<style>
	table{ 
		width: 750px; 
		border-collapse: collapse; 
		margin:50px auto;
		border: 5px solid black;
		}

	/* Zebra striping */
	tr:nth-of-type(odd) { 
		border: 5px solid black;
		}

	th { 
		background: #040f49; 
		color: white; 
		font-weight: bold; 
		border: 5px solid black;
		}

	td, th { 
		padding: 10px; 
		border: 5px solid black; 
		text-align: left; 
		font-size: 12px;
		}
    </style>
</head>
<body>

<div id="header">
<h1 style="text-align:center; margin-top:1%; font-size: 20px;font-weight:bold;">Gabay Tulong para sa lahat ng Maloleño</h1><br>
<h2 style="text-align:left; margin:1%; font-size:15px;">Organization Reports</h2>
<h2 style="text-align:left; margin:1%; font-size:15px;">Organization Name: '.$_SESSION["currentOrgName"].'</h2>
<h2 style="text-align:left; margin:1%; font-size:15px;">Date: '.$_SESSION['currentdate'].'</h2>
</div>

<table class="table table-bordered table-striped">
                            
                                <tbody>
                                
                                    <tr id="tableHeader">
                                        <th>Reference ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Type of Request</th>
                                        <th>Request Date</th>
                                        <th>Request Status</th>
                                  
                                    </tr>
';

while($row = mysqli_fetch_array($result))
{
 $currentreq_ref_ID = $row['req_refID'];

 $data .= '   
   <tr id="tableContent">
	   

	   <td id="contentTD">'.$row["req_refID"].'</td>
       <td id="contentTD">'.$row["req_givenname"].' '.$row["req_middlename"].' '.$row["req_lastname"].'</td>
	   <td id="contentTD">'.$row["req_email"].'</td>
	   <td id="contentTD">'.$row["asst_name"].'</td>
	   <td id="contentTD">'.$row["req_date"].'</td>
	   <td id="contentTD">'.$row["req_status"].'</td>
   </tr>

 ';
}

$data .=  '

</table>
</form>
<div id="footer">
<h1 style="text-align:right; margin-top:5%; font-style: italic;">'.$_SESSION["currentOrgAdminName"].'</h1><br>
</div>
</body>
</html> 
';




$mpdf->WriteHTML($data);

$mpdf->Output('GeneratedReport.pdf','D');

header('Location: ../functions/reportPDFAct.php')
?>
