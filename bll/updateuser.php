<?php 
	// sql to update a record
	include('../config.php');

	if(isset($_POST['updatedata']))
    {   
        $id = $_POST['update-id'];
        $username = $_POST['update-username'];
        $email = $_POST['update-email'];
        $contact = $_POST['update-contact'];
        $birthdate = $_POST['update-birthdate'];
        $address = $_POST['update-address'];
        $is_admin = isset($_POST['update-isadmin']) ? 1 : 0; // check if checkbox is checked
        

        $sql_query = "UPDATE tbl_user SET username='$username', email='$email', contact='$contact', birthdate='$birthdate', address='$address', admin='$is_admin' WHERE id='$id'";
        $query_run=$conn->query($sql_query);

        if($query_run)
        {
            echo '<script> alert("Data Has Been Updated"); </script>';
            header("Location:../user-management.php");
        }
        else
        {
            //echo '<script> alert("Data could not be updated!"); </script>';
            echo "Error updating record: " . $conn->error;
        }
    }

	$conn->close();
?>