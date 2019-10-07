<?php
include("index.html");
$message = "";
if( isset($_POST['submit_data']) ){

    include("dbSvgConnect.php");

    $x = $_POST['x'];
    $y = $_POST['y'];
    $dx = $_POST['dx'];
    $dy = $_POST['dy'];
	$style = $_POST['style'];
    $transform = $_POST['transform'];
	$content = $_POST['content'];
    $view = $_POST['view'];
    
    $query = "INSERT INTO texttr (x,y,dx,dy,style,transform,content,view) VALUES ('$x','$y',
    '$dx','$dy','$style','$transform','$content',$view)";

    // Executes the query
    // If data inserted then set success message otherwise set error message
    if( $db->exec($query) ){
        $message = "Svg Data inserted successfully.";
    }else{
        $message = "Sorry, Svg Data is not inserted.";
    }
}

?>
    <div style="width: 700px; margin: 20px auto;">INSERT texttr
        <!-- showing the message here-->
        <div><?= $message;?></div>
        <table width="100%" style="background-color:lightgreen;border:1px solid black;">
            <form action="" method="post">
            <tr><td>x:</td><td><input name="x" type="text" value="100"></td></tr>
            <tr><td>y:</td><td><input name="y" type="text" value="100"></td></tr>

            <tr><td>dx:</td><td><input name="dx" type="text" value="0"></td></tr>
            <tr><td>dy:</td><td><input name="dy" type="text" value="0"></td></tr>
            <tr><td>style:</td><td><input name="style" type="text" size="100"
            value="font:italic 20px serif; fill:red;"></td></tr>
            <tr><td>transform:</td><td><input name="transform" type="text" size="100"
            value="rotate(45)"></td></tr>
			<tr><td>content:</td><td><input name="content" type="text" size="100"
            value="aaa"></td></tr>
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
