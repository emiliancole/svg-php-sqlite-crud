<?php
include("index.html");
include("dbSvgConnect.php");

echo "<svg width='500' height='500' viewBox='0 0 500 500'>";

$queryImage = "SELECT rowid, * FROM image";
$result = $db->query($queryImage);
while($row = $result->fetchArray()) {
	$x=$row['x']; $y=$row['y'];
    $width=$row['width']; $height=$row['height'];
	$href=$row['href']; 
	$style=$db->escapeString($row['style']);	
	echo  "<image x='$x'y='$y' width='$width' height='$height' xlink:href='$href' style='$style' />";
	}
    
$queryCircle = "SELECT rowid, * FROM circle";
$result = $db->query($queryCircle);
while($row = $result->fetchArray()) {
	$cx=$row['cx']; $cy=$row['cy'];
	$r=$row['r']; 
	$style=$db->escapeString($row['style']);	
	echo  "<circle cx='$cx' cy='$cy' r='$r' style='$style' />";
	}

$queryEllipse = "SELECT rowid, * FROM ellipse";
$result = $db->query($queryEllipse);
while($row = $result->fetchArray()) {
	$cx=$row['cx']; $cy=$row['cy'];
	$rx=$row['rx']; $ry=$row['ry']; 
	$style=$db->escapeString($row['style']);	
	echo  "<ellipse cx='$cx' cy='$cy' rx='$rx' ry='$ry' style='$style' />";
	}
    
$queryRect = "SELECT rowid, * FROM rect";
$result = $db->query($queryRect);
while($row = $result->fetchArray()) {
	$x=$row['x']; $y=$row['y'];
    $width=$row['width']; $height=$row['height'];
	$rx=$row['rx']; $ry=$row['ry']; 
	$style=$db->escapeString($row['style']);	
	echo  "<rect x='$x'y='$y' width='$width' height='$height' rx='$rx' ry='$ry' style='$style' />";
	}
    
$queryLine = "SELECT rowid, * FROM line";
$result = $db->query($queryLine);
while($row = $result->fetchArray()) {
	$x1=$row['x1']; $y1=$row['y1'];
    $x2=$row['x2']; $y2=$row['y2']; 
	$style=$db->escapeString($row['style']);	
	echo  "<line x1='$x1'y1='$y1' x2='$x2' y2='$y2' style='$style' />";
	}
    
$queryPath = "SELECT rowid, * FROM path";
$result = $db->query($queryPath);
while($row = $result->fetchArray()) {
	$d=$row['d'];
	$style=$db->escapeString($row['style']);	
	echo  "<path d='$d' style='$style' />";
	}
    
$queryPolygon = "SELECT rowid, * FROM polygon";
$result = $db->query($queryPolygon);
while($row = $result->fetchArray()) {
	$points=$row['points'];
	$style=$db->escapeString($row['style']);	
	echo  "<polygon points='$points' style='$style' />";
	}
    
$queryPolyline = "SELECT rowid, * FROM polyline";
$result = $db->query($queryPolyline);
while($row = $result->fetchArray()) {
	$points=$row['points'];
	$style=$db->escapeString($row['style']);	
	echo  "<polyline points='$points' style='$style' />";
	}
    
$queryText = "SELECT rowid, * FROM text";
$result = $db->query($queryText);
while($row = $result->fetchArray()) {
	$x=$row['x']; $y=$row['y'];
	$dx=$row['dx']; $dy=$row['dy']; 
	$style=$db->escapeString($row['style']);	
    $content=$db->escapeString($row['content']);
	echo  "<text x='$x'y='$y' dx='$dx' dy='$dy' style='$style' >$content</text>";
	}
    
echo "</svg>";

?>

