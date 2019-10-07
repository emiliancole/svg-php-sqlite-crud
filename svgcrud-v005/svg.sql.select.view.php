<?php
include("index.html");

$database_name = "svgSqlite.db";
$db = new SQLite3($database_name);

if ( !isset($_POST['submit_data']) ) {
  $whereView = 0;}
else {
$whereView=$_POST['whereView'];
}

$queryCircle = "SELECT rowid, * FROM circle WHERE view=".$whereView;
$queryCircletr = "SELECT rowid, * FROM circletr WHERE view=".$whereView;
$queryEllipse = "SELECT rowid, * FROM ellipse WHERE view=".$whereView;
$queryEllipsetr = "SELECT rowid, * FROM ellipsetr WHERE view=".$whereView;
$queryImage = "SELECT rowid, * FROM image WHERE view=".$whereView;
$queryImagetr = "SELECT rowid, * FROM imagetr WHERE view=".$whereView;
$queryPath = "SELECT rowid, * FROM path WHERE view=".$whereView;
$queryPolygon = "SELECT rowid, * FROM polygon WHERE view=".$whereView;
$queryPolyline = "SELECT rowid, * FROM polyline WHERE view=".$whereView;
$queryRect = "SELECT rowid, * FROM rect WHERE view=".$whereView;
$queryRecttr = "SELECT rowid, * FROM recttr WHERE view=".$whereView;
$queryText = "SELECT rowid, * FROM text WHERE view=".$whereView;
$queryTexttr = "SELECT rowid, * FROM texttr WHERE view=".$whereView;

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
<tr><td>SELECT * FROM tablelist WHERE view =</td>
<td><input name="whereView" type="text" placeholder="12" 
value="<?= $whereView; ?>"></td></tr>

<tr><td>==></td>
<td><input name="submit_data" type="submit" value="Select Svg view Query"></td>
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
