<?php
//Attempt MySQL server connection.
include('config.php');

 
// Escape user inputs for security
$first_name = $mysqli->real_escape_string($_REQUEST['first_name']);
$last_name = $mysqli->real_escape_string($_REQUEST['last_name']);
$email = $mysqli->real_escape_string($_REQUEST['email']);
 
// Attempt insert query execution
$sql = "INSERT INTO persons (first_name, last_name, email) VALUES ('$first_name', '$last_name', '$email')";
if($mysqli->query($sql) === true){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
 
// Close connection
$mysqli->close();
?>