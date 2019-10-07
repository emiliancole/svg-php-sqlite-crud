<?php
$message = ""; // initial message 

include("index.html");
include("dbSvgConnect.php");

// Updating the table row with submited data according to rowid once form is submited 
if( isset($_POST['submit_data']) ){

	// Gets the data from post
	$id = $_POST['id'];
	$cx = $_POST['cx'];
	$cy = $_POST['cy'];
	$r = $_POST['r'];
	$style = $_POST['style'];
    $transform = $_POST['transform'];
    $view = $_POST['view'];
    
	$query = "UPDATE circletr SET cx='$cx',cy='$cy',r='$r',style='$style',
    transform='$transform',view=$view WHERE rowid=$id";
	
	// Executes the query
	// If data inserted then set success message otherwise set error message
	// Here $db comes from "db_connect.php"
	if( $db->exec($query) ){
		$message = "Data is updated successfully.";
	}else{
		$message = "Sorry, Data is not updated.";
	}
}

$id = $_GET['id']; // rowid from url
// Prepare the query to get the row data with rowid
$query = "SELECT * FROM circletr WHERE rowid=$id";
$result = $db->query($query);
$data = $result->fetchArray(); // set the row in $data
?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Svg Data</title>
</head>
<body>
	<div style="width: 500px; margin: 20px auto;">

		<div><?= $message;?></div>UPDATE circletr
		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<form action="" method="post">
			<input type="hidden" name="id" value="<?= $id;?>">
			<tr>
				<td>cx:</td>
				<td><input name="cx" type="text" value="<?= $data['cx'];?>"></td>
			</tr>
			<tr>
				<td>cy:</td>
				<td><input name="cy" type="text" value="<?= $data['cy'];?>"></td>
			</tr>
			<tr>
				<td>r:</td>
				<td><input name="r" type="text" value="<?= $data['r'];?>"></td>
			</tr>
			<tr>
				<td>style:</td>
				<td><input name="style" type="text" value="<?= $data['style'];?>"></td>
			</tr>
            <tr>
				<td>transform:</td>
				<td><input name="transform" type="text" value="<?= $data['transform'];?>"></td>
			</tr>
            <tr>
				<td>view:</td>
				<td><input name="view" type="text" value="<?= $data['view'];?>"></td>
			</tr>
			<tr>
				<td>==></td>
				<td><input name="submit_data" type="submit" value="Update Svg Data"></td>
			</tr>
			</form>
		</table>
	</div>
</body>
</html>