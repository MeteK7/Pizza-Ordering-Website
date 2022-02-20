<!DOCTYPE html>
<?php
include "config.php";

if(isset($_POST['but_submit'])){

    $uname = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    if ($uname != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from tbl_customer where username='".$uname."' and password='".$password."'";
        $result = mysqli_query($conn,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['uname'] = $uname;
            header('Location: order.php');
        }else{
            echo "Invalid username and password";
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
			<input type="submit" value="Log in" name="but_submit" id="but_submit">
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