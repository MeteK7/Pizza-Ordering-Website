<?php 
function GetData($tblName){
	include('config.php');
	$query_user = "SELECT * FROM $tblName";
	$result_user = $conn->query($query_user);
	return $result_user;
}
?>