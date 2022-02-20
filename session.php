<?php
include "config.php";

// Check user login or not
if(!isset($_SESSION['username'])){
    header('Location: login-customer.php');
}

// logout
if(isset($_POST['submit-logout'])){
    session_destroy();
    header('Location: login-customer.php');
}
?>

<!--
https://makitweb.com/create-simple-login-page-with-php-and-mysql/
https://www.tutorialspoint.com/php/php_mysql_login.htm
-->