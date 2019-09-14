<?php
include("index.html");
include("dbSvgConnect.php");

$query = "SELECT rowid, * FROM ellipse";
$result = $db->query($query);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Svg List ellipse</title>
</head>
<body>
	<div style="width: 500px; margin: 20px auto;">
		
		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<tr>
				<td>cx</td><td>cy</td>
				<td>rx</td><td>ry</td>
				<td>style</td>
			
			</tr>
			<?php while($row = $result->fetchArray()) {?>
			<tr>
				<td><?php echo $row['cx'];?></td>
				<td><?php echo $row['cy'];?></td>
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
	$cx=$row['cx']; $cy=$row['cy'];
	$rx=$row['rx']; $ry=$row['ry']; 
	$style=$db->escapeString($row['style']);	
	echo  "<ellipse cx='$cx' cy='$cy' rx='$rx' ry='$ry' style='$style' />";	
}
echo "</svg>";

?>
<hr>
</body>
</html>