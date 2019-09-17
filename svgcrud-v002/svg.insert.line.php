<?php
include("index.html");
$message = "";
if( isset($_POST['submit_data']) ){
    // Includs database connection
    include("dbSvgConnect.php");

    $x1 = $_POST['x1']; $y1 = $_POST['y1'];
    $x2 = $_POST['x2']; $y2 = $_POST['y2'];
	$style = $_POST['style'];
	
    // Makes query with post data
 $query = "INSERT INTO line (x1,y1,x2,y2,style) VALUES ('$x1','$y1','$x2','$y2','$style')";

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
    <title>Insert Svg line Data</title>
</head>
<body>
    <div style="width: 700px; margin: 20px auto;">INSERT line
        <!-- showing the message here-->
        <div><?php echo $message;?></div>
        <table width="100%" cellpadding="5" cellspacing="1" border="1">
            <form action="" method="post">
            <tr><td>x1:</td><td><input name="x1" type="text" value="100"></td></tr>
            <tr><td>y1:</td><td><input name="y1" type="text" value="100"></td></tr>
			<tr><td>x2:</td><td><input name="x2" type="text" value="100"></td></tr>
            <tr><td>y2:</td><td><input name="y2" type="text" value="50"></td></tr>
            <tr><td>style:</td><td><input name="style" type="text" size="100"
            value="stroke:black;stroke-width:1;"></td></tr>
			
            <tr><td>==></td>
            <td><input name="submit_data" type="submit" value="Insert Svg line Data"></td>
            </tr>
            </form>
        </table>
    </div>
</body>
</html>
