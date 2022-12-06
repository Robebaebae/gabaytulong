<?php
session_start();

include('../functions/requestorCheck.php');

$asst_id = $_GET["updateId"]; 
$_SESSION["currentAsst"] = $asst_id;
$_SESSION["currentAsstID"] = $asst_id;


include('../sqlqueries/dbConnect.php');
include('../functions/asstFormUpload.php');


?>

<!DOCTYPE html>
<html>

<head>
<title><?php echo $_SESSION["currentOrgName"]." - ".$_SESSION["currentAsst"];?></title>
<link rel="shortcut icon" href="../resources/assets/images/logo.svg" type="image/svg+xml">
<link href="../main.css?v=<?php echo time(); ?>" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body>
 
<div class="loader-wrapper">
<span class="loader"><span class="loader-inner"></span></span>
</div>

<?php header('Location: ../phpmailer-main/sendEmailNew.php');?>
  

  
  
</body>
</html>