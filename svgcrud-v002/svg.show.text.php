<?php
include("index.html");
include("dbSvgConnect.php");

$query = "SELECT rowid, * FROM text";
$result = $db->query($query);

?>
	<div style="width:700px; margin: 20px auto;">
		
		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<tr>
<td>x</td><td>y</td><td>dx</td><td>dy</td><td>style</td><td>content</td>			
			</tr>
			<?php while($row = $result->fetchArray()) {?>
			<tr>
				<td><?= $row['x'];?></td>
				<td><?= $row['y'];?></td>

				<td><?= $row['dx'];?></td>
				<td><?= $row['dy'];?></td>
				<td><?= $row['style'];?></td>
                <td><?= $row['content'];?></td>
			</tr>
			<?php } ?>
		</table>
	</div>
<hr>

<?php
echo "<svg viewBox='0 0 500 500'>";
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