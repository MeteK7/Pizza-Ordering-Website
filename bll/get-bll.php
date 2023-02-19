<?php 
function GetData($table_name){
	include('config.php');
	$query_data = "SELECT * FROM $table_name";
	$result_data = $conn->query($query_data);
	return $result_data;
}
?>