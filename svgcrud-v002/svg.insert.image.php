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
    $href = $_POST['href'];
	$style = $_POST['style'];
	
    // Makes query with post data
    $query = "INSERT INTO image (x,y,width,height,href,style) VALUES ('$x','$y','$width','$height',
    '$href','$style')";

    // Executes the query
    // If data inserted then set success message otherwise set error message
    if( $db->exec($query) ){
        $message = "Svg Data inserted successfully.";
    }else{
        $message = "Sorry, Svg Data is not inserted.";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Insert Svg Data</title>
</head>
<body>
    <div style="width:700px; margin: 20px auto;">image
        <!-- showing the message here-->
        <div><?php echo $message;?></div>
        <table width="100%" style="background-color:lightgreen;border:1px solid black;">
            <form action="svg.insert.image.php" method="post">
            <tr><td>x:</td><td><input name="x" type="text" value="100"></td></tr>
            <tr><td>y:</td><td><input name="y" type="text" value="100"></td></tr>
			<tr><td>width:</td><td><input name="width" type="text" value="100%"></td></tr>
            <tr><td>height:</td><td><input name="height" type="text" value="100%"></td></tr>
            <tr><td>href:</td><td><input name="href" type="text" size="100" 
            value="https://mdn.mozillademos.org/files/6457/mdn_logo_only_color.png"></td></tr>
            <tr><td>style:</td><td><input name="style" type="text" size="100"
            value=""></td></tr>
			
            <tr><td>==></td>
            <td><input name="submit_data" type="submit" value="Insert Svg image Data"></td>
            </tr>
            </form>
        </table>
    </div>
</body>
</html>
