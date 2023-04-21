 <?php
  // Get the start and end dates from the form
  $start_date = $_POST["start-date"];
  $end_date = $_POST["end-date"];

  // Connect to the database
  include('config.php');

  // Get the total sale
  $sql = "SELECT SUM(total_price) AS total_sale FROM tbl_history_order WHERE date_added BETWEEN '$start_date' AND '$end_date'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $total_sale = $row["total_sale"];

  // Calculate the gross profit
  $gross_profit = $total_sale * 0.35;

  // Calculate the net income
  $net_income = $total_sale * 0.2;

  $conn->close();
?>