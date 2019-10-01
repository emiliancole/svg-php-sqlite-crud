<?php
include("index.html");
include("dbSvgConnect.php");

$query = "SELECT rowid, * FROM polyline";
$result = $db->query($query);

?>
	<div style="width:700px; margin: 20px auto;">polyline		
		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<tr><td>points</td>
            <td>style</td>
            <td>view</td></tr>
			<?php while($row = $result->fetchArray()) {?>
			<tr>
				<td><?= $row['points'];?></td>
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
	$points=$row['points']; 
	$style=$db->escapeString($row['style']);	
echo  "<polyline points='$points' style='$style' />";	
}
echo "</svg>";

?>
<hr>
