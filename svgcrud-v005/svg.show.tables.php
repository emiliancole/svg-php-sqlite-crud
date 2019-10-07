<?php
include("index.html");
include("dbSvgConnect.php");

$query = "SELECT name FROM sqlite_master WHERE type ='table' AND name NOT LIKE 'sqlite_%'
ORDER BY name ASC;";

$result = $db->query($query);

?>
<div style="width:700px; margin: 20px auto;">TABLES IN DATABASE
		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<tr><th>Table name</th></tr>
			<?php while($row = $result->fetchArray()) {?>
			<tr>
				<td><?php echo $row['name'];?></td>			
			</tr>
			<?php } ?>
		</table>
</div>
</body>
</html>