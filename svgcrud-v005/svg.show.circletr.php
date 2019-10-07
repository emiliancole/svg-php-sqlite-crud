<?php
include("index.html");
include("dbSvgConnect.php");

$query = "SELECT rowid, * FROM circletr WHERE view>0";
$result = $db->query($query);

?>
	<div style="width:700px; margin: 20px auto;">circletr		
		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<tr>
				<td>cx</td>
				<td>cy</td>
				<td>r</td>
				<td>style</td>
                <td>transform</td>
                <td>view</td>
			</tr>
			<?php while($row = $result->fetchArray()) {?>
			<tr>
				<td><?= $row['cx'];?></td>
				<td><?= $row['cy'];?></td>
				<td><?= $row['r'];?></td>
				<td><?= $row['style'];?></td>	
                <td><?= $row['transform'];?></td>
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
while($rowSvg = $resultSvg->fetchArray()) {
	$width=$rowSvg['width']; 
	$height=$rowSvg['height']; 
	$viewBox=$rowSvg['viewBox'];	
	echo  "<svg width='$width' height='$height' viewBox='$viewBox'>";	
}

while($row = $result->fetchArray()) {
	$cx=$row['cx']; $cy=$row['cy'];
	$r=$row['r']; 
	$style=$db->escapeString($row['style']);
    $transform=$db->escapeString($row['transform']);
	echo  "<circle cx='$cx' cy='$cy' r='$r' style='$style' transform='$transform' />";	
}

echo "</svg>";

?>
<hr>
</body>
</html>