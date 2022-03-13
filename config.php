<!--MySQLi Object-Oriented Connection-->
<?php
	$servername = "localhost";
	$username = "root";
	$password = "mg9R7psU";
	$database='pizza_ordering_website';

	// Create connection
	$conn = new mysqli($servername, $username, $password, $database);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
?>