<?php
$message = ""; // initial message 

include("index.html");
include("dbSvgConnect.php");

if( isset($_POST['submit_data']) ){

	$id = $_POST['id'];
	$x = $_POST['x']; $y = $_POST['y'];
	$dx = $_POST['dx']; $dy = $_POST['dy'];
	$style = $_POST['style'];
    $transform = $_POST['transform'];
    $content = $_POST['content'];
    $view = $_POST['view'];
    
	$query = "UPDATE texttr SET x='$x',y='$y',     
    dx='$dx',dy='$dy',style='$style',transform='$transform',content='$content',
    view=$view WHERE rowid=$id";
	
	if( $db->exec($query) ){
		$message = "Data is updated successfully.";
	}else{
		$message = "Sorry, Data is not updated.";
	}
}

$id = $_GET['id']; // rowid from url
// Prepare the query to get the row data with rowid
$query = "SELECT * FROM texttr WHERE rowid=$id";
$result = $db->query($query);
$data = $result->fetchArray(); // set the row in $data
?>
	<div style="width: 500px; margin: 20px auto;">
		<!-- showing the message here-->
		<div><?= $message;?></div>UPDATE text
		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<form action="" method="post">
			<input type="hidden" name="id" value="<?= $id;?>">
			<tr><td>x:</td><td><input name="x" type="text" 
            value="<?= $data['x'];?>"></td></tr>
			<tr><td>y:</td><td><input name="y" type="text" 
            value="<?= $data['y'];?>"></td></tr>
            
			<tr><td>dx:</td><td><input name="dx" type="text" 
            value="<?= $data['dx'];?>"></td></tr>
            <tr><td>dy:</td><td><input name="dy" type="text" 
            value="<?= $data['dy'];?>"></td></tr>
			<tr><td>style:</td><td><input name="style" type="text" size="100"
            value="<?= $data['style'];?>"></td></tr>
            <tr><td>transform:</td><td><input name="transform" type="text" size="100"
            value="<?= $data['transform'];?>"></td></tr>
            <tr><td>content:</td><td><input name="content" type="text" size="100"
            value="<?= $data['content'];?>"></td></tr>
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