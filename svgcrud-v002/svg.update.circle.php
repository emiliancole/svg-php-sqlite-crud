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
    
	// Makes query with post data
	$query = "UPDATE circle SET cx='$cx',cy='$cy',r='$r',style='$style' WHERE rowid=$id";
	
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
$query = "SELECT * FROM circle WHERE rowid=$id";
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

		<!-- showing the message here-->
		<div><?= $message;?></div>UPDATE circle
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
				<td>==></td>
				<td><input name="submit_data" type="submit" value="Update Svg circle Data"></td>
			</tr>
			</form>
		</table>
	</div>
</body>
</html>