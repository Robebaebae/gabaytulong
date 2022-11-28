<?php
if($_SESSION['superAdmin']){
     
}
else{
    header("location: ../index.php");
}
?>