<?php
$asst_id = $_GET["updateID"]; 
$_SESSION["asst_id"] = $asst_id;

$sql = 'SELECT * FROM assistance_offered';

$result = mysqli_query($conn, $sql);

$current_asst = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach($current_asst as $current_assts){

    $current_asst_id = $current_assts['asst_id'];

    if($current_asst_id == $_SESSION["asst_id"])
    {
        $currentreq_asst_name = $current_assts['asst_name'];
        $currentreq_asst_desc = $current_assts['asst_description'];
        $currentreq_asst_orgID = $_SESSION['organization'];
        $currentreq_asst_req_1 = $current_assts['asst_req1'];
        $currentreq_asst_req_2 = $current_assts['asst_req2'];
        $currentreq_asst_req_3 = $current_assts['asst_req3'];
        $currentreq_asst_req_4 = $current_assts['asst_req4'];
        $currentreq_asst_req_5 = $current_assts['asst_req5'];
    }
}

if(isset($_POST['submit'])){

    header("Location: ../functions/orgadmin_archvereq.php?updateID=$asst_id");

}

?>