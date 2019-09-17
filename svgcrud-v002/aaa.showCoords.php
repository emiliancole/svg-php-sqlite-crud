<!DOCTYPE html>
<html>
<body>
<div style="position:absolute;left:0;top:0" onclick="showCoords(event)">
<script>
function showCoords(event) {
    var x = event.clientX;
    var y = event.clientY;
    var coords = "X coords: " + x + ", Y coords: " + y;
    document.getElementById("demo").innerHTML = coords;
}
</script>

<?php
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
echo "</svg>";
?>
</div>
<div style="position:absolute;left:700px;top:150px;" id="demo"></div>
</body>
</html>