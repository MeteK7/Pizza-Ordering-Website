<!DOCTYPE html>
<?php
include "config.php";

// Initialize the session
session_start();

function GetUsernameById($userid, $password) {
	include "config.php";
	$query_customer = "SELECT * FROM tbl_customer WHERE id='".$userid."' and password='".$password."'";
	$result_customer = $conn->query($query_customer);
	if ($result_customer->num_rows > 0) 
	{
		while($data_customer = $result_customer->fetch_assoc()) 
			{
				$_SESSION['username']= $data_customer['username'];
			}
	}
}

if(isset($_POST['submit-login'])){
	echo $_POST['userid'];
	$userid = $_POST['userid'];  
    $password = $_POST['password'];  

	//to prevent from mysqli injection
    $userid = stripcslashes($userid);
    $password = stripcslashes($password);
    $userid = mysqli_real_escape_string($conn, $userid);  
    $password = mysqli_real_escape_string($conn, $password);  

    if ($userid != "" && $password != ""){

        $sql = "select count(*) from tbl_customer where id='".$userid."' and password='".$password."'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count =mysqli_num_rows($result); 

        if($count > 0){
            $_SESSION['userid'] = $userid; //Adding the user id to the session
            
            GetUsernameById($userid, $password); //Getting the username by id

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

</head>
<body>
	<div>
		<form action="" method="POST">
			<label>Customer Number:</label>
			<input type="text" name="userid">
			<label>Password:</label>
			<input type="Password" name="password">
			<input type="submit" value="Log in" name="submit-login" id="submit-login">
		</form>
		<p>If you visit our website for the first time, please register:</p>
		<form action="register.php" method="POST">
			<label>User Name:</label>
			<input type="text" name="username">
			<label>Password:</label>
			<input type="Password" name="password">
			<label>Address:</label>
			<input type="text" name="address">
			<input type="submit" value="Register">
		</form>
	</div>
</body>
</html>