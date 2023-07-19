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
        
        $sql_query = "INSERT INTO tbl_customer (username, password, email, contact, birthdate, address) VALUES ('$username', '$password', '$email', '$contact', '$birthdate', '$address')";
        $query_run=$conn->query($sql_query);

        if($query_run)
        {
            echo '<script> alert("Data Has Been Inserted"); </script>';
            header("Location:../customer-management.php");
        }
        else
        {
            //echo '<script> alert("Data Could Not Be Inserted"); </script>';
            echo "Error inserting record: ".$conn->error;
        }
    }

	$conn->close();
?>