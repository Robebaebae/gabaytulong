<?php 
if(!empty($_GET['file']))
{
	$filename = basename($_GET['file']);
	$filepath = '../request_requirements/'.$filename;
}

 ?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <title>Preview File - <?php echo $filename?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../resources/assets/images/logo.svg" type="image/svg+xml">
</head>
<body>

<?php 
echo "<iframe src=\"".$filepath."\" style='position: absolute; height:100%; width:100%;border:none;'></iframe>";
?>

</body>
</html>

