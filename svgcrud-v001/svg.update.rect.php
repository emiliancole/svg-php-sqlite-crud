<?php
$message = ""; // initial message 

include("index.html");
include("dbSvgConnect.php");

if( isset($_POST['submit_data']) ){

	// Gets the data from post
	$id = $_POST['id'];
	$x = $_POST['x']; $y = $_POST['y'];
	$width = $_POST['width']; $height = $_POST['height'];
	$rx = $_POST['rx']; $ry = $_POST['ry'];
	$style = $_POST['style'];
    
	// Makes query with post data
	$query = "UPDATE rect SET x='$x',y='$y', width='$width',height='$height',     
    rx='$rx',ry='$ry',style='$style' WHERE rowid=$id";
	
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
$query = "SELECT * FROM rect WHERE rowid=$id";
$result = $db->query($query);
$data = $result->fetchArray(); // set the row in $data
?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Svg rectData</title>
</head>
<body>
	<div style="width: 500px; margin: 20px auto;">

		<!-- showing the message here-->
		<div><?php echo $message;?></div>

		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<form action="" method="post">
			<input type="hidden" name="id" value="<?php echo $id;?>">
			<tr><td>x:</td><td><input name="x" type="text" 
            value="<?= $data['x'];?>"></td></tr>
			<tr><td>y:</td><td><input name="y" type="text" 
            value="<?= $data['y'];?>"></td></tr>
            <tr><td>width:</td><td><input name="width" type="text" 
            value="<?= $data['width'];?>"></td></tr>
            <tr><td>height:</td><td><input name="height" type="text" 
            value="<?= $data['height'];?>"></td></tr>
			<tr><td>rx:</td><td><input name="rx" type="text" 
            value="<?= $data['rx'];?>"></td></tr>
            <tr><td>ry:</td><td><input name="ry" type="text" 
            value="<?= $data['ry'];?>"></td></tr>
			<tr><td>style:</td><td><input name="style" type="text" 
            value="<?= $data['style'];?>"></td></tr>
			<tr>
				<td><a href="svg.list.rect.php">Back</a></td>
				<td><input name="submit_data" type="submit" value="Update Svg Data"></td>
			</tr>
			</form>
		</table>
	</div>
</body>
</html>