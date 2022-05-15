<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="author" content="Mete KABA">
	<title>Pizza Ordering Website</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">

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
		echo "Connected successfully";
	?>
</head>
<body>
	<a href="https://toros.edu.tr">Toros University</a>
	<div id="div-customer"><a href="login-customer.php">Customer</a></div>
	<div id="div-admin"><a href="login-admin.php">Administrator</a></div>
</body>
</html>