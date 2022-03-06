<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style-order.css">
	<title>Order Summary</title>
</head>
<body>
	<?php 
	//Use $_GET but if you want same thing in many pages according to user then use $_SESSION
	include "session.php";
	echo $_SESSION['username'];
	echo "<br><br>";

	$id_customer =  $_GET['id-customer'];
	echo "Customer: ".$id_customer;
	echo "<br><br>";

	//GETTING REGION INFO
	$region =  $_GET['rb-region'];
	$query_region = "SELECT * FROM tbl_region WHERE id=$region";
	$result_region = $conn->query($query_region);

	$name_region;
	$time_estimated_region;

	if ($result_region->num_rows > 0) {
  		// output data of each row
		while($row = $result_region->fetch_assoc()) {
			$name_region=$row["name"];
			$time_estimated_region=$row["time_estimated"];
			//echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["time_estimated"]."<br>";
		}
	} else {
		echo "0 results";
	}
	$conn->close();

	//GETTING MENU INFO
	$menu=$_GET['chk-menu'];

	if (is_array($menu) || is_object($menu)) {
		foreach ($menu as $selected) {
			echo $selected."<br>";
		}
	}

	// If $menu was not an array, then this block is executed.
	else
	{
		echo "Unfortunately, an error occured.";
	}

	echo "<br>";

	if (!empty($menu)) {
		foreach ($menu as $selected) {
			echo $selected."<br>";
		}
	}

	?>
	<div class="div-table-order-summary">
		<p>Order Summary:</p>
		<center>
			<table>
				<tr>
					<th>Customer</th>
					<th>Region</th>
					<th>Menu Types</th>
					<th>Gross Price</th>
					<th>Discount</th>
					<th>Grand Price</th>
					<th>Estimated Time</th>
				</tr>
				<tr>
					<th><?php echo $_SESSION['username'] ?></th>
					<th><?php echo $name_region; ?></th>
					<th>
						<?php
						if(!empty($menu))
						{
							foreach ($menu as $selected)
							{
								echo $selected."<br>";
							}
						}
						?>
					</th>
					<th>
						<?php
						$grand_total_price=$_GET['grand-total-price'];

						if (is_array($grand_total_price) || is_object($grand_total_price)) {
							echo array_sum($grand_total_price);
						}
		else // If $menu was not an array, then this block is executed. 
		{
			echo "Unfortunately, an error occured.";
		}
		?>
	</th>
	<th><?php   ?></th>
	<th><?php   ?></th>
	<th><?php echo $time_estimated_region;  ?></th>
</tr>
</table>
</center>
</div>
</body>
</html>