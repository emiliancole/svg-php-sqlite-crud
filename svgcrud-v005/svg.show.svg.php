<?php
include("dbSvgConnect.php");
//echo "<svg width='500' height='500' viewBox='0 0 500 500'>";
$querySvg = "SELECT * FROM svg";
$resultSvg = $db->query($querySvg);
$rowSvg = $resultSvg->fetchArray();
	$width=$rowSvg['width']; 
	$height=$rowSvg['height']; 
	$viewBox=$rowSvg['viewBox'];	
	echo  "<svg width='$width' height='$height' viewBox='$viewBox'>";

$queryImage = "SELECT rowid, * FROM image WHERE view=1";
$result = $db->query($queryImage);
while($row = $result->fetchArray()) {
	$x=$row['x']; $y=$row['y'];
    $width=$row['width']; $height=$row['height'];
	$href=$row['href']; 
	$style=$db->escapeString($row['style']);	
	echo  "<image x='$x'y='$y' width='$width' height='$height' xlink:href='$href' style='$style' />";
	}
    
$queryCircle = "SELECT rowid, * FROM circle WHERE view>0";
$result = $db->query($queryCircle);
while($row = $result->fetchArray()) {
	$cx=$row['cx']; $cy=$row['cy'];
	$r=$row['r']; 
	$style=$db->escapeString($row['style']);	
	echo  "<circle cx='$cx' cy='$cy' r='$r' style='$style' />";
	}
    
$queryCircletr = "SELECT rowid, * FROM circletr WHERE view>0";
$result = $db->query($queryCircletr);
while($row = $result->fetchArray()) {
	$cx=$row['cx']; $cy=$row['cy'];
	$r=$row['r']; 
	$style=$db->escapeString($row['style']);
    $transform=$db->escapeString($row['transform']);
	echo  "<circle cx='$cx' cy='$cy' r='$r' style='$style' transform='$transform' />";
	}

$queryEllipse = "SELECT rowid, * FROM ellipse WHERE view>0";
$result = $db->query($queryEllipse);
while($row = $result->fetchArray()) {
	$cx=$row['cx']; $cy=$row['cy'];
	$rx=$row['rx']; $ry=$row['ry']; 
	$style=$db->escapeString($row['style']);	
	echo  "<ellipse cx='$cx' cy='$cy' rx='$rx' ry='$ry' style='$style' />";
	}
   
$queryEllipsetr = "SELECT rowid, * FROM ellipsetr WHERE view>0";
$result = $db->query($queryEllipsetr);
while($row = $result->fetchArray()) {
	$cx=$row['cx']; $cy=$row['cy'];
	$rx=$row['rx']; $ry=$row['ry']; 
	$style=$db->escapeString($row['style']);
    $transform=$db->escapeString($row['transform']);
	echo  "<ellipse cx='$cx' cy='$cy' rx='$rx' ry='$ry' style='$style' transform='$transform' />";
	}
    
$queryRect = "SELECT rowid, * FROM rect WHERE view>0";
$result = $db->query($queryRect);
while($row = $result->fetchArray()) {
	$x=$row['x']; $y=$row['y'];
    $width=$row['width']; $height=$row['height'];
	$rx=$row['rx']; $ry=$row['ry']; 
	$style=$db->escapeString($row['style']);	
	echo  "<rect x='$x'y='$y' width='$width' height='$height' rx='$rx' ry='$ry' style='$style' />";
	}
    
$queryRecttr = "SELECT rowid, * FROM recttr WHERE view>0";
$result = $db->query($queryRecttr);
while($row = $result->fetchArray()) {
	$x=$row['x']; $y=$row['y'];
    $width=$row['width']; $height=$row['height'];
	$rx=$row['rx']; $ry=$row['ry']; 
	$style=$db->escapeString($row['style']);	
    $transform=$db->escapeString($row['transform']);
	echo  "<rect x='$x'y='$y' width='$width' height='$height' rx='$rx' ry='$ry' 
    style='$style' transform='$transform' />";
	}
    
$queryLine = "SELECT rowid, * FROM line WHERE view>0";
$result = $db->query($queryLine);
while($row = $result->fetchArray()) {
	$x1=$row['x1']; $y1=$row['y1'];
    $x2=$row['x2']; $y2=$row['y2']; 
	$style=$db->escapeString($row['style']);	
	echo  "<line x1='$x1'y1='$y1' x2='$x2' y2='$y2' style='$style' />";
	}
    
$queryPath = "SELECT rowid, * FROM path WHERE view>0";
$result = $db->query($queryPath);
while($row = $result->fetchArray()) {
	$d=$row['d'];
	$style=$db->escapeString($row['style']);	
	echo  "<path d='$d' style='$style' />";
	}
    
$queryPolygon = "SELECT rowid, * FROM polygon WHERE view>0";
$result = $db->query($queryPolygon);
while($row = $result->fetchArray()) {
	$points=$row['points'];
	$style=$db->escapeString($row['style']);	
	echo  "<polygon points='$points' style='$style' />";
	}
    
$queryPolyline = "SELECT rowid, * FROM polyline WHERE view>0";
$result = $db->query($queryPolyline);
while($row = $result->fetchArray()) {
	$points=$row['points'];
	$style=$db->escapeString($row['style']);	
	echo  "<polyline points='$points' style='$style' />";
	}
    
$queryText = "SELECT rowid, * FROM text WHERE view>0";
$result = $db->query($queryText);
while($row = $result->fetchArray()) {
	$x=$row['x']; $y=$row['y'];
	$dx=$row['dx']; $dy=$row['dy']; 
	$style=$db->escapeString($row['style']);	
    $content=$db->escapeString($row['content']);
	echo  "<text x='$x'y='$y' dx='$dx' dy='$dy' style='$style' >$content</text>";
	}
    
$queryTexttr = "SELECT rowid, * FROM texttr WHERE view>0";
$result = $db->query($queryTexttr);
while($row = $result->fetchArray()) {
	$x=$row['x']; $y=$row['y'];
	$dx=$row['dx']; $dy=$row['dy']; 
	$style=$db->escapeString($row['style']);	
    $transform=$db->escapeString($row['transform']);	
    $content=$db->escapeString($row['content']);
	echo  "<text x='$x'y='$y' dx='$dx' dy='$dy' 
    style='$style' transform='$transform' >$content</text>";
	}
    
$queryImagetr = "SELECT rowid, * FROM imagetr WHERE view>0";
$result = $db->query($queryImagetr);
while($row = $result->fetchArray()) {
	$x=$row['x']; $y=$row['y'];
    $width=$row['width']; $height=$row['height'];
	$href=$row['href']; 
	$transform=$db->escapeString($row['transform']);	
	echo  "<image x='$x'y='$y' width='$width' height='$height' xlink:href='$href' transform='$transform' />";
	}    
    
echo "</svg>";

?>
