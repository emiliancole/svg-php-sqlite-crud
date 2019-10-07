<?php
$message = "";

include("index.html");
include("dbSvgConnect.php");

if( isset($_POST['submit_data']) ){

	// Gets the data from post
	$id = $_POST['id'];
	$cx = $_POST['cx']; $cy = $_POST['cy'];
	$rx = $_POST['rx']; $ry = $_POST['ry'];
	$style = $_POST['style'];
    $transform = $_POST['transform'];
    $view = $_POST['view'];

	$query = "UPDATE ellipsetr SET cx='$cx',cy='$cy',rx='$rx',ry='$ry',style='$style',
    transform='$transform',view=$view WHERE rowid=$id";
	
	if( $db->exec($query) ){
		$message = "Data is updated successfully.";
	}else{
		$message = "Sorry, Data is not updated.";
	}
}

$id = $_GET['id']; 

$query = "SELECT * FROM ellipsetr WHERE rowid=$id";
$result = $db->query($query);
$data = $result->fetchArray(); // set the row in $data
?>
	<div style="width: 500px; margin: 20px auto;">
		<!-- showing the message here-->
		<div><?= $message;?></div>UPDATE ellipsetr
		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<form action="" method="post">
			<input type="hidden" name="id" value="<?= $id;?>">
			<tr><td>cx:</td><td><input name="cx" type="text" value="<?= $data['cx'];?>"></td></tr>			
            <tr><td>cy:</td><td><input name="cy" type="text" value="<?= $data['cy'];?>"></td></tr>
			<tr><td>rx:</td><td><input name="rx" type="text" value="<?= $data['rx'];?>"></td></tr>
			<tr><td>ry:</td><td><input name="ry" type="text" value="<?= $data['ry'];?>"></td></tr>
            <tr><td>style:</td><td><input name="style" type="text" size="100"
            value="<?= $data['style'];?>"></td></tr>
            <tr><td>transform:</td><td><input name="transform" type="text" size="100"
            value="<?= $data['transform'];?>"></td></tr>
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