<?php
//Attempt MySQL server connection.
include('config.php');
include "session.php";

echo $_REQUEST['id-customer'];
echo $_REQUEST['id-region'];
echo $_REQUEST['total-gross-price'];
echo $_REQUEST['discount-rate'];
echo $_REQUEST['total-price'];
echo $_REQUEST['id-time-estimated'];
echo $_REQUEST['date-added'];

if (isset($_REQUEST['id-customer']) && isset($_REQUEST['id-region']) && isset($_REQUEST['total-gross-price']) && isset($_REQUEST['discount-rate']) && isset($_REQUEST['total-price']) && isset($_REQUEST['id-time-estimated']))
{
    // Escape user inputs for security
    $id_customer = $conn->real_escape_string($_REQUEST['id-customer']);
    $id_region = $conn->real_escape_string($_POST['id-region']);
    $total_gross_price = $conn->real_escape_string($_POST['total-gross-price']);
    $discount_rate = $conn->real_escape_string($_POST['discount-rate']);
    $total_price = $conn->real_escape_string($_POST['total-price']);
    $id_time_estimated = $conn->real_escape_string($_POST['id-time-estimated']);
    $date_added = $conn->real_escape_string($_POST['date-added']);

    // Attempt insert query execution
    $sql = "INSERT INTO tbl_history_order (id_customer, id_region, total_gross_price, discount_rate, total_price, id_time_estimated, date_added) VALUES ('$id_customer', '$id_region', '$total_gross_price', '$discount_rate', '$total_price' , '$id_time_estimated', '$date_added')";
    if($conn->query($sql) === true){
        echo "Records inserted successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . $conn->error;
    }

}

//Calculation of the new quantity in DB.
$name_tables=$_SESSION["chk-menu"];

if (is_array($name_tables) || is_object($name_tables)) {
    foreach ($name_tables as $name_table) {
        $id_products=$_REQUEST[$name_table];

        if (is_array($id_products) || is_object($id_products)) {
            foreach ($id_products as $id_product) {
                $query_product = "SELECT * FROM $name_table WHERE id=$id_product";
                $result_product = $conn->query($query_product);

                if ($result_product->num_rows > 0) {
                    while($data_product = $result_product->fetch_assoc()) {
                        $qty_pizza_from_db= $data_product["availability"];
                        $qty_product=$_REQUEST["qty-".$name_table."-".$id_product];
                        $qty_pizza_new=$qty_pizza_from_db-$qty_product;

                        $query_update="UPDATE $name_table SET availability='$qty_pizza_new' WHERE id =$id_product";

                        $result =$conn->query($query_update);

                        if ($result === TRUE) {
                          echo "Record updated successfully";
                        } 
                        else {
                          echo "Error updating record: " . $conn->error;
                        }
                    }
                } 
                else {
                    echo "No data found";
                }
            }
        }

        // If $id_products was not an array, then this block is executed.
        else
        {
            echo "Unfortunately, an error occured.";
        }
    }
    
    // Close connection
    $conn->close();
}

// If $name_tables was not an array, then this block is executed.
else
{
    echo "Unfortunately, an error occured.";
}


/*
//GETTING CHOSEN PRODUCT INFO <WILL BE IMPROVED!!!>
$id_products=$_REQUEST['id-products'];

if (is_array($id_products) || is_object($id_products)) {
    foreach ($id_products as $id_product) {
        echo "TEST: ".$id_product;
        $query_pizza = "SELECT * FROM tbl_pizza WHERE id=$id_product";
        $result_pizza = $conn->query($query_pizza);

        if ($result_pizza->num_rows > 0) {
            while($data_pizza = $result_pizza->fetch_assoc()) {
                $qty_pizza_from_db=$data_pizza["availability"];
                $qty_pizza=$_REQUEST["qty-pizza-".$id_product];
                echo "QTY From DB: ".$qty_pizza_from_db;
                echo "QTY From Order: ".$qty_pizza;
                $qty_pizza_new=$qty_pizza_from_db-$qty_pizza;

                $query_update="UPDATE tbl_pizza SET availability='$qty_pizza_new' WHERE id =$id_product";

                $result =$conn->query($query_update);

                if ($result === TRUE) {
                  echo "Record updated successfully";
              } else {
                  echo "Error updating record: " . $conn->error;
              }
          }
      } else {
        echo "No data found";
    }
}

// Close connection
$conn->close();
}

// If $id_products was not an array, then this block is executed.
else
{
    echo "Unfortunately, an error occured.";
}
?>
*/