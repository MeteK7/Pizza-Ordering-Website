<?php
//Attempt MySQL server connection.
include('config.php');

echo $_REQUEST['id-customer'];
echo $_REQUEST['id-region'];
echo $_REQUEST['total-gross-price'];
echo $_REQUEST['discount-rate'];
echo $_REQUEST['total-price'];
echo $_REQUEST['id-time-estimated'];
echo $_POST['date-added'];

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

    /*$id_customer = $_POST['id-customer'];
    $id_region = $_POST['id-region'];
    $total_gross_price = $_POST['total-gross-price'];
    $discount_rate = $_POST['discount-rate'];
    $total_price = $_POST['total-price'];
    $id_time_estimated = $_POST['id-time-estimated'];*/

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
?>