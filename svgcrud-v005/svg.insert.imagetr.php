<?php
include("index.html");
$message = "";
if( isset($_POST['submit_data']) ){

    include("dbSvgConnect.php");

    // Gets the data from post
    $x = $_POST['x'];
    $y = $_POST['y'];
    $width = $_POST['width'];
    $height = $_POST['height'];
    $href = $_POST['href'];
    $transform = $_POST['transform'];
	$view = $_POST['view'];
	
    $query = "INSERT INTO imagetr (x,y,width,height,href,transform,view) VALUES ('$x','$y','$width','$height',
    '$href','$transform','$view')";

    // If data inserted then set success message otherwise set error message
    if( $db->exec($query) ){
        $message = "Svg Data inserted successfully.";
    }else{
        $message = "Sorry, Svg Data is not inserted.";
    }
}

?>
    <div style="width:700px; margin: 20px auto;">INSERT imagetr
        <!-- showing the message here-->
        <div><?= $message;?></div>
        <table width="100%" style="background-color:lightgreen;border:1px solid black;">
            <form action="svg.insert.imagetr.php" method="post">
            <tr><td>x:</td><td><input name="x" type="text" value="0"></td></tr>
            <tr><td>y:</td><td><input name="y" type="text" value="0"></td></tr>
			<tr><td>width:</td><td><input name="width" type="text" value="100%"></td></tr>
            <tr><td>height:</td><td><input name="height" type="text" value="100%"></td></tr>
            <tr><td>href:</td><td><input name="href" type="text" size="100" 
            value="icon/triangle.svg"></td></tr>
            <tr><td>transform:</td><td><input name="transform" type="text" size="100" 
            value="rotate(0 0 0)"></td></tr>
            <tr><td>view:</td><td><input name="view" type="text" 
            value="0"></td></tr>
			
            <tr><td>==></td>
            <td><input name="submit_data" type="submit" value="Insert Svg Data"></td>
            </tr>
            </form>
        </table>
    </div>
</body>
</html>
