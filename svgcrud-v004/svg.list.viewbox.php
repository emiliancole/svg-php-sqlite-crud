<?php
include("index.html");
include("dbSvgConnect.php");

$query = "SELECT rowid, * FROM svg";
$result = $db->query($query);

?>
	<div style="width: 700px; margin: 20px auto;">	
		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<tr>
				<td>width</td>
                <td>height</td>
                <td>viewBox</td>
				<td>Action</td>
			</tr>
			<?php while($row = $result->fetchArray()) {?>
			<tr>
				<td><?= $row['width'];?></td>
                <td><?= $row['height'];?></td>
                <td><?= $row['viewBox'];?></td>
				<td>
					<a href="svg.update.viewbox.php?id=<?= $row['rowid'];?>">Edit</a> | 
					
				</td>
			</tr>
			<?php } ?>
		</table>
	</div>
</body>
</html>