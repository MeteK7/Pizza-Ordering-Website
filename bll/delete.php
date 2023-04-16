<?php 
	// sql to delete a record
	include('../config.php');
	$id_data= $_POST['id-data']; 
	$table_name = $_POST['table-name']; 
	$page_name = $_POST['page-name']; 
	$query_delete = "DELETE FROM $table_name WHERE id=$id_data";
	$result_delete=$conn->query($query_delete);
	
	if ($result_delete === TRUE) {
	  echo "Record deleted successfully";
	  header("Location:../".$page_name);
	} 
	else {
	  echo "Error deleting record: " . $conn->error;
	}

	$conn->close();
?>