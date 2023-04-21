<?php 
	// sql to add a record
	include('../config.php');

	if(isset($_POST['updatedata']))
    {   
        $id = $_POST['update-id'];
        $name = $_POST['update-name'];
        $price_small = $_POST['update-price-small'];
        $price_medium = $_POST['update-price-medium'];
        $price_large = $_POST['update-price-large'];
        $availability = $_POST['update-availability'];

        $sql_query = "UPDATE tbl_beverage SET name='$name', price_small='$price_small', price_medium='$price_medium', price_large='$price_large', availability='$availability' WHERE id='$id'";
        $query_run=$conn->query($sql_query);

        if($query_run)
        {
            echo '<script> alert("Data has been updated!"); </script>';
            header("Location:../beverage-management.php");
        }
        else
        {
            //echo '<script> alert("Data could not be updated!"); </script>';
            echo "Error updating record: ".$conn->error;
        }
    }

	$conn->close();
?>