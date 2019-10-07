<?php
include("index.html");
// Include database connection
include("dbSvgConnect.php");

$query = "SELECT rowid, * FROM line WHERE view>0";
$result = $db->query($query);

?>
	<div style="width:700px; margin: 20px auto;">line		
		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<tr>
<td>x1</td><td>y1</td><td>x2</td><td>y2</td>
<td>style</td><td>view</td>			
			</tr>
			<?php while($row = $result->fetchArray()) {?>
			<tr>
				<td><?= $row['x1'];?></td><td><?= $row['y1'];?></td>
				<td><?= $row['x2'];?></td><td><?= $row['y2'];?></td>
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
	$x1=$row['x1']; $y1=$row['y1']; $x2=$row['x2']; $y2=$row['y2'];
	$style=$db->escapeString($row['style']);	
echo  "<line x1='$x1' y1='$y1' x2='$x2' y2='$y2' style='$style' />";	
}
echo "</svg>";

?>
<hr>
</body>
</html>