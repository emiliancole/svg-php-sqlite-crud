<?php
include("index.html");
// Includs database connection
include("dbSvgConnect.php");

$query = "SELECT rowid, * FROM ellipsetr";
$result = $db->query($query);

?>
	<div style="width:700px; margin: 20px auto;">
		<a href="svg.insert.ellipsetr.php">Add New ellipsetr</a>
		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<tr>
				<td>cx</td><td>cy</td>
				<td>rx</td><td>ry</td>
                <td>style</td><td>transform</td><td>view</td>
				<td>Action</td>
			</tr>
			<?php while($row = $result->fetchArray()) {?>
			<tr>
				<td><?= $row['cx'];?></td>
				<td><?= $row['cy'];?></td>
				<td><?= $row['rx'];?></td>
                <td><?= $row['ry'];?></td>
				<td><?= $row['style'];?></td>
                <td><?= $row['transform'];?></td>
                <td><?= $row['view'];?></td>
				<td>
					<a href="svg.update.ellipsetr.php?id=<?php echo $row['rowid'];?>">Edit</a> | 
					<a href="svg.delete.ellipsetr.php?id=<?php echo $row['rowid'];?>">Delete</a>
				</td>
			</tr>
			<?php } ?>
		</table>
	</div>
</body>
</html>