<?php 
function GetUsers(){
	include('config.php');
	$query_customer = "SELECT * FROM tbl_customer";
	$result_customer = $conn->query($query_customer);
	return $result_customer;
}
?>