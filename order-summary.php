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

	$region =  $_GET['rb-region'];
	echo $region;
	echo "<br><br>";

	$types_of_menu=$_GET['chk-type-menu'];

	if (is_array($types_of_menu) || is_object($types_of_menu)) {
		foreach ($types_of_menu as $selected) {
			echo $selected."<br>";
		}
	}
		else // If $types_of_menu was not an array, then this block is executed. 
		{
			echo "Unfortunately, an error occured.";
		}

		echo "<br>";

		if (!empty($types_of_menu)) {
			foreach ($types_of_menu as $selected) {
				echo $selected."<br>";
			}
		}

		?>
		<div class="div-table-order-summary">
			<p>Order Summary:</p>
			<center>
				<table>
					<tr>
						<th>Customer Id</th>
						<th>Region</th>
						<th>Menu Types</th>
						<th>Gross Price</th>
						<th>Discount</th>
						<th>Grand Price</th>
						<th>Estimated Time</th>
					</tr>
					<tr>
						<th><?php echo $_SESSION['username'] ?></th>
						<th><?php echo $region ?></th>
						<th>
							<?php
							if(!empty($types_of_menu))
							{
								foreach ($types_of_menu as $selected)
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
		else // If $types_of_menu was not an array, then this block is executed. 
		{
			echo "Unfortunately, an error occured.";
		}
		?>
	</th>
	<th><?php   ?></th>
	<th><?php   ?></th>
	<th><?php   ?></th>
</tr>
</table>
</center>
</div>
</body>
</html>