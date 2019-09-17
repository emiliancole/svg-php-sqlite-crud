<?php
include("index.html");
// Include database connection
include("dbSvgConnect.php");

// Makes query with rowid
$query = "SELECT rowid, * FROM image";
$result = $db->query($query);

?>
	<div style="width:700px; margin: 20px auto;">image		
		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<tr>
<td>x</td><td>y</td><td>width</td><td>height</td><td>href</td><td>style</td>			
			</tr>
			<?php while($row = $result->fetchArray()) {?>
			<tr>
				<td><?= $row['x'];?></td>
				<td><?= $row['y'];?></td>
				<td><?= $row['width'];?></td>
                <td><?= $row['height'];?></td>
				<td><?= $row['href'];?></td>
				<td><?= $row['style'];?></td>			
			</tr>
			<?php } ?>
		</table>
	</div>
<hr>
<?php
echo "<svg width='500' height='500' viewBox='0 0 500 500'>";
while($row = $result->fetchArray()) {
	$x=$row['x']; $y=$row['y']; $width=$row['width']; $height=$row['height'];
	$href=$row['href']; 
	$style=$db->escapeString($row['style']);	
	echo  "<image x='$x' y='$y' width='$width' height='$height' xlink:href='$href' style='$style' />";	
}
echo "</svg>";

?>
<hr>
</body>
</html>