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
		function calculateAvailabilityById(idQuantity,idAvailability, idAvailabilityConst){
			/*
			//var quantityTest=document.getElementById('qty-1');
			document.write("idQuantity Parameter= "+idQuantity+"<br><br>");
			document.write("Quantity by User= "+quantityByUser.value+"<br><br>");
			//document.write("Type of Menu= "+typeMenu+"<br><br>");
			//document.write("Quantity Test= "+quantityTest.value+"<br><br>");
			document.write("idAvailability Parameter= "+idAvailability+"<br><br>");
			document.write("Availability= "+availabilityInStock.innerHTML);
			*/
			var quantityByUser=document.getElementById(idQuantity);
			var availabilityNew=document.getElementById(idAvailability);
			var availabilityInStock=document.getElementById(idAvailabilityConst);
			availabilityNew.innerHTML=availabilityInStock.innerHTML;//Value from DB every trigger to calculate new availability.
			availabilityNew.innerHTML=availabilityNew.innerHTML-quantityByUser.value;
			//document.write("Availability= "+availabilityInStock.innerHTML);
			
		}
		function calculateGrandTotal(idQuantity, oldPrice){
			var price=document.getElementsByName('rb-price-pizza');
			var quantityByUser=document.getElementById(idQuantity);
			var newPrice=0;
			var totalPrice=document.getElementById('grand-total-price-pizza');

			for (var sizePrice of price)
			{
				if (sizePrice.checked) {
					newPrice=(sizePrice.value*quantityByUser.value);
				}
			}
			totalPrice.innerHTML=(totalPrice-oldPrice)+newPrice;
		}

		function calculateTotal(idQuantity,idTotalPrice,nameSizePrice){
			var sizePrice=document.getElementsByName(nameSizePrice);
			var quantityByUser=document.getElementById(idQuantity);
			var totalPrice=document.getElementById(idTotalPrice);
			var newPrice=0;

			for (var rbPrice of sizePrice)
			{
				if (rbPrice.checked) {
					newPrice=(rbPrice.value*quantityByUser.value);
				}
			}
			totalPrice.innerHTML=newPrice;
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
				<input type="radio" id="rb-pozcu" name="rb-region" value="Pozcu">
				<label for="pozcu">Pozcu</label>
				<br>
				<input type="radio" id="rb-mezitli" name="rb-region" value="Mezitli">
				<label for="mezitli">Mezitli</label>
				<br>
				<input type="radio" id="rb-toros-university" name="rb-region" value="Toros University">
				<label for="toros-university">Toros University</label>
				<br>
				<input type="radio" id="rb-others" name="rb-region" value="Others">
				<label for="others">Others</label>

				<br>

				<p>Type of Menu:</p>
				<input type="checkbox" id="chk-pizza" name="chk-type-menu[]" value="Pizza">
				<label for="pizza">Pizza</label>
				<br>
				<input type="checkbox" id="chk-beverage" name="chk-type-menu[]" value="Beverage">
				<label for="beverage">Beverage</label>
				<br>
				<input type="checkbox" id="chk-dessert" name="chk-type-menu[]" value="Dessert">
				<label for="dessert">Dessert</label>		
			</div>
			<br>
			<div class="div-table-pizza">
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
							$counter=1;
							while($data_pizza = $result_pizza->fetch_assoc()) 
							{
								?>
								<tr>
									<td><?php echo $counter; ?></td>
									<td><?php echo $data_pizza['name']; ?></td>
									<td><input type="radio" id="rb-pizza-price-small" name="rb-size-price-pizza-<?php echo $data_pizza['id'];?>" value="<?php echo $data_pizza['price_small']; ?>"><?php echo $data_pizza['price_small']; ?></td>
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
									$counter++;
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
								<td>Total:<strong id="grand-total-price-pizza">fgjgfjhnhfgh</strong></td>
							</tr>
						</table>
					</center>
				</div>
				<div class="div-table-beverage">
					<p>Beverage:</p>
					<center>
						<table>
							<tr>
								<th></th>
								<th></th>
								<th class="th-price">Price</th>
								<th colspan="2"></th>
							</tr>
							<tr>
								<th></th>
								<th>Beverages</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Availability</th>
							</tr>
							<?php
							if ($result_beverage->num_rows > 0) 
							{
								$counter=1;
								while($data_beverage = $result_beverage->fetch_assoc()) 
								{
									?>
									<tr>
										<td><?php echo $counter; ?></td>
										<td><?php echo $data_beverage['name']; ?></td>
										<td><?php echo $data_beverage['price_small']; ?></td>
										<td>
											<input onkeyup="calculateAvailabilityById('qty-beverage-<?php echo $data_beverage['id'];?>', 'availability-beverage-<?php echo $data_beverage['id'];?>','availability-beverage-const-<?php echo $data_beverage['id'];?>')" type="text" id="qty-beverage-<?php echo $data_beverage['id'];?>" name="beverage">
										</td>
										<td id="availability-beverage-<?php echo $data_beverage['id'];?>">
											<?php echo $data_beverage['availability']; ?> 
										</td>
										<!--This is a constant value only for calculating new availability.-->
										<td style="display:none;" id="availability-beverage-const-<?php echo $data_beverage['id'];?>">
											<?php echo $data_beverage['availability']; ?>
										</td>
									</tr>
									<?php
									$counter++;
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
						</table>
					</center>
				</div>		
				<div class="div-table-dessert">
					<p>Dessert:</p>
					<center>
						<table>
							<tr>
								<th></th>
								<th></th>
								<th class="th-price">Price</th>
								<th colspan="2"></th>
							</tr>
							<tr>
								<th></th>
								<th>Desserts</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Availability</th>
							</tr>
							<?php
							if ($result_dessert->num_rows > 0) 
							{
								$counter=1;
								while($data_dessert = $result_dessert->fetch_assoc()) 
								{
									?>
									<tr>
										<td><?php echo $counter; ?></td>
										<td><?php echo $data_dessert['name']; ?></td>
										<td><?php echo $data_dessert['price_small']; ?></td>
										<td>
											<input onkeyup="calculateAvailabilityById('qty-dessert-<?php echo $data_dessert['id'];?>', 'availability-dessert-<?php echo $data_dessert['id'];?>','availability-beverage-const-<?php echo $data_dessert['id'];?>')" type="text" id="qty-dessert-<?php echo $data_dessert['id'];?>" name="dessert">
										</td>
										<td id="availability-dessert-<?php echo $data_dessert['id'];?>">
											<?php echo $data_dessert['availability']; ?> 
										</td>
										<!--This is a constant value only for calculating new availability.-->
										<td style="display:none;" id="availability-dessert-const-<?php echo $data_dessert['id'];?>">
											<?php echo $data_dessert['availability']; ?>
										</td>
									</tr>
									<?php
									$counter++;
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
						</table>
					</center>
				</div>
				<input type="submit" value="Order" name="submit-order">
			</form>
		</div>
	</body>
	</html>