<?php
include("index.html");
include("dbSvgConnect.php");

$query = "SELECT rowid, * FROM polyline";
$result = $db->query($query);

?>
	<div style="width:700px; margin: 20px auto;">polyline		
		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<tr><td>points</td><td>style</td></tr>
			<?php while($row = $result->fetchArray()) {?>
			<tr>
				<td><?= $row['points'];?></td>
				<td><?= $row['style'];?></td>			
			</tr>
			<?php } ?>
		</table>
	</div>
<hr>

<?php
echo "<svg width='500' height='500' viewBox='0 0 500 500'>";
while($row = $result->fetchArray()) {
	$points=$row['points']; 
	$style=$db->escapeString($row['style']);	
echo  "<polyline points='$points' style='$style' />";	
}
echo "</svg>";

?>
<hr>
