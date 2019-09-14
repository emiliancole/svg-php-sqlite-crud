<?php
include("index.html");
include("dbSvgConnect.php");

$query = "SELECT rowid, * FROM polyline";
$result = $db->query($query);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Svg List polygon</title>
</head>
<body>
	<div style="width:700px; margin: 20px auto;">
		<a href="svg.insert.polyline.php">Add New polyline</a>
		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<tr>
				<td>points</td>
				<td>style</td>
				<td>Action</td>
			</tr>
			<?php while($row = $result->fetchArray()) {?>
			<tr>
				<td><?= $row['points'];?></td>
				<td><?= $row['style'];?></td>
				<td>
					<a href="svg.update.polyline.php?id=<?= $row['rowid'];?>">Edit</a> | 
					<a href="svg.delete.polyline.php?id=<?= $row['rowid'];?>">Delete</a>
				</td>
			</tr>
			<?php } ?>
		</table>
	</div>
</body>
</html>