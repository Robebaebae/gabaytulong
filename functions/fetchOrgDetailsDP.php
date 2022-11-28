<?php

$org_UpdateID = $_SESSION["organization"];

$sql = 'SELECT * FROM organizations'; 

$result = mysqli_query($conn, $sql);

//fetch the resulting rows 
$request_organizations = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach($request_organizations as $request_organization){

    $current_organization = $request_organization['org_id'];

    if($current_organization == $org_UpdateID)
    {
        $currentorg_dp = $request_organization['org_dp'];
    }
}

$org_dp = $new_pass = $connew_pass = '';

$errors = array('org_dp' => '');

        if(isset($_POST['submit'])){

            if(empty($_FILES['org_dp']['name'])){
                $errors['org_dp'] = 'A display picture is required';
                 
                }
                else{
                    ${'org_dp'} = $_FILES['org_dp']['name'];
                    ${'fn'} = $_FILES['org_dp']['name'];
                    ${'ext'} = explode(".",${'fn'});
                    ${'cn'} = count(${'ext'});
                 
                    if(${'ext'}[${'cn'}-1]=='png' || ${'ext'}[${'cn'}-1]=='jpeg'|| 
                    ${'ext'}[${'cn'}-1]=='jpg')
                    {
                        if($_FILES['org_dp']['size']<500000){
                            
                       
        
                        }else{
                            $errors['org_dp'] = 'File too big!';
                        }
                        
                    }else{
                        $errors['org_dp'] = 'File not supported';
                    }
              
                }
      
        if(array_filter($errors)){
            //echo 'errors in form';
            
        } else{
            
            $tm = $_FILES['org_dp']['tmp_name'];
            $newNM = $org_UpdateID."_". ${'fn'};
            move_uploaded_file( $tm, "../org_displaypic/".$newNM );

            $updatedorg_dp = mysqli_real_escape_string($conn, $newNM);

            $query = "UPDATE organizations SET org_dp='$updatedorg_dp'
            WHERE org_id='$org_UpdateID'"; 
           
            if(mysqli_query($conn, $query)){
                // success
                header('Location: ../functions/fetchOrgDetailsDPAct.php');
                mysqli_close($conn);
            } else {
                echo 'query error: '. mysqli_error($conn);
            }

        }
}


?>