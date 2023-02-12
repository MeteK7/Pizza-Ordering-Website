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
						$result_user=GetData("tbl_customer");
						if ($result_user->num_rows > 0) 
						{
							while($data_user = $result_user->fetch_assoc()) 
							{
								?>
								<tr>
									<td>
										<a href="#"><?php echo $data_user['id']; ?></a>
									</td>			
									<td>
										<img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
										<a href="#" class="data-link"><?php echo $data_user['username']; ?></a>
										<!--<span class="data-subhead">Admin</span>-->
									</td>
									<td>
										<a href="#"><?php //echo $data_user['email']; ?></a>
									</td>
									<td>
										<a href="#"><?php //echo $data_user['credate']; ?></a>
									</td>
									<td>
										<a href="#"><?php echo $data_user['address']; ?></a>
									</td>
									<td style="width: 20%;">
<!-- 										<a href="#" class="table-link">
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
										</a> -->
										
										<form action="bll/UserManagementBLL/search-user.php" method="post" class="fa-stack">
											    <button type="submit" name="search" class="fa fa-search-plus fa-stack-1x fa-inverse btn-search"/></button> 
					                            <input type="hidden" name="searchId" id="searchId" value="<?php echo $data_user['id']; ?>"/>
					                            <input type="hidden" name="action" id="action" value="search"/>
										</form>
										<form action="bll/UserManagementBLL/update-user.php" method="post" class="fa-stack">
											    <button type="submit" name="update" class="fa fa-pencil fa-stack-1x fa-inverse btn-update"/></button> 
					                            <input type="hidden" name="updateId" id="updateId" value="<?php echo $data_user['id']; ?>"/>
					                            <input type="hidden" name="action" id="action" value="update"/>
										</form>
										<form action="bll/UserManagementBLL/delete-user.php" method="post" class="fa-stack">
											    <button type="submit" name="delete" class="fa fa-trash-o fa-stack-1x fa-inverse btn-delete" onclick="return confirm('Do you want to delete this record?');"/></button> 
					                            <input type="hidden" name="deleteId" id="deleteId" value="<?php echo $data_user['id']; ?>"/>
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