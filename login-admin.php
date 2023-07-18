<!DOCTYPE html>
<?php
include "config.php";

// Initialize the session
session_start();

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

        $sql = "select count(*) from tbl_user where id='".$userid."' and password='".$password."'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count =mysqli_num_rows($result); 

        if($count > 0){
            $_SESSION['userid'] = $userid;
            header('Location: index-admin.php');
        }else{
            echo "Invalid userid and password";
        }

    }

}
/*
OLD QUERY
        $sql_query = "select count(*) as cntUser from tbl_customer where userid='".$userid."' and password='".$password."'";
        $result = mysqli_query($conn,$sql_query);
        $row = mysqli_fetch_array($result);
        $count = $row['cntUser'];
*/
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login as Admin</title>
	<link rel="stylesheet" type="text/css" href="css/style-login-admin.css">
</head>
<body>
	<div class="container">
		<div class="login-form">
			<h1>Login as Admin</h1>
			<form action="" method="POST">
				<div class="form-group">
					<label for="userid">Admin Number:</label>
					<input type="text" name="userid" id="userid">
				</div>
				<div class="form-group">
					<label for="password">Password:</label>
					<input type="password" name="password" id="password">
				</div>
				<div class="form-group">
					<input type="submit" value="Log in" name="submit-login" id="submit-login">
				</div>
			</form>
		</div>
	</div>
</body>
</html>