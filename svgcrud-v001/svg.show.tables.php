<?php
include("index.html");
include("dbSvgConnect.php");

// Makes query with rowid
$query = "SELECT name FROM sqlite_master WHERE type ='table' AND name NOT LIKE 'sqlite_%';";

$result = $db->query($query);

?>
<div style="width:700px; margin: 20px auto;">TABLES IN DATABASE
		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<tr>
				<td>Table name</td>		
			</tr>
			<?php while($row = $result->fetchArray()) {?>
			<tr>
				<td><?php echo $row['name'];?></td>			
			</tr>
			<?php } ?>
		</table>
</div>
</body>
</html>