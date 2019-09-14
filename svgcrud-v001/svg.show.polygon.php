<?php
include("index.html");
include("dbSvgConnect.php");

$query = "SELECT rowid, * FROM polygon";
$result = $db->query($query);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Svg Show polygon</title>
</head>
<body>
	<div style="width:700px; margin: 20px auto;">polygon		
		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<tr><td>points</td><td>style</td></tr>
			<?php while($row = $result->fetchArray()) {?>
			<tr>
				<td><?= $row['points'];?></td>
				<td><?= $row['style'];?></td>			
			</tr>
			<?php } ?>
		</table>
	</div>
<hr>

<?php
echo "<svg viewBox='0 0 500 500'>";
while($row = $result->fetchArray()) {
	$points=$row['points']; 
	$style=$db->escapeString($row['style']);	
echo  "<polygon points='$points' style='$style' />";	
}
echo "</svg>";

?>
<hr>
</body>
</html>