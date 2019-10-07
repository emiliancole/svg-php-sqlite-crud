<?php
include("index.html");
include("dbSvgConnect.php");

$id = $_GET['id']; // rowid from url

$query = "DELETE FROM recttr WHERE rowid=$id";

if( $db->query($query) ){
	$message = "</br>Record is deleted successfully.";
}else {
	$message = "</br>Sorry, Record is not deleted.";
}

echo $message;
?>


