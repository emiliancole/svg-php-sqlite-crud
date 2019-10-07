<?php
include("index.html");
include("dbSvgConnect.php");

$id = $_GET['id']; // rowid from url

$query = "DELETE FROM ellipsetr WHERE rowid=$id";

if( $db->query($query) ){
	$message = "Record is deleted successfully.";
}else {
	$message = "Sorry, Record is not deleted.";
}
echo $message;
?>


