<?php
include("index.html");
$message = "";
if( isset($_POST['submit_data']) ){
    // Includs database connection
    include("dbSvgConnect.php");

    $x = $_POST['x'];
    $y = $_POST['y'];
    $width = $_POST['width'];
    $height = $_POST['height'];
    $rx = $_POST['rx'];
    $ry = $_POST['ry'];
	$style = $_POST['style'];
    $transform = $_POST['transform'];
	$view = $_POST['view'];
 
    $query = "INSERT INTO recttr (x,y,width,height,rx,ry,style,transform,view) 
    VALUES ('$x','$y','$width','$height',
    '$rx','$ry','$style','$transform',$view)";

    // If data inserted then set success message otherwise set error message
    if( $db->exec($query) ){
        $message = "Svg Data inserted successfully.";
    }else{
        $message = "Sorry, Svg Data is not inserted.";
    }
}

?>
    <div style="width: 700px; margin: 20px auto;">INSERT recttr
        <!-- showing the message here-->
        <div><?= $message;?></div>
        <table width="100%" style="background-color:lightgreen;border:1px solid black;">
            <form action="" method="post">
            <tr><td>x:</td><td><input name="x" type="text" value="100"></td></tr>
            <tr><td>y:</td><td><input name="y" type="text" value="100"></td></tr>
			<tr><td>width:</td><td><input name="width" type="text" value="100"></td></tr>
            <tr><td>height:</td><td><input name="height" type="text" value="50"></td></tr>
            <tr><td>rx:</td><td><input name="rx" type="text" value="0"></td></tr>
            <tr><td>ry:</td><td><input name="ry" type="text" value="0"></td></tr>            
            <tr><td>style:</td><td><input name="style" type="text" size="100"
            value="stroke:black;stroke-width:1;fill:none;"></td></tr>
            <tr><td>transform:</td><td><input name="transform" type="text" size="100"
            value=""></td></tr>
			<tr><td>view:</td><td><input name="view" type="text" 
            value="0"></td></tr>
            <tr><td>==></td>
            <td><input name="submit_data" type="submit" value="Insert Svg rect Data"></td>
            </tr>
            </form>
        </table>
    </div>
</body>
</html>
