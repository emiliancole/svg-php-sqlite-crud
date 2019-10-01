<?php
include("index.html");
include("dbSvgConnect.php");

$query = "SELECT rowid, * FROM text";
$result = $db->query($query);

?>
	<div style="width:700px; margin: 20px auto;">text		
		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<tr>
<td>x</td><td>y</td><td>dx</td><td>dy</td><td>style</td>
<td>content</td><td>view</td>			
			</tr>
			<?php while($row = $result->fetchArray()) {?>
			<tr>
				<td><?= $row['x'];?></td>
				<td><?= $row['y'];?></td>
				<td><?= $row['dx'];?></td>
				<td><?= $row['dy'];?></td>
				<td><?= $row['style'];?></td>
                <td><?= $row['content'];?></td>
                <td><?= $row['view'];?></td>
			</tr>
			<?php } ?>
		</table>
	</div>
<hr>

<?php
//echo "<svg width='500' height='500' viewBox='0 0 500 500'>";
$querySvg = "SELECT * FROM svg";
$resultSvg = $db->query($querySvg);
$rowSvg = $resultSvg->fetchArray();
	$width=$rowSvg['width']; 
	$height=$rowSvg['height']; 
	$viewBox=$rowSvg['viewBox'];	
	echo  "<svg width='$width' height='$height' viewBox='$viewBox'>";
    
while($row = $result->fetchArray()) {
	$x=$row['x']; $y=$row['y']; $width=$row['width']; $height=$row['height'];
	$dx=$row['dx']; $dy=$row['dy'];
	$style=$db->escapeString($row['style']);
    $content=$db->escapeString($row['content']);
	echo  "<text x='$x' y='$y' dx='$dx' dy='$dy' style='$style' >$content</text>";	
}
echo "</svg>";

?>
<hr>
</body>
</html>