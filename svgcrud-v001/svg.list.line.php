<?php
include("index.html");
include("dbSvgConnect.php");

$query = "SELECT rowid, * FROM line";
$result = $db->query($query);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Svg List line</title>
</head>
<body>
	<div style="width: 700px; margin: 20px auto;">
		<a href="svg.insert.line.php">Add New line</a>
		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<tr>
				<td>x1</td>
				<td>y1</td>
				<td>x2</td>
                <td>y2</td>
				<td>style</td>
				<td>Action</td>
			</tr>
			<?php while($row = $result->fetchArray()) {?>
			<tr>
				<td><?= $row['x1'];?></td>
				<td><?= $row['y1'];?></td>
				<td><?= $row['x2'];?></td>
                <td><?= $row['y2'];?></td>
				<td><?= $row['style'];?></td>
				<td>
					<a href="svg.update.line.php?id=<?= $row['rowid'];?>">Edit</a> | 
					<a href="svg.delete.line.php?id=<?= $row['rowid'];?>">Delete</a>
				</td>
			</tr>
			<?php } ?>
		</table>
	</div>
</body>
</html>