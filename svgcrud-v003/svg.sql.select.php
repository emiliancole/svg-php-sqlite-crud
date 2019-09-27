<?php
include("index.html");
echo "<hr>";
$database_name = "svgSqlite.db";
$db = new SQLite3($database_name);
$whereCircle = $_POST['whereCircle'];
$whereEllipse = $_POST['whereEllipse'];
$whereImage = $_POST['whereImage'];
$wherePath = $_POST['wherePath'];
$wherePolygon = $_POST['wherePolygon'];
$wherePolyline = $_POST['wherePolyline'];
$whereRect = $_POST['whereRect'];
$whereText = $_POST['whereText'];

$queryCircle = "SELECT rowid, * FROM circle WHERE ".$whereCircle;
$queryEllipse = "SELECT rowid, * FROM ellipse WHERE ".$whereEllipse;
$queryImage = "SELECT rowid, * FROM image WHERE ".$whereImage;
$queryPath = "SELECT rowid, * FROM path WHERE ".$wherePath;
$queryPolygon = "SELECT rowid, * FROM polygon WHERE ".$wherePolygon;
$queryPolyline = "SELECT rowid, * FROM polyline WHERE ".$wherePolyline;
$queryRect = "SELECT rowid, * FROM rect WHERE ".$whereRect;
$queryText = "SELECT rowid, * FROM text WHERE ".$whereText;

$resultCircle = $db->query($queryCircle);
$resultEllipse = $db->query($queryEllipse);
$resultImage = $db->query($queryImage);
$resultPath = $db->query($queryPath);
$resultPolygon = $db->query($queryPolygon);
$resultPolyline = $db->query($queryPolyline);
$resultRect = $db->query($queryRect);
$resultText = $db->query($queryText);
?>
<table width="100%" cellpadding="5" cellspacing="1" border="1">
<form action="" method="post">
<tr><td>SELECT * FROM circle WHERE </td>
<td><input name="whereCircle" type="text" size="100" placeholder="r>5" 
value="0"></td></tr>
<tr><td>SELECT * FROM ellipse WHERE </td>
<td><input name="whereEllipse" type="text" size="100" placeholder="rx>0"
value="0"></td></tr>
<tr><td>SELECT * FROM image WHERE </td>
<td><input name="whereImage" type="text" size="100" placeholder="1" value="0"></td></tr>
<tr><td>SELECT * FROM path WHERE </td>
<td><input name="wherePath" type="text" size="100" placeholder="1" value="0"></td></tr>
<tr><td>SELECT * FROM polygon WHERE </td>
<td><input name="wherePolygon" type="text" size="100" placeholder="1" value="0"></td></tr>
<tr><td>SELECT * FROM polyline WHERE </td>
<td><input name="wherePolyline" type="text" size="100" placeholder="1" value="0"></td></tr>
<tr><td>SELECT * FROM rect WHERE </td>
<td><input name="whereRect" type="text" size="100" placeholder="1" value="0"></td></tr>
<tr><td>SELECT * FROM text WHERE </td>
<td><input name="whereText" type="text" size="100" placeholder="1" value="0"></td></tr>

<tr><td>==></td>
<td><input name="submit_data" type="submit" value="Select Query"></td>
</tr>
</form>
</table>
<hr>
<?php
//echo $queryCircle; echo "--".$queryRect;
echo "<svg width='500' height='500' viewBox='0 0 500 500'>";

while($row = $resultImage->fetchArray()) {
	$x=$row['x']; $y=$row['y']; $width=$row['width']; $height=$row['height'];
	$href=$row['href']; 
	$style=$db->escapeString($row['style']);	
	echo  "<image x='$x' y='$y' width='$width' height='$height' xlink:href='$href' style='$style' />";	
}

while($row = $resultCircle->fetchArray()) {
	$cx=$row['cx']; $cy=$row['cy'];
	$r=$row['r']; 
	$style=$db->escapeString($row['style']);	
	echo  "<circle cx='$cx' cy='$cy' r='$r' style='$style' />";
}

while($row = $resultEllipse->fetchArray()) {
	$cx=$row['cx']; $cy=$row['cy'];
	$rx=$row['rx']; $ry=$row['ry'];
	$style=$db->escapeString($row['style']);	
	echo  "<ellipse cx='$cx' cy='$cy' rx='$rx' ry='$ry' style='$style' />";
}

while($row = $resultPath->fetchArray()) {
	$d=$row['d']; 
	$style=$db->escapeString($row['style']);	
echo  "<path d='$d' style='$style' />";	
}

while($row = $resultPolygon->fetchArray()) {
	$points=$row['points']; 
	$style=$db->escapeString($row['style']);	
echo  "<polygon points='$points' style='$style' />";	
}

while($row = $resultPolyline->fetchArray()) {
	$points=$row['points']; 
	$style=$db->escapeString($row['style']);	
echo  "<polyline points='$points' style='$style' />";	
}

while($row = $resultRect->fetchArray()) {
	$x=$row['x']; $y=$row['y']; $width=$row['width']; $height=$row['height'];
	$rx=$row['rx']; $ry=$row['ry'];
	$style=$db->escapeString($row['style']);	
	echo  "<rect x='$x' y='$y' width='$width' height='$height' rx='$rx' ry='$ry' style='$style' />";	
}

while($row = $resultText->fetchArray()) {
	$x=$row['x']; $y=$row['y']; $width=$row['width']; $height=$row['height'];
	$dx=$row['dx']; $dy=$row['dy'];
	$style=$db->escapeString($row['style']);
    $content=$db->escapeString($row['content']);
	echo  "<text x='$x' y='$y' dx='$dx' dy='$dy' style='$style' >$content</text>";	
}

echo "</svg>";

?>
