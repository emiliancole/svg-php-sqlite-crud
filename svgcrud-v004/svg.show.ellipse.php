<?php
include("index.html");
include("dbSvgConnect.php");

$query = "SELECT rowid, * FROM ellipse";
$result = $db->query($query);

?>
	<div style="width:700px; margin: 20px auto;">ellipse		
		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<tr>
				<td>cx</td><td>cy</td>
				<td>rx</td><td>ry</td>
				<td>style</td><td>view</td>		
			</tr>
			<?php while($row = $result->fetchArray()) {?>
			<tr>
				<td><?= $row['cx'];?></td>
				<td><?= $row['cy'];?></td>
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
//echo "<svg width='500' height='500' viewBox='0 0 500 500'>";
$querySvg = "SELECT * FROM svg";
$resultSvg = $db->query($querySvg);
$rowSvg = $resultSvg->fetchArray();
	$width=$rowSvg['width']; 
	$height=$rowSvg['height']; 
	$viewBox=$rowSvg['viewBox'];	
	echo  "<svg width='$width' height='$height' viewBox='$viewBox'>";	

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