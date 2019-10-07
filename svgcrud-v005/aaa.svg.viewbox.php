<?php
include "dbSvgConnect.php";

$query = "SELECT rowid, * FROM circle";
$result = $db->query($query);

?>
	<div style="width:700px; margin: 20px auto;">		
		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<tr>
				<td>cx</td>
				<td>cy</td>
				<td>r</td>
				<td>style</td>		
			</tr>
			<?php while($row = $result->fetchArray()) {?>
			<tr>
				<td><?= $row['cx'];?></td>
				<td><?= $row['cy'];?></td>
				<td><?= $row['r'];?></td>
				<td><?= $row['style'];?></td>		
			</tr>
			<?php } ?>
		</table>
	</div>
<hr>

<?php
$width=700; $height=700; $scale=1;
$widthBox=$width/$scale; $heightBox=$height/$scale; 
echo "<svg width='$width' height='$height' viewBox='0 0 $widthBox $heightBox'>";
while($row = $result->fetchArray()) {
	$cx=$row['cx']; $cy=$row['cy'];
	$r=$row['r']; 
	$style=$db->escapeString($row['style']);
	
	echo  "<circle cx='$cx' cy='$cy' r='$r' style='$style' />";
	
}
echo "</svg>";

?>
<hr>
</body>
</html>