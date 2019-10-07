<?php
include("index.html");

$database_name = "svgSqlite.db";
$db = new SQLite3($database_name);

if ( !isset($_POST['submit_data']) ) {
$whereCircle = 0;
$whereCircletr = 0;
$whereEllipse = 0;
$whereEllipsetr = 0;
$whereImage = 0;
$whereImagetr = 0;
$wherePath = 0;
$wherePolygon = 0;
$wherePolyline = 0;
$whereRect = 0;
$whereRecttr = 0;
$whereText = 0;
$whereTexttr = 0;
	} //END if
else {
$whereCircle = $_POST['whereCircle'];
$whereCircletr = $_POST['whereCircletr'];
$whereEllipse = $_POST['whereEllipse'];
$whereEllipsetr = $_POST['whereEllipsetr'];
$whereImage = $_POST['whereImage'];
$whereImagetr = $_POST['whereImagetr'];
$wherePath = $_POST['wherePath'];
$wherePolygon = $_POST['wherePolygon'];
$wherePolyline = $_POST['wherePolyline'];
$whereRect = $_POST['whereRect'];
$whereRecttr = $_POST['whereRecttr'];
$whereText = $_POST['whereText'];
$whereTexttr = $_POST['whereTexttr'];
} //END else

$queryCircle = "SELECT rowid, * FROM circle WHERE ".$whereCircle;
$queryCircletr = "SELECT rowid, * FROM circletr WHERE ".$whereCircletr;
$queryEllipse = "SELECT rowid, * FROM ellipse WHERE ".$whereEllipse;
$queryEllipsetr = "SELECT rowid, * FROM ellipsetr WHERE ".$whereEllipsetr;
$queryImage = "SELECT rowid, * FROM image WHERE ".$whereImage;
$queryImagetr = "SELECT rowid, * FROM imagetr WHERE ".$whereImagetr;
$queryPath = "SELECT rowid, * FROM path WHERE ".$wherePath;
$queryPolygon = "SELECT rowid, * FROM polygon WHERE ".$wherePolygon;
$queryPolyline = "SELECT rowid, * FROM polyline WHERE ".$wherePolyline;
$queryRect = "SELECT rowid, * FROM rect WHERE ".$whereRect;
$queryRecttr = "SELECT rowid, * FROM recttr WHERE ".$whereRecttr;
$queryText = "SELECT rowid, * FROM text WHERE ".$whereText;
$queryTexttr = "SELECT rowid, * FROM texttr WHERE ".$whereTexttr;

$resultCircle = $db->query($queryCircle);
$resultCircletr = $db->query($queryCircletr);
$resultEllipse = $db->query($queryEllipse);
$resultEllipsetr = $db->query($queryEllipsetr);
$resultImage = $db->query($queryImage);
$resultImagetr = $db->query($queryImagetr);
$resultPath = $db->query($queryPath);
$resultPolygon = $db->query($queryPolygon);
$resultPolyline = $db->query($queryPolyline);
$resultRect = $db->query($queryRect);
$resultRecttr = $db->query($queryRecttr);
$resultText = $db->query($queryText);
$resultTexttr = $db->query($queryTexttr);

?>
<table width="100%" cellpadding="5" cellspacing="1" border="1">
<form action="" method="post" >
<tr><td>SELECT * FROM circle WHERE </td>
<td><input name="whereCircle" type="text" size="100" placeholder="r>5" 
value="0"></td></tr>
<tr><td>SELECT * FROM circletr WHERE </td>
<td><input name="whereCircletr" type="text" size="100" placeholder="r>5" 
value="0"></td></tr>
<tr><td>SELECT * FROM ellipse WHERE </td>
<td><input name="whereEllipse" type="text" size="100" placeholder="rx>0"
value="0"></td></tr>
<tr><td>SELECT * FROM ellipsetr WHERE </td>
<td><input name="whereEllipsetr" type="text" size="100" placeholder="rx>0"
value="0"></td></tr>
<tr><td>SELECT * FROM image WHERE </td>
<td><input name="whereImage" type="text" size="100" placeholder="1" value="0"></td></tr>

<tr><td>SELECT * FROM imagetr WHERE </td>
<td><input name="whereImagetr" type="text" size="100" placeholder="1" value="0"></td></tr>
<tr><td>SELECT * FROM path WHERE </td>
<td><input name="wherePath" type="text" size="100" placeholder="1" value="0"></td></tr>
<tr><td>SELECT * FROM polygon WHERE </td>
<td><input name="wherePolygon" type="text" size="100" placeholder="1" value="0"></td></tr>
<tr><td>SELECT * FROM polyline WHERE </td>
<td><input name="wherePolyline" type="text" size="100" placeholder="1" value="0"></td></tr>
<tr><td>SELECT * FROM rect WHERE </td>
<td><input name="whereRect" type="text" size="100" placeholder="1" value="0"></td></tr>
<tr><td>SELECT * FROM recttr WHERE </td>
<td><input name="whereRecttr" type="text" size="100" placeholder="1" value="0"></td></tr>
<tr><td>SELECT * FROM text WHERE </td>
<td><input name="whereText" type="text" size="100" placeholder="1" value="0"></td></tr>
<tr><td>SELECT * FROM texttr WHERE </td>
<td><input name="whereTexttr" type="text" size="100" placeholder="1" value="0"></td></tr>

<tr><td>==></td>
<td><input name="submit_data" type="submit" value="Select Svg Query"></td>
</tr>
</form>
</table>
<hr>
<?php

$querySvg = "SELECT * FROM svg WHERE width>0";
$resultSvg = $db->querySingle($querySvg, true);
	$width=$resultSvg['width']; 
	$height=$resultSvg['height']; 
	$viewBox=$resultSvg['viewBox'];	
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
