<?php
include("index.html");

$database_name = "svgSqlite.db";
$db = new SQLite3($database_name);

$where = $_POST['where'];
$tablelist = "svg,circle,circletr";

$query = "SELECT rowid, * FROM ".$tablelist." WHERE ".$where;

$result = $db->query($query);

?>
<table width="100%" cellpadding="5" cellspacing="1" border="1">
<form action="" method="post" >
<tr><td>SELECT * FROM tablelist WHERE </td>
<td><input name="where" type="text" size="100" placeholder="view>0" 
value="0"></td></tr>

<tr><td>==></td>
<td><input name="submit_data" type="submit" value="Select Svg View Query"></td>
</tr>
</form>
</table>
<hr>
<?php

//echo "<svg width='500' height='500' viewBox='0 0 500 500'>";
$querySvg = "SELECT * FROM svg";
$resultSvg = $db->query($querySvg);
$rowSvg = $resultSvg->fetchArray();
	$width=$rowSvg['width']; 
	$height=$rowSvg['height']; 
	$viewBox=$rowSvg['viewBox'];	
	echo  "<svg width='$width' height='$height' viewBox='$viewBox'>";	
    
while($row = $resultImage->fetchArray()) {
	$x=$row['x']; $y=$row['y']; $width=$row['width']; $height=$row['height'];
	$href=$row['href']; 	
	echo  "<image x='$x' y='$y' width='$width' height='$height' xlink:href='$href' />";	
}

while($row = $resultCircle->fetchArray()) {
	$cx=$row['cx']; $cy=$row['cy'];
	$r=$row['r']; 
	$style=$db->escapeString($row['style']);	
	echo  "<circle cx='$cx' cy='$cy' r='$r' style='$style' />";
}

while($row = $resultCircletr->fetchArray()) {
	$cx=$row['cx']; $cy=$row['cy'];
	$r=$row['r']; 
	$style=$db->escapeString($row['style']);
    $transform=$db->escapeString($row['transform']);
	echo  "<circle cx='$cx' cy='$cy' r='$r' style='$style' transform='$transform' />";
}

while($row = $resultEllipse->fetchArray()) {
	$cx=$row['cx']; $cy=$row['cy'];
	$rx=$row['rx']; $ry=$row['ry'];
	$style=$db->escapeString($row['style']);	
	echo  "<ellipse cx='$cx' cy='$cy' rx='$rx' ry='$ry' style='$style' />";
}

while($row = $resultEllipsetr->fetchArray()) {
	$cx=$row['cx']; $cy=$row['cy'];
	$rx=$row['rx']; $ry=$row['ry'];
	$style=$db->escapeString($row['style']);	
    $transform=$db->escapeString($row['transform']);
	echo  "<ellipse cx='$cx' cy='$cy' rx='$rx' ry='$ry' style='$style' transform='$transform' />";
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

while($row = $resultRecttr->fetchArray()) {
	$x=$row['x']; $y=$row['y']; $width=$row['width']; $height=$row['height'];
	$rx=$row['rx']; $ry=$row['ry'];
	$style=$db->escapeString($row['style']);
    $transform=$db->escapeString($row['transform']);
	echo  "<rect x='$x' y='$y' width='$width' height='$height' rx='$rx' ry='$ry' 
    style='$style' transform='$transform' />";	
}

while($row = $resultText->fetchArray()) {
	$x=$row['x']; $y=$row['y']; $width=$row['width']; $height=$row['height'];
	$dx=$row['dx']; $dy=$row['dy'];
	$style=$db->escapeString($row['style']);
    $content=$db->escapeString($row['content']);
	echo  "<text x='$x' y='$y' dx='$dx' dy='$dy' style='$style' >$content</text>";	
}

while($row = $resultTexttr->fetchArray()) {
	$x=$row['x']; $y=$row['y']; $width=$row['width']; $height=$row['height'];
	$dx=$row['dx']; $dy=$row['dy'];
	$style=$db->escapeString($row['style']);
    $transform=$db->escapeString($row['transform']);
    $content=$db->escapeString($row['content']);
	echo  "<text x='$x' y='$y' dx='$dx' dy='$dy' 
    style='$style' transform='$transform' >$content</text>";	
}

while($row = $resultImagetr->fetchArray()) {
	$x=$row['x']; $y=$row['y']; $width=$row['width']; $height=$row['height'];
	$href=$row['href']; 
	$transform=$db->escapeString($row['transform']);	
	echo  "<image x='$x' y='$y' width='$width' height='$height' xlink:href='$href' transform='$transform' />";	
}

echo "</svg>";

?>
