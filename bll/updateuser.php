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
        

        $query = "UPDATE tbl_user SET username='$username', email='$email', contact='$contact', birthdate='$birthdate', address='$address' WHERE id='$id'";
        $query_run=$conn->query($query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:../user-management.php");
        }
        else
        {
            //echo '<script> alert("Data Not Updated"); </script>';
            echo "Error updating record: " . $conn->error;
        }
    }

	$conn->close();
?>