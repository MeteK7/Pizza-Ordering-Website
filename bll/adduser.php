<?php 
	// sql to add a record
	include('../config.php');

	if(isset($_POST['adddata']))
    {   
        $username = $_POST['add-username'];
        $password = $_POST['add-password'];
        $email = $_POST['add-email'];
        $contact = $_POST['add-contact'];
        $birthdate = $_POST['add-birthdate'];
        $address = $_POST['add-address'];
        $is_admin = $_POST['add-chk-admin'];
        

        $sql_query = "INSERT INTO tbl_user (username, password, email, contact, birthdate, address, admin) VALUES ('$username', '$password', '$email', '$contact', '$birthdate', '$address', '$is_admin')";
        $query_run=$conn->query($sql_query);

        if($query_run)
        {
            echo '<script> alert("Data Has Been Inserted"); </script>';
            header("Location:../user-management.php");
        }
        else
        {
            //echo '<script> alert("Data Could Not Be Inserted"); </script>';
            echo "Error inserting record: " .$username.$is_admin;
        }
    }

	$conn->close();
?>