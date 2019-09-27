<?php
include("index.html");
include("dbSvgConnect.php");

$query = "SELECT rowid, * FROM polygon";
$result = $db->query($query);

?>
	<div style="width:700px; margin: 20px auto;">polygon		
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
echo "<svg width='500' height='500' viewBox='0 0 500 500'>";
while($row = $result->fetchArray()) {
	$points=$row['points']; 
	$style=$db->escapeString($row['style']);	
echo  "<polygon points='$points' style='$style' />";	
}
echo "</svg>";

?>
<hr>
</body>
</html>