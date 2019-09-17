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
		<a href="svg.insert.php">Add New</a>
		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<tr>
				<td>cx</td>
				<td>cy</td>
				<td>r</td>
				<td>style</td>
				<td>Action</td>
			</tr>
			<?php while($row = $result->fetchArray()) {?>
			<tr>
				<td><?php echo $row['cx'];?></td>
				<td><?php echo $row['cy'];?></td>
				<td><?php echo $row['r'];?></td>
				<td><?php echo $row['style'];?></td>
				<td>
					<a href="svg.update.php?id=<?php echo $row['rowid'];?>">Edit</a> | 
					<a href="svg.delete.php?id=<?php echo $row['rowid'];?>"  confirm('Are you sure?');">Delete</a>
				</td>
			</tr>
			<?php } ?>
		</table>
	</div>
</body>
</html>