<?php
include("index.html");
include("dbSvgConnect.php");

// Makes query with rowid
$query = "SELECT rowid, * FROM path";
$result = $db->query($query);

?>
	<div style="width:700px; margin: 20px auto;">path		
		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<tr><td>d</td>
            <td>style</td><td>view</td>
            </tr>
			<?php while($row = $result->fetchArray()) {?>
			<tr>
				<td><?= $row['d'];?></td>
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
	$d=$row['d']; 
	$style=$db->escapeString($row['style']);	
echo  "<path d='$d' style='$style' />";	
}
echo "</svg>";

?>
<hr>
</body>
</html>