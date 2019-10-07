<?php
include("index.html");
include("dbSvgConnect.php");

$query = "SELECT rowid, * FROM circletr";

$result = $db->query($query);

?>
	<div style="width:700px; margin: 20px auto;">
		<a href="svg.insert.circletr.php">Add New circletr</a>
		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<tr>
				<td>cx</td>
				<td>cy</td>
				<td>r</td>
				<td>style</td>
                <td>transform</td>
                <td>view</td>
				<td>Action</td>
			</tr>
			<?php while($row = $result->fetchArray()) {?>
			<tr>
				<td><?= $row['cx'];?></td>
				<td><?= $row['cy'];?></td>
				<td><?= $row['r'];?></td>
				<td><?= $row['style'];?></td>
                <td><?= $row['transform'];?></td>
                <td><?= $row['view'];?></td>
				<td>
					<a href="svg.update.circletr.php?id=<?php echo $row['rowid'];?>">Edit</a> | 
					<a href="svg.delete.circletr.php?id=<?php echo $row['rowid'];?>">Delete</a>
				</td>
			</tr>
			<?php } ?>
		</table>
	</div>
</body>
</html>