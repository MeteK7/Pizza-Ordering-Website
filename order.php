<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Order</title>
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

			<div>
				<p>Pizza:</p>
				
			</div>			
		</form>
	</div>
</body>
</html>