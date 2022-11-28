<?php
//fetch.php
session_start();
include('../sqlqueries/dbConnect.php');

$output = '';

if(isset($_POST["request"]))
{
 if($_POST["request"]=="Complete Requirements!"){
    $output = '<button class="approved button-quatary" id="submit_request" type="submit" name="accept" value="Approve">
Approve<object data="../resources/assets/icons/checkmark.svg" width="24" height="24"></object></button>';
 }
  
  else if($_POST["request"]!="Complete Requirements!"){
    $output = '<button class="button-quatary decline" id="submit_request" type="submit" name="decline" value="Decline">
Decline <object data="../resources/assets/icons/declined.svg" width="24" height="24"></object></button>';
 }
  
}

else
{
 $output = '<button class="button-quatary decline" id="submit_request" type="submit" name="decline" value="Decline">
Decline <object data="../resources/assets/icons/declined.svg" width="24" height="24"></object></button>';
}

echo $output;

?>