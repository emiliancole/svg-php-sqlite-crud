<?php

$message = "";
if( isset($_POST['submit_data']) ){
    // Includs database connection
    include "dbSvgConnect.php";

    // Gets the data from post
    $cx = $_POST['cx'];
    $cy = $_POST['cy'];
    $r = $_POST['r'];
	$style = $_POST['style'];
	
    // Makes query with post data
    $query = "INSERT INTO circle (cx, cy, r, style) VALUES ('$cx','$cy','$r','$style')";

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
    <div style="width: 500px; margin: 20px auto;">
        <!-- showing the message here-->
        <div><?php echo $message;?></div>
        <table width="100%" cellpadding="5" cellspacing="1" border="1">
            <form action="svg.insert.php" method="post">
            <tr>
                <td>cx:</td>
                <td><input name="cx" type="text"></td>
            </tr>
            <tr>
                <td>cy:</td>
                <td><input name="cy" type="text"></td>
            </tr>
			<tr>
                <td>r:</td>
                <td><input name="r" type="text"></td>
            </tr>
            <tr>
                <td>style:</td>
                <td><input name="style" type="text"></td>
            </tr>
			
            <tr>
                <td><a href="svg.list.php">See Data</a></td>
                <td><input name="submit_data" type="submit" value="Insert Svg Data"></td>
            </tr>
            </form>
        </table>
    </div>
</body>
</html>
