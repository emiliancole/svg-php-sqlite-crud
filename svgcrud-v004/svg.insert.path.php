<?php
include("index.html");
$message = "";
if( isset($_POST['submit_data']) ){
    // Includs database connection
    include("dbSvgConnect.php");

    $d = $_POST['d']; 
	$style = $_POST['style'];
    $view = $_POST['view'];
	
    // Makes query with post data
 $query = "INSERT INTO path (d,style,view) VALUES ('$d','$style',$view)";

    if( $db->exec($query) ){
        $message = "Svg Data inserted successfully.";
    }else{
        $message = "Sorry, Svg Data is not inserted.";
    }
}

?>
    <div style="width: 700px; margin: 20px auto;">INSERT path
        <!-- showing the message here-->
        <div><?php echo $message;?></div>
        <table width="100%" cellpadding="5" cellspacing="1" border="1">
            <form action="" method="post">
            <tr><td>d:</td><td><input name="d" type="text" 
            value="M 20,20 L80,80" size="100"></td></tr>
            <tr><td>style:</td><td><input name="style" type="text" size="100"
            value="stroke:black;stroke-width:1;"></td></tr>
			<tr><td>view:</td><td><input name="view" type="text" 
            value="0"></td></tr>
            <tr><td>==></td>
            <td><input name="submit_data" type="submit" value="Insert Svg path Data"></td>
            </tr>
            </form>
        </table>
    </div>
</body>
</html>
