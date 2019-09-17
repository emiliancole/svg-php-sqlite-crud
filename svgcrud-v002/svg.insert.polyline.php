<?php
include("index.html");
$message = "";
if( isset($_POST['submit_data']) ){
    // Includs database connection
    include("dbSvgConnect.php");

    $points = $_POST['points']; 
	$style = $_POST['style'];
	
    // Makes query with post data
 $query = "INSERT INTO polyline (points,style) VALUES ('$points','$style')";

    if( $db->exec($query) ){
        $message = "Svg Data inserted successfully.";
    }else{
        $message = "Sorry, Svg Data is not inserted.";
    }
}

?>
    <div style="width:700px; margin: 20px auto;">INSERT polyline
        <!-- showing the message here-->
        <div><?= $message;?></div>
        <table width="100%" cellpadding="5" cellspacing="1" border="1">
            <form action="" method="post">
            <tr><td>points:</td><td><input name="points" type="text" 
            value="0,100 50,25 50,75 100,0" size="100"></td></tr>
            <tr><td>style:</td><td><input name="style" type="text" size="100"
            value="stroke:black;stroke-width:1;fill:none;"></td></tr>
			
            <tr><td>==></td>
            <td><input name="submit_data" type="submit" value="Insert Svg polyline Data"></td>
            </tr>
            </form>
        </table>
    </div>
</body>
</html>
