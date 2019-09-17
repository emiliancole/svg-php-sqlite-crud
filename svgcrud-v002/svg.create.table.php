<?php
include("index.html");
echo "<hr>";
$database_name = "svgSqlite.db";
$db = new SQLite3($database_name);
$table = $_POST['table'];
$columns = $_POST['columns'];

// Create Table "circle" into Database if not exists
$query = "CREATE TABLE IF NOT EXISTS $table ($columns)";
$db->exec($query);

?>
<table width="100%" cellpadding="5" cellspacing="1" border="1">
<form action="svg.create.table.php" method="post">
<tr><td>Table Name:</td>
<td><input name="table" type="text" size="40" value="tablename"></td>
</tr>
<tr><td>columns format:</td>
<td><input name="columns" type="text" size="150" 
value="x text,y text,width text,height text,rx text default 0,ry default 0,
style text default 'stroke:black:stroke-width:1;fill:none;'"></td>
</tr>
<tr>
<td>==></td>
<td><input name="submit_data" type="submit" value="Create new Svg Table/tag"></td>
</tr>
</form>
</table>

