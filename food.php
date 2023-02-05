<!DOCTYPE html>
<?php 
	include('bll/get-bll.php');
?>
<html>
<head>
	<title>User Management</title>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/user-management.css">
</head>
<body>
<div class="container">
<div class="row">
	<div class="col-lg-12">
		<div class="main-box clearfix">
			<div class="table-responsive">
				<table class="table user-list">
					<thead>
						<tr>
							<th><span>Id</span></th>
							<th><span>Name</span></th>
							<th><span>Price Small</span></th>
							<th><span>Price Medium</span></th>
							<th><span>Price Large</span></th>
							<th><span>Quantity in Stock</span></th>
							<th class="text-center"><span>Address</span></th>
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
										<a href="#" class="user-link"><?php echo $data_food['name']; ?></a>
										<!--<span class="user-subhead">Admin</span>-->
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
										<a href="#" class="table-link">
											<span class="fa-stack">
												<i class="fa fa-square fa-stack-2x"></i>
												<i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
											</span>
										</a>
										<a href="#" class="table-link">
											<span class="fa-stack">
												<i class="fa fa-square fa-stack-2x"></i>
												<i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
											</span>
										</a>
										<a href="#" class="table-link danger">
											<span class="fa-stack">
												<i class="fa fa-square fa-stack-2x"></i>
												<i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
											</span>
										</a>
										<form action="bll/MenuBLL/delete-food.php" method="post">
										    <input type="submit" name="delete" value="DELETE" onclick="return confirm('Do you want to delete this record?');"/>
				                            <input type="hidden" id="deleteId" name="deleteId" value="<?php echo $data_food['id']; ?>"/>
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