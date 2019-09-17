<?php
$message = ""; // initial message 

include("index.html");
include("dbSvgConnect.php");

if( isset($_POST['submit_data']) ){

	// Gets the data from post
	$id = $_POST['id'];
	$x1 = $_POST['x1']; $y1 = $_POST['y1'];
	$x2 = $_POST['x2']; $y2 = $_POST['y2'];
	$style = $_POST['style'];
    
	// Makes query with post data
	$query = "UPDATE line SET x1='$x1',y1='$y1', x2='$x2',y2='$y2',     
    style='$style' WHERE rowid=$id";
	
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
$query = "SELECT * FROM line WHERE rowid=$id";
$result = $db->query($query);
$data = $result->fetchArray(); // set the row in $data
?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Svg line Data</title>
</head>
<body>
	<div style="width:700px; margin: 20px auto;">

		<!-- showing the message here-->
		<div><?php echo $message;?></div>UPDATE line
		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<form action="" method="post">
			<input type="hidden" name="id" value="<?php echo $id;?>">
			<tr><td>x1:</td><td><input name="x1" type="text" 
            value="<?= $data['x1'];?>"></td></tr>
			<tr><td>y1:</td><td><input name="y1" type="text" 
            value="<?= $data['y1'];?>"></td></tr>
            <tr><td>x2:</td><td><input name="x2" type="text" 
            value="<?= $data['x2'];?>"></td></tr>
            <tr><td>y2:</td><td><input name="y2" type="text" 
            value="<?= $data['y2'];?>"></td></tr>
			<tr><td>style:</td><td><input name="style" type="text" size="100"
            value="<?= $data['style'];?>"></td></tr>
			<tr>
				<td>==></td>
				<td><input name="submit_data" type="submit" value="Update Svg line Data"></td>
			</tr>
			</form>
		</table>
	</div>
</body>
</html>