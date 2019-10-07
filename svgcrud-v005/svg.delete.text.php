<?php
include("index.html");
include("dbSvgConnect.php");

$id = $_GET['id']; // rowid from url

// Prepar the deleting query according to rowid
$query = "DELETE FROM text WHERE rowid=$id";

// Run the query to delete record
if( $db->query($query) ){
	$message = "</br>Record is deleted successfully.";
}else {
	$message = "</br>Sorry, Record is not deleted.";
}

echo $message;
?>


