<?php
include("index.html");
// Includs database connection
include("dbSvgConnect.php");

// Makes query with rowid
$query = "SELECT rowid, * FROM ellipse";

$result = $db->query($query);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Svg ellipse List</title>
</head>
<body>
	<div style="width:700px; margin: 20px auto;">
		<a href="svg.insert.ellipse.php">Add New ellipse</a>
		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<tr>
				<td>cx</td><td>cy</td>
				<td>rx</td><td>ry</td><td>style</td>
				<td>Action</td>
			</tr>
			<?php while($row = $result->fetchArray()) {?>
			<tr>
				<td><?= $row['cx'];?></td>
				<td><?= $row['cy'];?></td>
				<td><?= $row['rx'];?></td>
                <td><?= $row['ry'];?></td>
				<td><?= $row['style'];?></td>
				<td>
					<a href="svg.update.ellipse.php?id=<?php echo $row['rowid'];?>">Edit</a> | 
					<a href="svg.delete.ellipse.php?id=<?php echo $row['rowid'];?>">Delete</a>
				</td>
			</tr>
			<?php } ?>
		</table>
	</div>
</body>
</html>