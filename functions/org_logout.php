<?php
session_start();
$_SESSION['organization'] = "";
$_SESSION['SuperAdmin'] = "";

header("location: ../OrganizationView/OrganizationLogin.php");
?>