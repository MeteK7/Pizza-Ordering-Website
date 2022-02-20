<?php
include "config.php";

// Check user login or not
if(!isset($_SESSION['uname'])){
    header('Location: login-customer.php');
}

// logout
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: login-customer.php');
}
?>