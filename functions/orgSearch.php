<?php
if(isset($_POST['searchText']))
{
    $searchKey = $_POST['searchText'];
    $sql = " SELECT * FROM organizations WHERE org_name LIKE '%$searchKey%' ";
}
else{
$sql = 'SELECT * FROM organizations';    
$searchKey = "";
}

$result = mysqli_query($conn, $sql);
?>