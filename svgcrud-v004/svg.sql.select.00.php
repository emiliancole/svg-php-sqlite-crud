<?php
include("index.html");
echo "<hr>";
$database_name = "svgSqlite.db";
$db = new SQLite3($database_name);
$query = $_POST['query'];
echo $query;
//$query = "SELECT rowid, * FROM circle WHERE r>10";
$result = $db->query($query);

?>
<table width="100%" cellpadding="5" cellspacing="1" border="1">
<form action="" method="post">
<tr><td>Sql Query:</td>
<td><input name="query" type="text" size="100" value="select * from circle where r>10"></td>
</tr>

<tr>
<td>==></td>
<td><input name="submit_data" type="submit" value="Select Query"></td>
</tr>
</form>
</table>
<hr>
<?php
echo "<svg viewBox='0 0 500 500'>";

while($row = $result->fetchArray()) {
	$cx=$row['cx']; $cy=$row['cy'];
	$r=$row['r']; 
	$style=$db->escapeString($row['style']);	
	echo  "<circle cx='$cx' cy='$cy' r='$r' style='$style' />";
}

echo "</svg>";

?>
