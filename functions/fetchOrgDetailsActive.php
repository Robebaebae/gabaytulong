<?php
session_start();
include('../sqlqueries/dbConnect.php');
$org_UpdateID = $_SESSION["organization"];

$sql = 'SELECT * FROM organizations'; 

$result = mysqli_query($conn, $sql);

//fetch the resulting rows 
$request_organizations = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach($request_organizations as $request_organization){

    $current_organization = $request_organization['org_id'];

    if($current_organization == $org_UpdateID)
    {
        $currentorg_status = $request_organization['org_status'];
    }
}
    
            if($currentorg_status=="ACTIVE")
            {
                $currentorg_status = "INACTIVE";
            }
            else if($currentorg_status=="INACTIVE")
            {
                $currentorg_status = "ACTIVE";
            }

            $query = "UPDATE organizations SET org_status='$currentorg_status'
            WHERE org_id='$org_UpdateID'"; 
           
            if(mysqli_query($conn, $query)){
                // success
                header('Location: ../functions/fetchOrgDetailsActiveAct.php');
                mysqli_close($conn);
            } else {
                echo 'query error: '. mysqli_error($conn);
            }

       



?> 