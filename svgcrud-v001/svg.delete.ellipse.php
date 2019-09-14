<?php
include("index.html");
include("dbSvgConnect.php");

$id = $_GET['id']; // rowid from url

// Prepare the deleting query according to rowid
$query = "DELETE FROM ellipse WHERE rowid=$id";

// Run the query to delete record
if( $db->query($query) ){
	$message = "Record is deleted successfully.";
}else {
	$message = "Sorry, Record is not deleted.";
}
echo $message;
?>


