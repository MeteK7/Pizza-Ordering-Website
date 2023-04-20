<?php 
	// sql to add a record
	include('../config.php');

	if(isset($_POST['adddata']))
    {   
        $name = $_POST['add-name'];
        $price_small = $_POST['add-price-small'];
        $price_medium = $_POST['add-price-medium'];
        $price_large = $_POST['add-price-large'];
        $availability = $_POST['add-availability'];

        $sql_query = "INSERT INTO tbl_pizza (name, price_small, price_medium, price_large, availability) VALUES ('$name', '$price_small', '$price_medium', '$price_large', '$availability')";
        $query_run=$conn->query($sql_query);

        if($query_run)
        {
            echo '<script> alert("Data Has Been Inserted"); </script>';
            header("Location:../food-management.php");
        }
        else
        {
            //echo '<script> alert("Data Could Not Be Inserted"); </script>';
            echo "Error inserting record: ".$conn->error;
        }
    }

	$conn->close();
?>