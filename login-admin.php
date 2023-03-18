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

</head>
<body>
	<?php
	function register(){

	}
	?>
	<div>
		<form action="" method="POST">
			<label>Admin Number:</label>
			<input type="text" name="userid">
			<label>Password:</label>
			<input type="Password" name="password">
			<input type="submit" value="Log in" name="submit-login" id="submit-login">
		</form>
		<!--<p>If you visit our website for the first time, please register:</p>
		<form action="register.php" method="POST">
			<label>User Name:</label>
			<input type="text" name="username">
			<label>Password:</label>
			<input type="Password" name="password">
			<label>Address:</label>
			<input type="text" name="address">
			<input type="submit" value="Register">
		</form>-->
	</div>
</body>
</html>