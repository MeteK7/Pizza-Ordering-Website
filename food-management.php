<!DOCTYPE html>
<?php 
include('bll/get-bll.php');
?>
<html>
<head>
	<title>Food Management</title>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style-management.css">
	<link rel="stylesheet" type="text/css" href="css/style-btn.css">
</head>
<body>
	<!-- ADD MODAL -->
	<div class="modal fade" id="modal-add">
		<div class="modal-dialog">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Add Food</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				</div>

				<!-- Modal Body -->
				<div class="modal-body">
					<form action="bll/addfood.php" method="POST">
						<div>
							<label><strong>Name</strong></label>
							<br>
							<input type="text" id="add-name" name="add-name" required>
						</div>
						<div>
							<label><strong>Price Small</strong></label>
							<br>
							<input id="add-price-small" name="add-price-small" required>
						</div>
						<div>
							<label><strong>Price Medium</strong></label>
							<br>
							<input type="text" id="add-price-medium" name="add-price-medium" required>
						</div>  
						<div>
							<label><strong>Price Large</strong></label>
							<br>
							<input type="text" id="add-price-large" name="add-price-large" required>
						</div>
						<div>
							<label><strong>Availability</strong></label>
							<br>
							<input type="text" id="add-availability" name="add-availability" required>
						</div>
					</div>

					<!-- Modal Footer -->
					<div class="modal-footer">
						<button type="submit" name="adddata" class="btn btn-primary">Add</button>
						<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- VIEW MODAL -->
	<div class="modal fade" id="modal-view">
		<div class="modal-dialog">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Food Details</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				</div>

				<!-- Modal Body -->
				<div class="modal-body">
					<div>
						<label><strong>Id</strong></label>
						<p id="id"></p>
					</div>
					<div>
						<label><strong>Name</strong></label>
						<p id="name"></p>
					</div>
					<div>
						<label><strong>Price Small</strong></label>
						<p id="price_small"></p>
					</div>
					<div>
						<label><strong>Price Medium</strong></label>
						<p id="price_medium"></p>
					</div>  
					<div>
						<label><strong>Price Large</strong></label>
						<p id="price_large"></p>
					</div>
					<div>
						<label><strong>Availability</strong></label>
						<p id="availability"></p>
					</div>
				</div>

				<!-- Modal Footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
				</div>

			</div>
		</div>
	</div>

	<!-- UPDATING MODAL -->
	<div class="modal fade" id="modal-update">
		<div class="modal-dialog">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Edit Food</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				</div>

				<!-- Modal Body -->
				<div class="modal-body">
					<form action="bll/updatefood.php" method="POST">
						<div>
							<input type="hidden" id="update-id" name="update-id"/>
						</div>
						<div>
							<label><strong>Name</strong></label>
							<br>
							<input type="text" id="update-name" name="update-name" required>
						</div>
						<div>
							<label><strong>Price Small</strong></label>
							<br>
							<input type="text" id="update-price-small" name="update-price-small" required>
						</div>
						<div>
							<label><strong>Price Medium</strong></label>
							<br>
							<input type="text" id="update-price-medium" name="update-price-medium" required>
						</div>  
						<div>
							<label><strong>Price Large</strong></label>
							<br>
							<input type="text" id="update-price-large" name="update-price-large" required>
						</div>
						<div>
							<label><strong>Availability</strong></label>
							<br>
							<input type="text" id="update-availability" name="update-availability" required>
						</div>
					</div>

					<!-- Modal Footer -->
					<div class="modal-footer">
						<button type="submit" name="updatedata" class="btn btn-primary">Update</button>
						<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="jumbotron">
			<div class="card">
				<h2>Food Management</h2>
			</div>
			<div class="card">
				<div class="card-body">
					<button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#modal-add">
						ADD DATA
					</button>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
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
						$table_name="tbl_pizza"; //Get table name for once and use it below.
						$table_data=GetData($table_name);
						if ($table_data->num_rows > 0) 
						{
							while($data = $table_data->fetch_assoc()) 
							{
								?>
								<tr>
									<td>
										<p href="#"><?php echo $data['id']; ?></p>
									</td>			
									<td>
										<img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
										<p href="#" class="data-link"><?php echo $data['name']; ?></p>
										<!--<span class="data-subhead">Admin</span>-->
									</td>
									<td>
										<p href="#"><?php echo $data['price_small']; ?></p>
									</td>
									<td>
										<p href="#"><?php echo $data['price_medium']; ?></p>
									</td>
									<td>
										<p href="#"><?php echo $data['price_large']; ?></p>
									</td>
									<td>
										<p href="#"><?php echo $data['availability']; ?></p>
									</td>
									<td style="width: 20%;">
										<button class="fa fa-search-plus fa-stack fa-inverse btn-view" 
										data-id="<?php echo $data['id']; ?>" 
										data-name="<?php echo $data['name']; ?>"
										data-price-small="<?php echo $data['price_small']; ?>"
										data-price-medium="<?php echo $data['price_medium']; ?>" 
										data-price-large="<?php echo $data['price_large']; ?>" 
										data-availability="<?php echo $data['availability']; ?>"
										data-bs-toggle="modal" 
										data-bs-target="#modal-view">
									</button>
									<button class="fa fa-pencil fa-stack fa-inverse btn-update" 
									data-id="<?php echo $data['id']; ?>" 
									data-name="<?php echo $data['name']; ?>" 
									data-price-small="<?php echo $data['price_small']; ?>"
									data-price-medium="<?php echo $data['price_medium']; ?>" 
									data-price-large="<?php echo $data['price_large']; ?>" 
									data-availability="<?php echo $data['availability']; ?>" 
									data-bs-toggle="modal" 
									data-bs-target="#modal-update">
								</button> 
								<form action="bll/delete.php" method="post" class="fa-stack">
									<button type="submit" name="btn-delete" class="fa fa-trash-o fa-stack-1x fa-inverse btn-delete" onclick="return confirm('Do you want to delete this record?');"></button> 
									<input type="hidden" name="id-data" value="<?php echo $data['id']; ?>"/>
									<input type="hidden" name="table-name" value="<?php echo $table_name; ?>"/>
									<input type="hidden" name="page-name" value="food-management.php"/>
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
</div>
</div>
</div>
</div>
<script>
	$('.btn-view').click(function() {
		var id = $(this).data('id');      
		var name = $(this).data('name');  
		var price_small = $(this).data('price-small');        
		var price_medium = $(this).data('price-medium');     
		var price_large = $(this).data('price-large');     
		var availability = $(this).data('availability');     

		$('#id').html(id);  
		$('#name').html(name);  
		$('#price_small').html(price_small);  
		$('#price_medium').html(price_medium);  
		$('#price_large').html(price_large);  
		$('#availability').html(availability);  
	} );

	$('.btn-update').click(function() {
		var id = $(this).data('id');      
		var name = $(this).data('name');  
		var price_small = $(this).data('price-small');     
		var price_medium = $(this).data('price-medium');     
		var price_large = $(this).data('price-large');     
		var availability = $(this).data('availability');     

		$('#update-id').val(id);  
		$('#update-name').val(name);  
		$('#update-price-small').val(price_small);    
		$('#update-price-medium').val(price_medium);  
		$('#update-price-large').val(price_large);  
		$('#update-availability').val(availability);  
	} );
</script>
</body>
</html>