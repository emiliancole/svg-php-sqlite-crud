<?php
include("index.html");
include("dbSvgConnect.php");

// Makes query with rowid
$query = "SELECT rowid, * FROM rect";
$result = $db->query($query);

?>
	<div style="width:700px; margin: 20px auto;">rect		
		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<tr>
<td>x</td><td>y</td><td>width</td><td>height</td><td>rx</td><td>ry</td>
<td>style</td><td>view</td>		
			</tr>
			<?php while($row = $result->fetchArray()) {?>
			<tr>
				<td><?= $row['x'];?></td>
				<td><?= $row['y'];?></td>
				<td><?= $row['width'];?></td>
                <td><?= $row['height'];?></td>
				<td><?= $row['rx'];?></td>
				<td><?= $row['ry'];?></td>
				<td><?= $row['style'];?></td>
                <td><?= $row['view'];?></td>
			</tr>
			<?php } ?>
		</table>
	</div>
<hr>

<?php
echo "<svg width='500' height='500' viewBox='0 0 500 500'>";
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