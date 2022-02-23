<!DOCTYPE html>
<?php
include "session.php";
?>
<?php
include('config.php');
$query = "SELECT * FROM tbl_pizza";
$result = $conn->query($query);
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
	<style type="text/css">
		table {
			font-family: arial, sans-serif;
			border-collapse: collapse;
			width: 70%;
		}
		td, th {
			border: 1px solid #dddddd;
			text-align: left;
			padding: 8px;
		}

		tr:nth-child(even) {
			background-color: #dddddd;
		}
		.th-price{
			text-align: center;
		}
	</style>
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
	</script>
</head>
<body>
	<h1>Welcome <?php echo $_SESSION['username']; ?></h1> 
	<form method='post' action="">
		<input type="submit" value="Logout" name="submit-logout">
	</form>
	<div>
		<form action="payment-summary">
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
				<label for="toros-university">Pozcu</label>
				<br>
				<input type="radio" id="rb-others" name="rb-region" value="Others">
				<label for="others">Others</label>

				<br>

				<p>Type of Ordering:</p>
				<input type="checkbox" id="chk-pizza" name="chk-type-of-ordering" value="Pizza">
				<label for="pizza">Pizza</label>
				<br>
				<input type="checkbox" id="chk-beverage" name="chk-type-of-ordering" value="Beverage">
				<label for="beverage">Beverage</label>
				<br>
				<input type="checkbox" id="chk-dessert" name="chk-type-of-ordering" value="Dessert">
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
							<th colspan="2"></th>
						</tr>
						<tr>
							<th></th>
							<th>Pizzas</th>
							<th>Small</th>
							<th>Medium</th>
							<th>Large</th>
							<th>Quantity</th>
							<th>Availability</th>
						</tr>
						<?php
						if ($result->num_rows > 0) 
						{
							$sn=1;
							while($data = $result->fetch_assoc()) 
							{
								?>
								<tr>
									<td><?php echo $sn; ?></td>
									<td><?php echo $data['name']; ?></td>
									<td><?php echo $data['price_small']; ?></td>
									<td><?php echo $data['price_medium']; ?></td>
									<td><?php echo $data['price_large']; ?></td>
									<td>
										<input onkeyup="calculateAvailabilityById('qty-<?php echo $data['id'];?>', 'availability-<?php echo $data['id'];?>','availability-const-<?php echo $data['id'];?>')" type="text" id="qty-<?php echo $data['id'];?>" name="pizza">
									</td>
									<td id="availability-<?php echo $data['id'];?>">
										<?php echo $data['availability']; ?> 
									</td>
									<!--This is a constant value only for calculating new availability.-->
									<td style="display:none;" id="availability-const-<?php echo $data['id'];?>">
										<?php echo $data['availability']; ?> 
									</td>
									<tr>
										<?php
										$sn++;
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
										<!--
											<tr>
												<td>Vegetarian Pizza</td>
												<td>15TL</td>
												<td>17TL</td>
												<td>20TL</td>
												<td><input type="text" id="qty-pizza-vegetarian" name="quantity"></td>
												<td><label></label></td>
											</tr>
											<tr>
												<td>Chicken Pizza</td>
												<td>18TL</td>
												<td>20TL</td>
												<td>22TL</td>
												<td><input type="text" id="qty-pizza-chicken" name="quantity"></td>
												<td></td>
											</tr>
											<tr>
												<td>Meat Pizza</td>
												<td>18TL</td>
												<td>20TL</td>
												<td>22TL</td>
												<td><input type="text" id="qty-pizza-meat" name="quantity"></td>
												<td></td>
											</tr>
											<tr>
												<td>Pepperoni Pizza</td>
												<td>19TL</td>
												<td>21TL</td>
												<td>23TL</td>
												<td><input type="text" id="qty-pizza-pepperoni" name="quantity"></td>
												<td></td>
											</tr>
											<tr>
												<td>Mix Pizza</td>
												<td>20TL</td>
												<td>22TL</td>
												<td>24TL</td>
												<td><input type="text" id="qty-pizza-mix" name="quantity"></td>
												<td></td>
											</tr>
											<tr>
												<td>COME308 Special Pizza</td>
												<td>22TL</td>
												<td>23TL</td>
												<td>26TL</td>
												<td><input type="text" id="qty-pizza-come308-special" name="quantity"></td>
												<td></td>
											</tr>
										-->
									</table>
								</center>
							</div>
							<div class="div-table-beverage">
								<p>Beverage:</p>
								<center>
									<table>
										<tr>
											<th>Beverages</th>
											<th>Price</th>
											<th>Quantity</th>
											<th>Availability</th>
										</tr>
										<tr>
											<td>Water</td>
											<td>2TL</td>
											<td><input type="text" id="qty-water" name="quantity"></td>
											<td></td>
										</tr>
										<tr>
											<td>Cola</td>
											<td>4TL</td>
											<td><input type="text" id="qty-cola" name="quantity"></td>
											<td></td>
										</tr>
										<tr>
											<td>Beer</td>
											<td>6TL</td>
											<td><input type="text" id="qty-beer" name="quantity"></td>
											<td></td>
										</tr>
										<tr>
											<td>Ayran</td>
											<td>3TL</td>
											<td><input type="text" id="qty-ayran" name="quantity"></td>
											<td></td>
										</tr>
										<tr>
											<td>Tea</td>
											<td>4TL</td>
											<td><input type="text" id="qty-tea" name="quantity"></td>
											<td></td>
										</tr>
										<tr>
											<td>Coffee</td>
											<td>4TL</td>
											<td><input type="text" id="qty-coffee" name="quantity"></td>
											<td></td>
										</tr>
									</table>
								</center>
							</div>		
							<div class="div-table-dessert">
								<p>Dessert:</p>
								<center>
									<table>
										<tr>
											<th>Desserts</th>
											<th>Price</th>
											<th>Quantity</th>
											<th>Availability</th>
										</tr>
										<tr>
											<td>Apple Pie</td>
											<td>2TL</td>
											<td><input type="text" id="qty-apple-pie" name="quantity"></td>
											<td></td>
										</tr>
										<tr>
											<td>Chocolate Cake</td>
											<td>4TL</td>
											<td><input type="text" id="qty-chocolate-cake" name="quantity"></td>
											<td></td>
										</tr>
										<tr>
											<td>Banana Pudding</td>
											<td>6TL</td>
											<td><input type="text" id="qty-banana-pudding" name="quantity"></td>
											<td></td>
										</tr>
										<tr>
											<td>Ice Cream</td>
											<td>3TL</td>
											<td><input type="text" id="qty-ice-cream" name="quantity"></td>
											<td></td>
										</tr>
										<tr>
											<td>Cookie</td>
											<td>4TL</td>
											<td><input type="text" id="qty-cookie" name="quantity"></td>
											<td></td>
										</tr>
										<tr>
											<td>Stroopwafel</td>
											<td>4TL</td>
											<td><input type="text" id="qty-stroopwafel" name="quantity"></td>
											<td></td>
										</tr>
									</table>
								</center>
							</div>
						</form>
					</div>
				</body>
				</html>