<?php
include("index.html");
include("dbSvgConnect.php");

$query = "SELECT rowid, * FROM imagetr";
$result = $db->query($query);

?>
	<div style="width: 700px; margin: 20px auto;">
		<a href="svg.insert.imagetr.php">Add New imagetr</a>
		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<tr>
				<td>x</td>
				<td>y</td>
				<td>width</td>
                <td>height</td>
                <td>href</td>
				<td>transform</td>
                <td>view</td>
				<td>Action</td>
			</tr>
			<?php while($row = $result->fetchArray()) {?>
			<tr>
				<td><?= $row['x'];?></td>
				<td><?= $row['y'];?></td>
				<td><?= $row['width'];?></td>
                <td><?= $row['height'];?></td>
                <td><?= $row['href'];?></td>
                <td><?= $row['transform'];?></td>
				<td><?= $row['view'];?></td>
				<td>
					<a href="svg.update.imagetr.php?id=<?= $row['rowid'];?>">Update</a> | 
					<a href="svg.delete.imagetr.php?id=<?= $row['rowid'];?>">Delete</a>
				</td>
			</tr>
			<?php } ?>
		</table>
	</div>
</body>
</html>