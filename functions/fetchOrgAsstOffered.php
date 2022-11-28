<?php

$org_UpdateID = $_SESSION["organization"];

$sql = 'SELECT * FROM assistance_offered INNER JOIN organizations ON assistance_offered.org_id = organizations.org_id'; 

$result = mysqli_query($conn, $sql);

//fetch the resulting rows 
$request_assistances = mysqli_fetch_all($result, MYSQLI_ASSOC);


?>