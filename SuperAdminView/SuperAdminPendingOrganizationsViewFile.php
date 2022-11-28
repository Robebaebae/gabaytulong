<?php 
if(!empty($_GET['file']))
{
	$filename = basename($_GET['file']);
	$filepath = '../organization_requirements/'.$filename;
}

 ?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">  
</head>
<body>

<?php 
echo "<iframe src=\"".$filepath."\" style='position: absolute; height:100%; width:100%;border:none;'></iframe>";
?>

</body>
</html>

