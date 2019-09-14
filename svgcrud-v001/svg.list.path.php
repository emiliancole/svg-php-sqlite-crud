<?php
include("index.html");
include("dbSvgConnect.php");

$query = "SELECT rowid, * FROM path";
$result = $db->query($query);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Svg List path</title>
</head>
<body>
	<div style="width: 700px; margin: 20px auto;">
		<a href="svg.insert.path.php">Add New path</a>
		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<tr>
				<td>d</td>
				<td>style</td>
				<td>Action</td>
			</tr>
			<?php while($row = $result->fetchArray()) {?>
			<tr>
				<td><?= $row['d'];?></td>
				<td><?= $row['style'];?></td>
				<td>
					<a href="svg.update.path.php?id=<?= $row['rowid'];?>">Edit</a> | 
					<a href="svg.delete.path.php?id=<?= $row['rowid'];?>">Delete</a>
				</td>
			</tr>
			<?php } ?>
		</table>
	</div>
</body>
</html>