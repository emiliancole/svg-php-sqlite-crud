<?php
include("index.html");
echo "<hr>";
$database_name = "svgSqlite.db";
$db = new SQLite3($database_name);
$table = $_POST['table'];

// Drop Table "$table" into Database if not exists
$query = "DROP TABLE IF EXISTS $table";
$db->exec($query);

?>
<table width="100%" cellpadding="5" cellspacing="1" border="1">
<form action="svg.drop.table.php" method="post">
<tr><th colspan="2">DROP TABLE</th></tr>
<tr><td>Table Name:</td>
<td><input name="table" type="text" size="40" value="tablename"></td>
</tr>

<tr>
<td>==></td>
<td><input name="submit_data" type="submit" value="Drop Svg Table/tag"></td>
</tr>
</form>
</table>

