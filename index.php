<?php
session_start();
$_SESSION['requestor'] = "";
$_SESSION['organization'] = "";

header("location: Main.php");
?>


