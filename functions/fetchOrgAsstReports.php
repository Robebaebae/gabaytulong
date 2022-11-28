<?php
//query
$sql = 'SELECT * FROM assistance_offered INNER JOIN organizations ON assistance_offered.org_id = organizations.org_id'; 

//make query
$result = mysqli_query($conn, $sql);

//fetch the resulting rows 
$assistances_offered = mysqli_fetch_all($result, MYSQLI_ASSOC);

$org_UpdateID = $_SESSION["currentOrg"];

$sql = 'SELECT * FROM organizations'; 

$result = mysqli_query($conn, $sql);

//fetch the resulting rows 
$request_organizations = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach($request_organizations as $request_organization){

    $current_organization = $request_organization['org_id'];

    if($current_organization == $org_UpdateID)
    {
        $currentorg_name = $request_organization['org_name'];
        $currentorg_Adminname = $request_organization['org_admin'];
        $_SESSION["currentOrgName"] = $currentorg_name;
        $_SESSION["currentOrgAdminName"] = $currentorg_Adminname;
    }
}
    

?>