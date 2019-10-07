<?php
$message = ""; // initial message 

include("index.html");
include("dbSvgConnect.php");

if( isset($_POST['submit_data']) ){

	$id = $_POST['id'];
	$points = $_POST['points']; 
    $style = $_POST['style'];
    $view = $_POST['view'];
    
	$query = "UPDATE polygon SET points='$points', style='$style', view=$view WHERE rowid=$id";
	
	if( $db->exec($query) ){
		$message = "Data is updated successfully.";
	}else{
		$message = "Sorry, Data is not updated.";
	}
}

$id = $_GET['id']; // rowid from url
// Prepare the query to get the row data with rowid
$query = "SELECT * FROM polygon WHERE rowid=$id";
$result = $db->query($query);
$data = $result->fetchArray(); // set the row in $data
?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Svg polygon Data</title>
</head>
<body>
	<div style="width:700px; margin: 20px auto;">

		<!-- showing the message here-->
		<div><?php echo $message;?></div>UPDATE polygon

		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<form action="" method="post">
			<input type="hidden" name="id" value="<?= $id;?>">
			<tr><td>points:</td><td><input name="points" type="text" size="100"
            value="<?= $data['points'];?>"></td></tr>
			<tr><td>style:</td><td><input name="style" type="text" size="100"
            value="<?= $data['style'];?>"></td></tr>
            <tr><td>view:</td><td><input name="view" type="text" 
            value="<?= $data['view'];?>"></td></tr>
			<tr>
				<td>==></td>
				<td><input name="submit_data" type="submit" value="Update Svg Data"></td>
			</tr>
			</form>
		</table>
	</div>
</body>
</html>