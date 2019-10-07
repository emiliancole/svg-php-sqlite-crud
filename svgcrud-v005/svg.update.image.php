<?php
$message = ""; // initial message 

include("index.html");
include("dbSvgConnect.php");

if( isset($_POST['submit_data']) ){

	// Gets the data from post
	$id = $_POST['id'];
	$x = $_POST['x']; $y = $_POST['y'];
	$width = $_POST['width']; $height = $_POST['height'];
	$href = $_POST['href']; 
	$view = $_POST['view'];
    
	// Makes query with post data
	$query = "UPDATE image SET x='$x',y='$y', width='$width',height='$height',     
    href='$href',view='$view' WHERE rowid=$id";
	
	if( $db->exec($query) ){
		$message = "Data is updated successfully.";
	}else{
		$message = "Sorry, Data is not updated.";
	}
}

$id = $_GET['id']; // rowid from url
// Prepare the query to get the row data with rowid
$query = "SELECT * FROM image WHERE rowid=$id";
$result = $db->query($query);
$data = $result->fetchArray(); // set the row in $data
?>
	<div style="width:700px; margin: 20px auto;">

		<!-- showing the message here-->
		<div><?= $message;?></div>UPDATE image
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
			<tr><td>href:</td><td><input name="href" type="text" size="100"
            value="<?= $data['href'];?>"></td></tr>
            
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