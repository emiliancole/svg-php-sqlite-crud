<?php
include("index.html");
$message = "";
if( isset($_POST['submit_data']) ){
    // Includs database connection
    include("dbSvgConnect.php");

    // Gets the data from post
    $x = $_POST['x'];
    $y = $_POST['y'];
    $width = $_POST['width'];
    $height = $_POST['height'];
    $rx = $_POST['rx'];
    $ry = $_POST['ry'];
	$style = $_POST['style'];
	
    // Makes query with post data
    $query = "INSERT INTO rect (x,y,width,height,rx,ry,style) VALUES ('$x','$y','$width','$height',
    '$rx','$ry','$style')";

    // Executes the query
    // If data inserted then set success message otherwise set error message
    if( $db->exec($query) ){
        $message = "Svg Data inserted successfully.";
    }else{
        $message = "Sorry, Svg Data is not inserted.";
    }
}

?>
    <div style="width: 700px; margin: 20px auto;">INSERT rect
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
			
            <tr><td>==></td>
            <td><input name="submit_data" type="submit" value="Insert Svg rect Data"></td>
            </tr>
            </form>
        </table>
    </div>
</body>
</html>
