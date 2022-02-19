<!DOCTYPE html>
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
</head>
<body>
	<div>
		<form action="payment-summary">
			<div>
			<p>Welcome to CSE216 Pizza Ordering Website. Please choose your region and type of ordering.</p>
			<br>
			<p>Regions:</p>
			<input type="radio" id="pozcu" name="rb-region" value="Pozcu">
			<label for="pozcu">Pozcu</label>
			<br>
			<input type="radio" id="mezitli" name="rb-region" value="Mezitli">
			<label for="mezitli">Mezitli</label>
			<br>
			<input type="radio" id="toros-university" name="rb-region" value="Toros University">
			<label for="toros-university">Pozcu</label>
			<br>
			<input type="radio" id="others" name="rb-region" value="Others">
			<label for="others">Others</label>

			<br>

			<p>Type of Ordering:</p>
			<input type="checkbox" id="pizza" name="chk-type-of-ordering" value="Pizza">
			<label for="pizza">Pizza</label>
			<br>
			<input type="checkbox" id="beverage" name="chk-type-of-ordering" value="Beverage">
			<label for="beverage">Beverage</label>
			<br>
			<input type="checkbox" id="dessert" name="chk-type-of-ordering" value="Dessert">
			<label for="dessert">Dessert</label>		</div>

			<br>

			<div class="div-table-pizza">
				<p>Pizza:</p>
				<center>
				<table>
					<tr>
						<th></th>
						<th colspan="3" class="th-price">Price</th>
						<th colspan="2"></th>
					</tr>
				    <tr>
				    <th>Pizzas</th>
				    <th>Small</th>
				    <th>Medium</th>
				    <th>Large</th>
				    <th>Number</th>
				    <th>Availability</th>
				    </tr>
				    <tr>
				    <td>Vegetrian Pizza</td>
				    <td>15TL</td>
				    <td>17TL</td>
				    <td>20TL</td>
				    <td></td>
				    <td></td>
				    </tr>
				    <tr>
				    <td>Chicken Pizza</td>
				    <td>18TL</td>
				    <td>20TL</td>
				    <td>22TL</td>
				    <td></td>
				    <td></td>
				  </tr>
				  <tr>
				    <td>Meat Pizza</td>
				    <td>18TL</td>
				    <td>20TL</td>
				    <td>22TL</td>
				    <td></td>
				    <td></td>
				  </tr>
				  <tr>
				    <td>Pepperoni Pizza</td>
				    <td>19TL</td>
				    <td>21TL</td>
				    <td>23TL</td>
				    <td></td>
				    <td></td>
				  </tr>
				  <tr>
				    <td>Mix Pizza</td>
				    <td>20TL</td>
				    <td>22TL</td>
				    <td>24TL</td>
				    <td></td>
				    <td></td>
				  </tr>
				  <tr>
				    <td>COME308 Special Pizza</td>
				    <td>22TL</td>
				    <td>23TL</td>
				    <td>26TL</td>
				    <td></td>
				    <td></td>
				  </tr>
				</table>
			</center>
			</div>			
		</form>
	</div>
</body>
</html>