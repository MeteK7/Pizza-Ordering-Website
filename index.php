<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="author" content="Mete KABA">
	<title>Pizza Ordering Website</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
		<header class="header">
			<h1>Pizza Ordering Website</h1>
		</header>
	<div class="container">
		<div class="popup">
			<ul>
				<li><a href="https://toros.edu.tr">Toros University</a></li>
				<li><a href="login-customer.php">Customer</a></li>
				<li><a href="login-admin.php">Administrator</a></li>
			</ul>
		</div>

		<main class="main">
			<!-- MySQLi Object-Oriented Connection -->
			<?php
				$servername = "localhost";
				$username = "root";
				$password = "mg9R7psU";
				$database = 'pizza_ordering_website';

				// Create connection
				$conn = new mysqli($servername, $username, $password, $database);

				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
				echo "Connected successfully";
			?>
		</main>
	</div>

	<footer class="footer">
		<p>&copy; <?php echo date("Y"); ?> Pizza Ordering Website. All rights reserved. | Developed by Mete KABA</p>
	</footer>
</body>
</html>