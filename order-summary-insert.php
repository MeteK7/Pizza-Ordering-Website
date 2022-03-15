<?php
//Attempt MySQL server connection.
include('config.php');

echo $_REQUEST['id-customer'];
echo $_REQUEST['id-region'];
echo $_REQUEST['total-gross-price'];
echo $_REQUEST['discount-rate'];
echo $_REQUEST['total-price'];
echo $_REQUEST['id-time-estimated'];

if (isset($_REQUEST['id-customer']) && isset($_REQUEST['id-region']) && isset($_REQUEST['total-gross-price']) && isset($_REQUEST['discount-rate']) && isset($_REQUEST['total-price']) && isset($_REQUEST['id-time-estimated']))
{
    // Escape user inputs for security
    $id_customer = $mysqli->real_escape_string($_POST['id-customer']);
    $id_region = $mysqli->real_escape_string($_POST['id-region']);
    $total_gross_price = $mysqli->real_escape_string($_POST['total-gross-price']);
    $discount_rate = $mysqli->real_escape_string($_POST['discount-rate']);
    $total_price = $mysqli->real_escape_string($_POST['total-price']);
    $id_time_estimated = $mysqli->real_escape_string($_POST['id-time-estimated']);

    // Attempt insert query execution
    $sql = "INSERT INTO persons (id_customer, id_region, total_gross_price,discount_rate,total_price,id_time_estimated) VALUES ('$id_customer', '$id_region','total_gross_price', 'discount_rate', 'total_price' , 'id_time_estimated')";
    if($mysqli->query($sql) === true){
        echo "Records inserted successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
    }

    // Close connection
    $mysqli->close();
}
?>