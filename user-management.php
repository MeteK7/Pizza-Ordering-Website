<!DOCTYPE html>
<?php 
	include('BLL/UserManagementBLL/UserManagementBLL.php');
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
							<th><span>User Id</span></th>
							<th><span>Username</span></th>
							<th><span>Email</span></th>
							<th><span>Created</span></th>
							<th class="text-center"><span>Address</span></th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$result_customer=GetUsers();
						if ($result_customer->num_rows > 0) 
						{
							while($data_customer = $result_customer->fetch_assoc()) 
							{
								?>
								<tr>
									<td>
										<a href="#"><?php echo $data_customer['id']; ?></a>
									</td>			
									<td>
										<img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
										<a href="#" class="user-link"><?php echo $data_customer['username']; ?></a>
										<!--<span class="user-subhead">Admin</span>-->
									</td>
									<td>
										<a href="#"><?php //echo $data_customer['email']; ?></a>
									</td>
									<td>
										<a href="#"><?php //echo $data_customer['credate']; ?></a>
									</td>
									<td>
										<a href="#"><?php echo $data_customer['address']; ?></a>
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
										<form action="bll/UserManagementBLL/DeleteUser.php" method="post">
										    <input type="submit" name="delete" value="DELETE" onclick="return confirm('Do you want to delete this record?');"/>
                            <input type="hidden" id="deleteId" name="deleteId" value="<?php echo $data_customer['id']; ?>"/>
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
			<ul class="pagination pull-right">
				<li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
				<li><a href="#">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">5</a></li>
				<li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
			</ul>
		</div>
	</div>
</div>
</div>
</body>
</html>