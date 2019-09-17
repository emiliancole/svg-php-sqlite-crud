<?php

// Includs database connection
include "dbSvgConnect.php";

// Makes query with rowid
$query = "SELECT rowid, * FROM circle";

// Run the query and set query result in $result
// Here $db comes from "db_connect.php"
$result = $db->query($query);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Svg List</title>
</head>
<body>
	<div style="width: 500px; margin: 20px auto;">
		
		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<tr>
				<td>cx</td>
				<td>cy</td>
				<td>r</td>
				<td>style</td>
			
			</tr>
			<?php while($row = $result->fetchArray()) {?>
			<tr>
				<td><?php echo $row['cx'];?></td>
				<td><?php echo $row['cy'];?></td>
				<td><?php echo $row['r'];?></td>
				<td><?php echo $row['style'];?></td>
			
			</tr>
			<?php } ?>
		</table>
	</div>
<hr>

<?php
echo "<svg viewBox='0 0 500 500'>";
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