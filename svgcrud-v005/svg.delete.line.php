<?php
include("index.html");
include("dbSvgConnect.php");

$id = $_GET['id']; // rowid from url

// Prepar the deleting query according to rowid
$query = "DELETE FROM line WHERE rowid=$id";

if( $db->query($query) ){
	$message = "Record is deleted successfully.";
}else {
	$message = "Sorry, Record is not deleted.";
}
echo $message;
?>


