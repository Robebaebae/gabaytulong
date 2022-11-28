<?php
//fetch.php
session_start();
include('../sqlqueries/dbConnect.php');

$output = '';
$_SESSION['currentSearchFilter'] = "All";
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $_SESSION['currentSearchFilter'] = $search;
 $query = "
  SELECT * FROM requests INNER JOIN assistance_offered ON requests.asst_id = assistance_offered.asst_id
  WHERE req_refID LIKE '%".$search."%'
  OR req_givenname LIKE '%".$search."%' 
  OR req_middlename LIKE '%".$search."%' 
  OR req_lastname LIKE '%".$search."%' 
  OR req_status LIKE '%".$search."%'
  OR asst_name LIKE '%".$search."%'
 ";
}
else
{
 $query = "
 SELECT * FROM requests INNER JOIN assistance_offered ON requests.asst_id = assistance_offered.asst_id WHERE req_archive='UNARCHIVED'
 ";
}


$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
 $checkFunction = 'alert_phrase("phrase")';
 $clickAll = "";
 $output .= '
 <div class="card mt-4" style="margin:1%;">
                
                  <div class="card-body">
                        <form action="../functions/orgAsstArchive.php" method="POST">
                      
                            <table class="table table-bordered table-striped">
                            
                                <tbody>
                                
                                    <tr id="tableHeader">
                                        <th><input type="checkbox" onClick='.$clickAll.'></th>
                                        <th>Reference ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Type of Request</th>
                                        <th>Request Status</th>
                                  
                                    </tr>
                                    
 ';
 while($row = mysqli_fetch_array($result))
 {
  $currentreq_ref_ID = $row['req_refID'];
  $clickLink = "window.location='OrganizationRequestReview.php?updateID=$currentreq_ref_ID';";

  $output .= '
    
  
    <tr id="tableContent">
        
        <td style="width:10px; text-align: center;">
            <input type="checkbox" checked name="stud_archive[]" value="'.$_SESSION['stud_archive'] = $row['req_refID'].'">
        </td> 
        <td id="contentTD" onClick='.$clickLink.'>'.$row["req_refID"].'</td>
        <td id="contentTD" onClick='.$clickLink.'>'.$row["req_givenname"].' '.$row["req_middlename"].' '.$row["req_lastname"].'</td>
        <td id="contentTD" onClick='.$clickLink.'>'.$row["req_email"].'</td>
        <td id="contentTD" onClick='.$clickLink.'>'.$row["asst_name"].'</td>
        <td id="contentTD" onClick='.$clickLink.'>'.$row["req_status"].'</td>
    </tr>
 
  '
  ;
 }
 $output .= '
 
 </table>
 <button style="margin-left:96.4%;"type="submit" name="stud_archive_btn" class="btn btn-danger">Archive</button>
</form>
</div>
</div>
 
 ';
 echo $output;
 $_SESSION['selectedOutput'] = $output;
}
else
{
    echo '<br><h4>Data Not Found<h4><br>';
}

?>