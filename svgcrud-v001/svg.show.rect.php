<?php
include("index.html");
// Include database connection
include("dbSvgConnect.php");

// Makes query with rowid
$query = "SELECT rowid, * FROM rect";
$result = $db->query($query);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Svg List rect</title>
</head>
<body>
	<div style="width:700px; margin: 20px auto;">
		
		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<tr>
<td>x</td><td>y</td><td>width</td><td>height</td><td>rx</td><td>ry</td><td>style</td>			
			</tr>
			<?php while($row = $result->fetchArray()) {?>
			<tr>
				<td><?php echo $row['x'];?></td>
				<td><?php echo $row['y'];?></td>
				<td><?php echo $row['width'];?></td>
                <td><?php echo $row['height'];?></td>
				<td><?php echo $row['rx'];?></td>
				<td><?php echo $row['ry'];?></td>
				<td><?php echo $row['style'];?></td>			
			</tr>
			<?php } ?>
		</table>
	</div>
<hr>

<?php
echo "<svg viewBox='0 0 500 500'>";
while($row = $result->fetchArray()) {
	$x=$row['x']; $y=$row['y']; $width=$row['width']; $height=$row['height'];
	$rx=$row['rx']; $ry=$row['ry'];
	$style=$db->escapeString($row['style']);	
	echo  "<rect x='$x' y='$y' width='$width' height='$height' rx='$rx' ry='$ry' style='$style' />";	
}
echo "</svg>";

?>
<hr>
</body>
</html>