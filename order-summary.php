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

	echo "Customer: ".$_SESSION['userid'];
	echo "<br><br>";

	//GETTING REGION INFO
	$id_region =  $_GET['rb-region'];
	$query_region = "SELECT * FROM tbl_region WHERE id=$id_region";
	$result_region = $conn->query($query_region);

	if ($result_region->num_rows > 0) {
		$name_region;
		$id_time_estimated;
		$id_time_unit;

		while($row = $result_region->fetch_assoc()) {
			$name_region=$row["name"];
			$id_time_estimated=$row["id_time_estimated"];
			$id_time_unit=$row["id_time_unit"];
			//echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["time_estimated"]."<br>";
		}
	} else {
		echo "0 results";
	}

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

	?>

	<?php 
	//MAKE A FUNCTION FOR THE CODE BELOW OR ALIGN IT IN THE CODE STRUCTURE.
	$query_discount_rate = "SELECT * FROM tbl_discount_rate";
	$result_discount_rate = $conn->query($query_discount_rate);
	?>	

	<form method='post' action="order-summary-insert.php">
		<!--Try defining ID dynamically!!!-->
		<div>
			<p>Order Detail:</p>
			<center>
				<table>
					<tr>
						<th>Id</th>
						<th>Product Name</th>
					</tr>
					<?php
					//GETTING CHOSEN PRODUCT INFO <WILL BE IMPROVED!!!>
					$id_products=$_GET['chk-product'];
					
					if (is_array($id_products) || is_object($id_products)) {
						foreach ($id_products as $id_product) {
							$query_pizza = "SELECT * FROM tbl_pizza WHERE id=$id_product";
							$result_pizza = $conn->query($query_pizza);

							if ($result_pizza->num_rows > 0) {
								$qty_pizza=$_GET["qty-pizza-".$id_product];
								while($data_pizza = $result_pizza->fetch_assoc()) {
									?>
									<tr>
										<td>
											<input type="hidden" name="id-products[]" value="<?php echo $id_product ?>">
											<?php echo $id_product."<br>" ?>
										</td>
										<td>
											<?php echo $data_pizza["name"]."<br>"; ?>
										</td>
										<td>
											<input type="hidden" name="qty-pizza-<?php echo $id_product;?>" value="<?php echo $qty_pizza ?>">
											<?php echo $qty_pizza ?>
										</td>
									</tr>
									<?php
								}
							} else {
								?>
								<tr>
									<td colspan="4">No data found</td>
								</tr>
							<?php 
							}
						}
					}

					// If $id_products was not an array, then this block is executed.
					else
					{
						echo "Unfortunately, an error occured.";
					}
					?>
				</table>
			</center>
		</div>

		<div class="div-table-order-summary">
			<p>Order Summary:</p>
			<center>
				<table>
					<tr>
						<th>Customer</th>
						<th>Region</th>
						<th>Menu Types</th>
						<th>Quantity</th>
						<th>Gross Price</th>
						<th>Discount</th>
						<th>Grand Price</th>
						<th>Estimated Time</th>
					</tr>
					<tr>
						<th><input type="hidden" name="id-customer" value="<?php echo $_SESSION['userid']; ?>"><?php echo $_SESSION['username']; ?></th>
						<input type="hidden" name="id-region" value="<?php echo $id_region; ?>">
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
							$total_gross_price=$_GET['total-gross-price'];

							if (is_array($total_gross_price) || is_object($total_gross_price)) {
								?>
								<input type="hidden" name="total-gross-price" value="<?php echo array_sum($total_gross_price); ?>"><?php echo array_sum($total_gross_price);
							}
							else
							{
							// If $menu was not an array, then this block is executed. 
								echo "Unfortunately, an error occured.";
							}
							?>
						</th>
						<th>
							<?php
							if ($result_discount_rate->num_rows > 0) 
							{
								while($data_discount_rate = $result_discount_rate->fetch_assoc()) 
								{
									$id=$data_discount_rate["id"];
									$price_min=$data_discount_rate["price_min"];
									$price_max=$data_discount_rate["price_max"];


									$total_gross_price=$_GET['total-gross-price'];

									if (is_array($total_gross_price) || is_object($total_gross_price)) {
										$summed_total_gross_price=array_sum($total_gross_price);

										if ($summed_total_gross_price>=$price_min && $summed_total_gross_price<=$price_max) {
											$discount=$data_discount_rate["discount"];
											echo "%"; ?><input type="hidden" name="discount-rate" value="<?php echo $discount; ?>"><?php echo $discount;
											break;
										}
										elseif ($summed_total_gross_price>=$price_min && is_null($price_max)) {
											$discount=$data_discount_rate["discount"];
											echo "%"; ?><input type="hidden" name="discount-rate" value="<?php echo $discount; ?>"><?php echo $discount;
											break;
										}
									}

								//echo "id: " .$id. " - Discount: " .$discount."<br>";
								}
							} 
							else 
							{ 
								echo "No data found";
							} 
							?>
						</th>
						<th>
							<?php
							$total_gross_price=$_GET['total-gross-price'];
							$summed_total_gross_price=array_sum($total_gross_price);

							$total_price=$summed_total_gross_price-(($summed_total_gross_price*$discount)/100);
							?>
							<input type="hidden" name="total-price" value="<?php echo $total_price; ?>"><?php echo $total_price."TL"; ?>
						</th>
						<input type="hidden" name="id-time-estimated" value="<?php echo $id_time_estimated; ?>">
						<th>
							<?php
							$query_time_estimated_region = "SELECT * FROM tbl_time_estimated WHERE id=$id_time_estimated";
							$result_time_estimated_region = $conn->query($query_time_estimated_region);
							while($row = $result_time_estimated_region->fetch_assoc()) {
								$time_estimated=$row["time"];
							}

							$query_time_unit_region = "SELECT * FROM tbl_time_unit WHERE id=$id_time_unit";
							$result_time_unit_region = $conn->query($query_time_unit_region);
							while($row = $result_time_unit_region->fetch_assoc()) {
								$time_unit=$row["name"];
							}
							echo $time_estimated.$time_unit;

						/*$test="SELECT tbl_region.id_time_estimated, tbl_time_estimated.time
						FROM `tbl_region`
						INNER JOIN tbl_time_estimated ON tbl_region.id_time_estimated=tbl_time_estimated.id";*/
						?>
					</th>
				</tr>
			</table>
		</center>
	</div>
	<input type="hidden" name="date-added" value="<?php echo date("Y-m-d H:i:s") ?>">
	<input type="submit" value="Insert" name="submit-order-summary">
</form>
</body>
</html>