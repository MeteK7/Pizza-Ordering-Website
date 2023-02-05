<?php 
	// sql to delete a record
	include('../../config.php');
	$deleteId = $_POST['deleteId']; 
	$query_delete = "DELETE FROM tbl_pizza WHERE id=$deleteId";
	$result_delete=$conn->query($query_delete);
	
	if ($result_delete === TRUE) {
	  echo "Record deleted successfully";
	} 
	else {
	  echo "Error deleting record: " . $conn->error;
	}

	$conn->close();
?>