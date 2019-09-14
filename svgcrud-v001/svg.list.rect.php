<?php
include("index.html");
include("dbSvgConnect.php");

$query = "SELECT rowid, * FROM rect";
$result = $db->query($query);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Svg List rect</title>
</head>
<body>
	<div style="width: 700px; margin: 20px auto;">
		<a href="svg.insert.rect.php">Add New rect</a>
		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<tr>
				<td>x</td>
				<td>y</td>
				<td>width</td>
                <td>height</td>
                <td>rx</td>
                <td>ry</td>
				<td>style</td>
				<td>Action</td>
			</tr>
			<?php while($row = $result->fetchArray()) {?>
			<tr>
				<td><?= $row['x'];?></td>
				<td><?= $row['y'];?></td>
				<td><?= $row['width'];?></td>
                <td><?= $row['height'];?></td>
                <td><?= $row['rx'];?></td>
                <td><?= $row['ry'];?></td>
				<td><?= $row['style'];?></td>
				<td>
					<a href="svg.update.rect.php?id=<?= $row['rowid'];?>">Edit</a> | 
					<a href="svg.delete.rect.php?id=<?= $row['rowid'];?>">Delete</a>
				</td>
			</tr>
			<?php } ?>
		</table>
	</div>
</body>
</html>