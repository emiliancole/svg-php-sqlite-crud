<?php
$message = ""; // initial message 

include("index.html");
include("dbSvgConnect.php");

if( isset($_POST['submit_data']) ){

	// Gets the data from post
	$id = $_POST['id'];
	$width = $_POST['width']; 
    $height = $_POST['height'];
    $viewBox = $_POST['viewBox'];
	
	$query = "UPDATE svg SET width='$width',height='$height',viewBox='$viewBox' WHERE rowid=$id";
	
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
$query = "SELECT * FROM svg WHERE rowid=$id";
$result = $db->query($query);
$data = $result->fetchArray(); // set the row in $data
?>
	<div style="width:700px; margin: 20px auto;">

		<!-- showing the message here-->
		<div><?= $message;?></div>UPDATE viewBox
		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<form action="" method="post">
			<input type="hidden" name="id" value="<?= $id;?>">
			
            <tr><td>width:</td><td><input name="width" type="text" 
            value="<?= $data['width'];?>"></td></tr>
            <tr><td>height:</td><td><input name="height" type="text" 
            value="<?= $data['height'];?>"></td></tr>
			
            <tr><td>viewBox:</td><td><input name="viewBox" type="text" 
            value="<?= $data['viewBox'];?>"></td></tr>
			<tr>
				<td>==></td>
				<td><input name="submit_data" type="submit" value="Update Svg rect Data"></td>
			</tr>
			</form>
		</table>
	</div>
</body>
</html>