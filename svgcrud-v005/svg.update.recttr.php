<?php
$message = ""; // initial message 

include("index.html");
include("dbSvgConnect.php");

if( isset($_POST['submit_data']) ){

	$id = $_POST['id'];
	$x = $_POST['x']; $y = $_POST['y'];
	$width = $_POST['width']; $height = $_POST['height'];
	$rx = $_POST['rx']; $ry = $_POST['ry'];
	$style = $_POST['style'];
    $transform = $_POST['transform'];
    $view = $_POST['view'];
	
	$query = "UPDATE recttr SET x='$x',y='$y', width='$width',height='$height',     
    rx='$rx',ry='$ry',style='$style',transform='$transform', view=$view WHERE rowid=$id";
	
	// Here $db comes from "db_connect.php"
	if( $db->exec($query) ){
		$message = "Data is updated successfully.";
	}else{
		$message = "Sorry, Data is not updated.";
	}
}

$id = $_GET['id']; // rowid from url
// Prepare the query to get the row data with rowid
$query = "SELECT * FROM recttr WHERE rowid=$id";
$result = $db->query($query);
$data = $result->fetchArray(); // set the row in $data
?>
	<div style="width:700px; margin: 20px auto;">

		<!-- showing the message here-->
		<div><?php echo $message;?></div>UPDATE recttr
		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<form action="" method="post">
			<input type="hidden" name="id" value="<?= $id;?>">
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
			<tr><td>style:</td><td><input name="style" type="text" size="100"
            value="<?= $data['style'];?>"></td></tr>
            <tr><td>transform:</td><td><input name="transform" type="text" size="100"
            value="<?= $data['transform'];?>"></td></tr>
            <tr><td>view:</td><td><input name="view" type="text" size="100"
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