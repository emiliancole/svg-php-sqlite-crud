<?php
include("index.html");
$message = "";
if( isset($_POST['submit_data']) ){
    include "dbSvgConnect.php";

    // Gets the data from post
    $cx = $_POST['cx']; $cy = $_POST['cy'];
    $r = $_POST['r']; $style = $_POST['style'];
	$transform = $_POST['transform'];
    $view = $_POST['view'];
    
    $query = "INSERT INTO circletr (cx, cy, r, style, transform, view) 
    VALUES ('$cx','$cy','$r','$style','$transform',$view)";

    if( $db->exec($query) ){
        $message = "Svg Data inserted successfully.";
    }else{
        $message = "Sorry, Svg Data is not inserted.";
    }
}
?>
    <div style="width:700px; margin: 20px auto;">INSERT circle
        <!-- showing the message here-->
        <div><?= $message;?></div>
        <table width="100%" style="background-color:lightgreen;border:1px solid black;">
            <form action="" method="post">
            <tr><td>cx:</td><td><input name="cx" type="text" value="100"></td></tr>
            <tr><td>cy:</td><td><input name="cy" type="text" value="100"></td></tr>
			<tr><td>r:</td><td><input name="r" type="text" value="25"></td></tr>
            <tr><td>style:</td><td><input name="style" type="text" size="100"
            value="stroke:black;stroke-width:1;fill:none;"></td></tr>
             <tr><td>transform:</td><td><input name="transform" type="text" size="100"
            value="translate(10)"></td></tr>
			<tr><td>view:</td><td><input name="view" type="text" value="0"></td></tr>
            <tr><td>==></td>
                <td><input name="submit_data" type="submit" value="Insert Svg Data"></td>
            </tr>
            </form>
        </table>
    </div>
</body>
</html>
