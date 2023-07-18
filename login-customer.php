<!DOCTYPE html>
<?php
include "config.php";

// Initialize the session
session_start();

function GetUsernameById($userid, $userpassword) {
	include "config.php";
	$hashed_password = hash('sha256', $userpassword, false);
	$query_customer = "SELECT username FROM tbl_customer WHERE id=? AND password=?";
	$stmt_customer = $conn->prepare($query_customer);
	$stmt_customer->bind_param("is", $userid, $hashed_password);
	$stmt_customer->execute();
	$result_customer=$stmt_customer->get_result();

	$username = null;
	if ($result_customer->num_rows > 0) 
	{
		$row = $result_customer->fetch_assoc();
		$username = $row['username'];
	}

	$stmt_customer->close();
	$conn->close();

	return $row['username'];
}

function function_alert($message) {
      
    // Display the alert box 
    echo "<script>alert('$message');</script>";
}

if(isset($_POST['submit-login'])){
	echo $_POST['userid'];
	$userid = $_POST['userid'];  
    $userpassword = $_POST['userpassword'];  

	//to prevent from mysqli injection
    $userid = stripcslashes($userid);
    $userpassword = stripcslashes($userpassword);
    $userid = mysqli_real_escape_string($conn, $userid);  
    $userpassword = mysqli_real_escape_string($conn, $userpassword);  

    if ($userid != "" && $userpassword != ""){

        $sql = "select count(*) from tbl_customer where id='".$userid."' and password='".$userpassword."'";
        $result = mysqli_query($conn,$sql);
        $count =mysqli_num_rows($result); 

        if($count > 0){
            $_SESSION['userid'] = $userid; //Adding the user id to the session

            $_SESSION['username'] = GetUsernameById($userid, $userpassword); //Getting the username by id

            header('Location: order.php'); //Routing to the ordering page
        }

        else{
            echo "Invalid userid and password";
        }

    }

}
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login as Customer</title>
	<link rel="stylesheet" type="text/css" href="css/style-login.css">
	<script>
		function toggleForms() {
			var loginForm = document.getElementById("login-form");
			var registerForm = document.getElementById("register-form");

			if (loginForm.style.display === "none") {
				loginForm.style.display = "block";
				registerForm.style.display = "none";
			} else {
				loginForm.style.display = "none";
				registerForm.style.display = "block";
			}
		}
	</script>
</head>
<body>
	<div class="container">
		<div class="login-form" id="login-form"style="display: block;">
			<h1>Login as Customer</h1>
			<form action="" method="POST">
				<label for="userid">Customer Number:</label>
				<input type="text" name="userid" id="userid">
				<label for="userpassword">Password:</label>
				<input type="password" name="userpassword" id="userpassword">
				<input type="submit" value="Log in" name="submit-login" id="submit-login">
			</form>
			<p>If you are visiting our website for the first time, <a href="#" onclick="toggleForms()">register here</a>.</p>
		</div>

		<div class="register-form" id="register-form" style="display: none;">
			<h1>Register as Customer</h1>
			<form action="register.php" method="POST">
				<label for="username">User Name:</label>
				<input type="text" name="username" id="username">
				<label for="userpassword">Password:</label>
				<input type="password" name="userpassword" id="userpassword">
				<label for="email">Email:</label>
				<input type="text" name="email" id="email">
				<label for="contact">Contact:</label>
				<input type="text" name="contact" id="contact">
				<label for="address">Address:</label>
				<input type="text" name="address" id="address">
				<input type="submit" value="Register">
			</form>
			<p>If you already have an account, <a href="#" onclick="toggleForms()">login here</a>.</p>
		</div>
	</div>
</body>
</html>