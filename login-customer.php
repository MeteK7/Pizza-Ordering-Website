<!DOCTYPE html>
<?php
include "config.php";

if(isset($_POST['submit-login'])){
	 $username = $_POST['username'];  
    $password = $_POST['password'];  

	 //to prevent from mysqli injection
    $username = stripcslashes($username);
    $password = stripcslashes($password);
    $username = mysqli_real_escape_string($conn, $username);  
    $password = mysqli_real_escape_string($conn, $password);  

    if ($username != "" && $password != ""){

        $sql = "select count(*) from tbl_customer where username='".$username."' and password='".$password."'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count =mysqli_num_rows($result); 

        if($count > 0){
            $_SESSION['username'] = $username;
            header('Location: order.php');
        }else{
            echo "Invalid username and password";
        }

    }

}
/*
OLD QUERY
        $sql_query = "select count(*) as cntUser from tbl_customer where username='".$username."' and password='".$password."'";
        $result = mysqli_query($conn,$sql_query);
        $row = mysqli_fetch_array($result);
        $count = $row['cntUser'];
*/
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login as Customer</title>

</head>
<body>
	<?php
	function register(){

	}
	?>
	<div>
		<form action="" method="post">
			<label>Customer Number:</label>
			<input type="text" name="username">
			<label>Password:</label>
			<input type="Password" name="password">
			<input type="submit" value="Log in" name="submit-login" id="submit-login">
		</form>
		<p>If you visit our website for the first time, please register:</p>
		<form action="register.php" method="post">
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