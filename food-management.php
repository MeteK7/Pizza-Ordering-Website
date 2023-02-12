<!DOCTYPE html>
<?php 
	include('bll/get-bll.php');
?>
<html>
<head>
	<title>User Management</title>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/user-management.css">
	<link rel="stylesheet" type="text/css" href="css/style-btn.css">
</head>
<body>
<div class="container">
<div class="row">
	<div class="col-lg-12">
		<div class="main-box clearfix">
			<div class="table-responsive">
				<table class="table data-list">
					<thead>
						<tr>
							<th><span>Id</span></th>
							<th><span>Name</span></th>
							<th><span>Price Small</span></th>
							<th><span>Price Medium</span></th>
							<th><span>Price Large</span></th>
							<th><span>Quantity in Stock</span></th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$result_food=GetData("tbl_pizza");
						if ($result_food->num_rows > 0) 
						{
							while($data_food = $result_food->fetch_assoc()) 
							{
								?>
								<tr>
									<td>
										<a href="#"><?php echo $data_food['id']; ?></a>
									</td>			
									<td>
										<img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
										<a href="#" class="data-link"><?php echo $data_food['name']; ?></a>
										<!--<span class="data-subhead">Admin</span>-->
									</td>
									<td>
										<a href="#"><?php echo $data_food['price_small']; ?></a>
									</td>
									<td>
										<a href="#"><?php echo $data_food['price_medium']; ?></a>
									</td>
									<td>
										<a href="#"><?php echo $data_food['price_large']; ?></a>
									</td>
									<td>
										<a href="#"><?php echo $data_food['availability']; ?></a>
									</td>
									<td style="width: 20%;">
										<form action="bll/MenuBLL/search-food.php" method="post" class="fa-stack">
											    <button type="submit" name="search" class="fa fa-search-plus fa-stack-1x fa-inverse btn-search"/></button> 
					                            <input type="hidden" name="searchId" id="searchId" value="<?php echo $data_food['id']; ?>"/>
					                            <input type="hidden" name="action" id="action" value="search"/>
										</form>
										<form action="bll/MenuBLL/update-food.php" method="post" class="fa-stack">
											    <button type="submit" name="update" class="fa fa-pencil fa-stack-1x fa-inverse btn-update"/></button> 
					                            <input type="hidden" name="updateId" id="updateId" value="<?php echo $data_food['id']; ?>"/>
					                            <input type="hidden" name="action" id="action" value="update"/>
										</form>
										<form action="bll/MenuBLL/delete-food.php" method="post" class="fa-stack">
											    <button type="submit" name="delete" class="fa fa-trash-o fa-stack-1x fa-inverse btn-delete" onclick="return confirm('Do you want to delete this record?');"/></button> 
					                            <input type="hidden" name="deleteId" id="deleteId" value="<?php echo $data_food['id']; ?>"/>
					                            <input type="hidden" name="action" id="action" value="delete"/>
										</form>
									</td>
								</tr>
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
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</div>
</body>
</html>