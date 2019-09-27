<?php
include("index.html");
include("dbSvgConnect.php");

$query = "SELECT rowid, * FROM text";
$result = $db->query($query);

?>
	<div style="width: 700px; margin: 20px auto;">
		<a href="svg.insert.text.php">Add New text</a>
		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<tr>
				<td>x</td>
				<td>y</td>
                <td>dx</td>
                <td>dy</td>
				<td>style</td>
                <td>content</td>
                <td>view</td>
				<td>Action</td>
			</tr>
			<?php while($row = $result->fetchArray()) {?>
			<tr>
				<td><?= $row['x'];?></td>
				<td><?= $row['y'];?></td>
                <td><?= $row['dx'];?></td>
                <td><?= $row['dy'];?></td>
				<td><?= $row['style'];?></td>
                <td><?= $row['content'];?></td>
                <td><?= $row['view'];?></td>
				<td>
					<a href="svg.update.text.php?id=<?= $row['rowid'];?>">Edit</a> | 
					<a href="svg.delete.text.php?id=<?= $row['rowid'];?>">Delete</a>
				</td>
			</tr>
			<?php } ?>
		</table>
	</div>
</body>
</html>