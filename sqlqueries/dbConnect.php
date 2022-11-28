<?php

//connect to database
$conn = mysqli_connect('127.0.0.1','root','MAdIz6hOG0iDPvWs','gabaytulong');

//check connection
if(!$conn){
echo 'Connection error: ' . mysqli_connect_error();
}

?>