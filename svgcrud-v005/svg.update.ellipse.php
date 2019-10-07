<?php
$message = ""; // initial message 

include("index.html");
include("dbSvgConnect.php");

// Updating the table row with submited data according to rowid once form is submited 
if( isset($_POST['submit_data']) ){

	// Gets the data from post
	$id = $_POST['id'];
	$cx = $_POST['cx']; $cy = $_POST['cy'];
	$rx = $_POST['rx']; $ry = $_POST['ry'];
	$style = $_POST['style'];
    $view = $_POST['view'];
    
	// Makes query with post data
	$query = "UPDATE ellipse SET cx='$cx',cy='$cy',rx='$rx',ry='$ry',style='$style',view=$view
    WHERE rowid=$id";
	
	if( $db->exec($query) ){
		$message = "Data is updated successfully.";
	}else{
		$message = "Sorry, Data is not updated.";
	}
}

$id = $_GET['id']; // rowid from url
// Prepare the query to get the row data with rowid
$query = "SELECT * FROM ellipse WHERE rowid=$id";
$result = $db->query($query);
$data = $result->fetchArray(); // set the row in $data
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Svg ellipse Data</title>
</head>
<body>
	<div style="width: 500px; margin: 20px auto;">

		<!-- showing the message here-->
		<div><?php echo $message;?></div>UPDATE ellipse
		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<form action="" method="post">
			<input type="hidden" name="id" value="<?= $id;?>">
			<tr><td>cx:</td><td><input name="cx" type="text" value="<?= $data['cx'];?>"></td></tr>			
            <tr><td>cy:</td><td><input name="cy" type="text" value="<?= $data['cy'];?>"></td></tr>
			<tr><td>rx:</td><td><input name="rx" type="text" value="<?= $data['rx'];?>"></td></tr>
			<tr><td>ry:</td><td><input name="ry" type="text" value="<?= $data['ry'];?>"></td></tr>
            <tr><td>style:</td><td><input name="style" type="text" size="100"
            value="<?= $data['style'];?>"></td></tr>
            <tr><td>view:</td><td><input name="view" type="text" value="<?= $data['view'];?>"></td></tr>
			<tr>
				<td>==></td>
				<td><input name="submit_data" type="submit" value="Update Svg Data"></td>
			</tr>
			</form>
		</table>
	</div>
</body>
</html>