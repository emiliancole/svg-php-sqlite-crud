<?php
include("index.html");

$message = "";
if( isset($_POST['submit_data']) ){
    // Includs database connection
    include("dbSvgConnect.php");

    // Gets the data from post
    $cx = $_POST['cx']; $cy = $_POST['cy'];
    $rx = $_POST['rx']; $ry = $_POST['ry'];
	$style = $_POST['style'];
	
    // Makes query with post data
    $query = "INSERT INTO ellipse (cx,cy,rx,ry,style) VALUES ('$cx','$cy','$rx','$ry','$style')";

    // Executes the query
    // If data inserted then set success message otherwise set error message
    if( $db->exec($query) ){
        $message = "Svg Data inserted successfully.";
    }else{
        $message = "Sorry, Svg Data is not inserted.";
    }
}
?>
    <div style="width:700px; margin: 20px auto;">INSERT ellipse
        <!-- showing the message here-->
        <div><?php echo $message;?></div>
        <table width="100%" cellpadding="5" cellspacing="1" border="1">
            <form action="" method="post">
            <tr><td>cx:</td><td><input name="cx" type="text" value="100"></td></tr>
            <tr><td>cy:</td><td><input name="cy" type="text" value="100"></td></tr>
			<tr><td>rx:</td><td><input name="rx" type="text" value="10"></td></tr>
            <tr><td>ry:</td><td><input name="ry" type="text" value="20"></td></tr>
            <tr><td>style:</td><td><input name="style" type="text" size="100"
            value="stroke:black;stroke-width:1;fill:none;"></td></tr>
			
            <tr><td>==></td>
                <td><input name="submit_data" type="submit" value="Insert Svg ellipse Data"></td>
            </tr>
            </form>
        </table>
    </div>
</body>
</html>
