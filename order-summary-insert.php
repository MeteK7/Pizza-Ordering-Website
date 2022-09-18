<?php
//Attempt MySQL server connection.
include('config.php');

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

    // Close connection
    $conn->close();
}

if (isset($_REQUEST['id-customer']) && isset($_REQUEST['id-region']) && isset($_REQUEST['total-gross-price']) && isset($_REQUEST['discount-rate']) && isset($_REQUEST['total-price']) && isset($_REQUEST['id-time-estimated'])) {
    // code...
}



?>
<?php
echo $_REQUEST['id-product'];
echo $_REQUEST['qty-pizza'];
echo $_REQUEST['total-gross-price'];
echo $_REQUEST['discount-rate'];

//GETTING CHOSEN PRODUCT INFO <WILL BE IMPROVED!!!>
$id_products=$_GET['chk-product'];

if (is_array($id_products) || is_object($id_products)) {
    foreach ($id_products as $id_product) {
        $query_pizza = "SELECT * FROM tbl_pizza WHERE id=$id_product";
        $result_pizza = $conn->query($query_pizza);

        if ($result_pizza->num_rows > 0) {
            while($data_pizza = $result_pizza->fetch_assoc()) {
                $qty_pizza_from_db=$data_pizza["availability"];
                $qty_pizza=$_REQUEST["qty-pizza-".$id_product];
                $qty_pizza_new=$qty_pizza_from_db-$qty_pizza;

                $query_update="UPDATE tbl_pizza SET availability='$qty_pizza_new' id ='$id_product'";

                $result =$conn->query($mysql_query);

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
}

// If $id_products was not an array, then this block is executed.
else
{
    echo "Unfortunately, an error occured.";
}
?>