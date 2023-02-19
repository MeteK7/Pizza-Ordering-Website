<!DOCTYPE html>
<?php 
	include('bll/get-bll.php');
?>
<html>
<head>
	<title>Dessert Management</title>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style-management.css">
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
						$table_name="tbl_dessert"; //Get table name for once and use it below.
						$table_data=GetData($table_name);
						if ($table_data->num_rows > 0) 
						{
							while($data = $table_data->fetch_assoc()) 
							{
								?>
								<tr>
									<td>
										<a href="#"><?php echo $data['id']; ?></a>
									</td>			
									<td>
										<img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
										<a href="#" class="data-link"><?php echo $data['name']; ?></a>
										<!--<span class="data-subhead">Admin</span>-->
									</td>
									<td>
										<a href="#"><?php echo $data['price_small']; ?></a>
									</td>
									<td>
										<a href="#"><?php echo $data['price_medium']; ?></a>
									</td>
									<td>
										<a href="#"><?php echo $data['price_large']; ?></a>
									</td>
									<td>
										<a href="#"><?php echo $data['availability']; ?></a>
									</td>
									<td style="width: 20%;">
										<form action="bll/search.php" method="post" class="fa-stack">
											    <button type="submit" name="btn-search" class="fa fa-search-plus fa-stack-1x fa-inverse btn-search"/></button> 
					                            <input type="hidden" name="id-data" value="<?php echo $data['id']; ?>"/>
					                            <input type="hidden" name="table-name" value="<?php echo $table_name; ?>"/>
										</form>
										<form action="bll/update.php" method="post" class="fa-stack">
											    <button type="submit" name="btn-update" class="fa fa-pencil fa-stack-1x fa-inverse btn-update"/></button> 
					                            <input type="hidden" name="id-data" value="<?php echo $data['id']; ?>"/>
					                            <input type="hidden" name="table-name" value="<?php echo $table_name; ?>"/>
										</form>
										<form action="bll/delete.php" method="post" class="fa-stack">
											    <button type="submit" name="btn-delete" class="fa fa-trash-o fa-stack-1x fa-inverse btn-delete" onclick="return confirm('Do you want to delete this record?');"/></button> 
					                            <input type="hidden" name="id-data" value="<?php echo $data['id']; ?>"/>
					                            <input type="hidden" name="table-name" value="<?php echo $table_name; ?>"/>
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