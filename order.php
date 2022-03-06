<!DOCTYPE html>
<?php
include "session.php";
?>
<?php
include('config.php');
$query_pizza = "SELECT * FROM tbl_pizza";
$result_pizza = $conn->query($query_pizza);

$query_beverage = "SELECT * FROM tbl_beverage";
$result_beverage = $conn->query($query_beverage);

$query_dessert = "SELECT * FROM tbl_dessert";
$result_dessert = $conn->query($query_dessert);

$query_region = "SELECT * FROM tbl_region";
$result_region = $conn->query($query_region);

$query_menu = "SELECT * FROM tbl_menu";
$result_menu = $conn->query($query_menu);
?>
<?php
function get_pizza_quantity(){
	//YOU MAY WISH TO DEVELOP THIS FUNCTION IN THE FUTURE TO GET AVAILABILITY OF PIZZAS INSTEAD OF GETTING FROM LABEL.
}
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Order</title>
	<link rel="stylesheet" type="text/css" href="css/style-order.css">
	<script type="text/javascript">
		function toggleTables(checkBox, idMenu){
			var divTable=document.getElementById('div-menu-'+idMenu);
			/*document.write(checkBox.id);
			document.write(checkBox.checked);*/
			if (checkBox.checked) {
				divTable.style.display='block';
			}
			else{
				divTable.style.display='none';
			}
		}

		function calculateAvailabilityById(idQuantity,idAvailability, idAvailabilityConst){
			var quantityByUser=document.getElementById(idQuantity);
			var availabilityNew=document.getElementById(idAvailability);
			var availabilityInStock=document.getElementById(idAvailabilityConst);
			availabilityNew.innerHTML=availabilityInStock.innerHTML;//Value from DB every trigger to calculate new availability.
			availabilityNew.innerHTML=availabilityNew.innerHTML-quantityByUser.value;
		}

		function calculateTotal(idQuantity,idTotalPrice, idGrandTotalPrice, inputGrandTotalPrice, nameSizePrice){

			var sizePrice=document.getElementsByName(nameSizePrice);
			var quantityByUser=document.getElementById(idQuantity);
			var totalPrice=document.getElementById(idTotalPrice);
			var grandTotalPrice=document.getElementById(idGrandTotalPrice);
			var newTotalPrice;
			var newGrandTotalPrice;

			for (var rbPrice of sizePrice)
			{
				if (rbPrice.checked) {
					newTotalPrice=(rbPrice.value*quantityByUser.value);
				}
			}

			if (typeof quantityByUser.value !=='undefined' && typeof newTotalPrice !=='undefined') 
			{
			//Calculate the new grand total price: New Grand Total=(New Grand Total-oldMenuTotal)+newMenuTotal
			grandTotalPrice.innerHTML=(grandTotalPrice.innerHTML-totalPrice.innerHTML)+newTotalPrice;
			document.getElementById(inputGrandTotalPrice).value=grandTotalPrice.innerHTML;

			//Calculate the new menu total price;
			totalPrice.innerHTML=newTotalPrice;
		}
	}
		/*function doSomething(){
			document.getElementById('total-price-pizza').innerHTML="TEST";
		}

		var input=document.getElementById("qty-pizza-<?php echo $data_pizza['id'];?>");
		input.addEventListener("keyup", function () {
			doSomething();
		});
		input.addEventListener("keyup", function () {
			doSomethingElse();
		});*/
	</script>
</head>
<body>
	<h1>Welcome <?php echo $_SESSION['username']; ?></h1> 
	<form method='post' action="">
		<input type="submit" value="Logout" name="submit-logout">
	</form>
	<div>
		<form method="get" action="order-summary.php">
			<p>Welcome</p>
			<input type="hidden" name="id-customer"><?php echo $_SESSION['username']; ?></input> 
			<div>
				<p>Welcome to CSE216 Pizza Ordering Website. Please choose your region and type of ordering.</p>
				<br>
				<p>Regions:</p>
				<?php
				if ($result_region->num_rows > 0) 
				{
					while($data_region = $result_region->fetch_assoc()) 
					{
						?>
						<input type="radio" id="rb-region-<?php echo $data_region['id']; ?>" name="rb-region" value="<?php echo $data_region['id']; ?>">
						<label for="pozcu"><?php echo $data_region['name']; ?></label>
						<br>
						<?php
					}
				} 
				else 
				{ 
					?>
					<p>No data found</p>
					<?php 
				} 
				?>
				<br>
				<p>Type of Menu:</p>
				<?php
				if ($result_menu->num_rows > 0) 
				{
					while($data_menu = $result_menu->fetch_assoc()) 
					{
						?>
						<input type="checkbox" id="chk-menu-<?php echo $data_menu['id']; ?>" name="chk-menu[]" value="<?php echo $data_menu['name']; ?>" onclick="toggleTables(this, <?php echo $data_menu['id']; ?>)">
						<label for="<?php echo $data_menu['id']; ?>"><?php echo $data_menu['name']; ?></label>
						<br>
						<?php
					}
				} 
				else 
				{ 
					?>
					<p>No data found</p>
					<?php 
				} 
				?>		
			</div>
			<br>
			<div id="div-menu-1" class="div-menu"><!--Try defining ID dynamically!!!-->
				<p>Pizza:</p>
				<center>
					<table>
						<tr>
							<th></th>
							<th></th>
							<th colspan="3" class="th-price">Price</th>
							<th colspan="3"></th>
						</tr>
						<tr>
							<th></th>
							<th>Pizzas</th>
							<th>Small</th>
							<th>Medium</th>
							<th>Large</th>
							<th>Quantity</th>
							<th>Availability</th>
							<th>Total Price</th>
						</tr>
						<?php
						if ($result_pizza->num_rows > 0) 
						{
							while($data_pizza = $result_pizza->fetch_assoc()) 
							{
								?>
								<tr>
									<td><?php echo $data_pizza['id']; ?></td>
									<td><?php echo $data_pizza['name']; ?></td>
									<td><input type="radio" id="rb-price-small-pizza" name="rb-size-price-pizza-<?php echo $data_pizza['id'];?>" value="<?php echo $data_pizza['price_small']; ?>"><?php echo $data_pizza['price_small']; ?></td>
									<td><input type="radio" id="rb-pizza-price-medium" name="rb-size-price-pizza-<?php echo $data_pizza['id'];?>" value="<?php echo $data_pizza['price_medium']; ?>"><?php echo $data_pizza['price_medium']; ?></td>
									<td><input type="radio" id="rb-pizza-price-large" name="rb-size-price-pizza-<?php echo $data_pizza['id'];?>" value="<?php echo $data_pizza['price_large']; ?>"><?php echo $data_pizza['price_large']; ?></td>
									<td>
										<input
										onkeyup="
										calculateAvailabilityById(
											'qty-pizza-<?php echo $data_pizza['id'];?>',
											'availability-pizza-<?php echo $data_pizza['id'];?>',
											'availability-pizza-const-<?php echo $data_pizza['id'];?>'
											);
										calculateTotal('qty-pizza-<?php echo $data_pizza['id'];?>',
											'total-price-pizza-<?php echo $data_pizza['id'];?>',
											'grand-total-price-pizza',
											'input-grand-total-price-pizza',
											'rb-size-price-pizza-<?php echo $data_pizza['id']?>'
											);"
											type="text"
											id="qty-pizza-<?php echo $data_pizza['id'];?>"
											name="pizza">
										</td>

										<td id="availability-pizza-<?php echo $data_pizza['id'];?>">
											<?php echo $data_pizza['availability']; ?> 
										</td>
										<!--This is a constant value only for calculating new availability.-->
										<td style="display:none;" id="availability-pizza-const-<?php echo $data_pizza['id'];?>">
											<?php echo $data_pizza['availability']; ?> 
										</td>
										<td id="total-price-pizza-<?php echo $data_pizza['id'];?>"></td>
									</tr>
									<?php
								}
							} 
							else 
							{ 
								?>
								<tr>
									<td colspan="8">No data found</td>
								</tr>
								<?php 
							} 
							?>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>
									Total:<strong id="grand-total-price-pizza"></strong>
									<input type="hidden" id="input-grand-total-price-pizza" name="grand-total-price[]">
								</td>
							</tr>
						</table>
					</center>
				</div>
				<div id="div-menu-2" class="div-menu"><!--Try defining ID dynamically!!!-->
					<p>Beverage:</p>
					<center>
						<table>
							<tr>
								<th></th>
								<th></th>
								<th class="th-price">Price</th>
								<th colspan="3"></th>
							</tr>
							<tr>
								<th></th>
								<th>Beverages</th>
								<th>Small</th>
								<th>Quantity</th>
								<th>Availability</th>
								<th>Total Price</th>
							</tr>
							<?php
							if ($result_beverage->num_rows > 0) 
							{
								while($data_beverage = $result_beverage->fetch_assoc()) 
								{
									?>
									<tr>
										<td><?php echo $data_beverage['id']; ?></td>
										<td><?php echo $data_beverage['name']; ?></td>
										<td><input type="radio" id="rb-price-small-beverage" name="rb-size-price-beverage-<?php echo $data_beverage['id'];?>" value="<?php echo $data_beverage['price_small']; ?>"><?php echo $data_beverage['price_small']; ?></td>
										<td>
											<input
											onkeyup="
											calculateAvailabilityById('qty-beverage-<?php echo $data_beverage['id'];?>','availability-beverage-<?php echo $data_beverage['id'];?>','availability-beverage-const-<?php echo $data_beverage['id'];?>');
											calculateTotal('qty-beverage-<?php echo $data_beverage['id'];?>','total-price-beverage-<?php echo $data_beverage['id'];?>','grand-total-price-beverage','input-grand-total-price-beverage','rb-size-price-beverage-<?php echo $data_beverage['id']?>');"
											type="text"
											id="qty-beverage-<?php echo $data_beverage['id'];?>"
											name="beverage">
										</td>
										<td id="availability-beverage-<?php echo $data_beverage['id'];?>">
											<?php echo $data_beverage['availability']; ?> 
										</td>
										<!--This is a constant value only for calculating new availability.-->
										<td style="display:none;" id="availability-beverage-const-<?php echo $data_beverage['id'];?>">
											<?php echo $data_beverage['availability']; ?>
										</td>
										<td id="total-price-beverage-<?php echo $data_beverage['id'];?>"></td>
									</tr>
									<?php
								}
							} 
							else 
							{ 
								?>
								<tr>
									<td colspan="8">No data found</td>
								</tr>
								<?php 
							} 
							?>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>
									Total:<strong id="grand-total-price-beverage"></strong>
									<input type="hidden" id="input-grand-total-price-beverage" name="grand-total-price[]">
								</td>
							</tr>
						</table>
					</center>
				</div>		
				<div id="div-menu-3" class="div-menu"><!--Try defining ID dynamically!!!-->
					<p>Dessert:</p>
					<center>
						<table>
							<tr>
								<th></th>
								<th></th>
								<th class="th-price">Price</th>
								<th colspan="3"></th>
							</tr>
							<tr>
								<th></th>
								<th>Desserts</th>
								<th>Small</th>
								<th>Quantity</th>
								<th>Availability</th>
								<th>Total Price</th>
							</tr>
							<?php
							if ($result_dessert->num_rows > 0) 
							{
								while($data_dessert = $result_dessert->fetch_assoc()) 
								{
									?>
									<tr>
										<td><?php echo $data_dessert['id']; ?></td>
										<td><?php echo $data_dessert['name']; ?></td>
										<td><input type="radio" id="rb-price-small-dessert" name="rb-size-price-dessert-<?php echo $data_dessert['id'];?>" value="<?php echo $data_dessert['price_small']; ?>"><?php echo $data_dessert['price_small']; ?></td>
										<td>
											<input 
											onkeyup="
											calculateAvailabilityById(
												'qty-dessert-<?php echo $data_dessert['id'];?>', 
												'availability-dessert-<?php echo $data_dessert['id'];?>',
												'availability-dessert-const-<?php echo $data_dessert['id'];?>'
												);
											calculateTotal('qty-dessert-<?php echo $data_dessert['id'];?>',
												'total-price-dessert-<?php echo $data_dessert['id'];?>',
												'grand-total-price-dessert',
												'input-grand-total-price-dessert',
												'rb-size-price-dessert-<?php echo $data_dessert['id']?>'
												);" 
												type="text" 
												id="qty-dessert-<?php echo $data_dessert['id'];?>" 
												name="dessert">
											</td>
											<td id="availability-dessert-<?php echo $data_dessert['id'];?>">
												<?php echo $data_dessert['availability']; ?> 
											</td>
											<!--This is a constant value only for calculating new availability.-->
											<td style="display:none;" id="availability-dessert-const-<?php echo $data_dessert['id'];?>">
												<?php echo $data_dessert['availability']; ?>
											</td>
											<td id="total-price-dessert-<?php echo $data_dessert['id'];?>"></td>
										</tr>
										<?php
									}
								} 
								else 
								{ 
									?>
									<tr>
										<td colspan="8">No data found</td>
									</tr>
									<?php 
								} 
								?>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td>
										Total:<strong id="grand-total-price-dessert"></strong>
										<input type="hidden" id="input-grand-total-price-dessert" name="grand-total-price[]">
									</td>
								</tr>
							</table>
						</center>
					</div>
					<input type="submit" value="Order" name="submit-order">
				</form>
			</div>
		</body>
		</html>