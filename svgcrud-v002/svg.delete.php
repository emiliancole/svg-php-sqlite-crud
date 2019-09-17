<?php

// Includes database connection
include "dbSvgConnect.php";

$id = $_GET['id']; // rowid from url

// Prepar the deleting query according to rowid
$query = "DELETE FROM circle WHERE rowid=$id";

// Run the query to delete record
if( $db->query($query) ){
	$message = "Record is deleted successfully.";
}else {
	$message = "Sorry, Record is not deleted.";
}

echo $message;
?>
<a href="svg.list.php">Back to SvgList</a>

