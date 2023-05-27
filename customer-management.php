<!DOCTYPE html>
<?php 
	include('bll/get-bll.php');
?>
<html>
<head>
	<title>Customer Management</title>
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
	        <h4 class="modal-title">Add Customer</h4>
	        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
	      </div>

	      <!-- Modal Body -->
	      <div class="modal-body">
	      	<form action="bll/addcustomer.php" method="POST">
		      	<div>
		          	<label><strong>Name</strong></label>
		          	<br>
		          	<input type="text" id="add-username" name="add-username" required>
	        	</div>
		      	<div>
		          	<label><strong>Password</strong></label>
		          	<br>
		          	<input type="Password" id="add-password" name="add-password" required>
	        	</div>
		      	<div>
		          	<label><strong>Email</strong></label>
		          	<br>
		          	<input type="text" id="add-email" name="add-email" required>
	        	</div>  
	        	<div>
		          	<label><strong>Contact</strong></label>
		          	<br>
		          	<input type="text" id="add-contact" name="add-contact" required>
	        	</div>
		      	<div>
		          	<label><strong>Birth Date</strong></label>
		          	<br>
		          	<input type="text" id="add-birthdate" name="add-birthdate" required>
	        	</div>
		      	<div>
		          	<label><strong>Address</strong></label>
		          	<br>
		          	<textarea id="add-address" name="add-address" rows="4" cols="50" required></textarea>
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
	        <h4 class="modal-title">Customer Details</h4>
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
	          	<p id="username"></p>
        	</div>
	      	<div>
	          	<label><strong>Email</strong></label>
	          	<p id="email"></p>
        	</div>  
	      	<div>
	          	<label><strong>Contact</strong></label>
	          	<p id="contact"></p>
        	</div>
	      	<div>
	          	<label><strong>Birth Date</strong></label>
	          	<p id="birthdate"></p>
        	</div>
	      	<div>
	          	<label><strong>Address</strong></label>
	          	<p id="address"></p>
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
	        <h4 class="modal-title">Edit Customer</h4>
	        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
	      </div>

	      <!-- Modal Body -->
	      <div class="modal-body">
	      	<form action="bll/updatecustomer.php" method="POST">
		      	<div>
		          	<input type="hidden" id="update-id" name="update-id"/>
	        	</div>
		      	<div>
		          	<label><strong>Name</strong></label>
		          	<br>
		          	<input type="text" id="update-username" name="update-username" required>
	        	</div>
		      	<div>
		          	<label><strong>Email</strong></label>
		          	<br>
		          	<input type="text" id="update-email" name="update-email" required>
	        	</div>  
	        	<div>
		          	<label><strong>Contact</strong></label>
		          	<br>
		          	<input type="text" id="update-contact" name="update-contact" required>
	        	</div>
		      	<div>
		          	<label><strong>Birth Date</strong></label>
		          	<br>
		          	<input type="text" id="update-birthdate" name="update-birthdate" required>
	        	</div>
		      	<div>
		          	<label><strong>Address</strong></label>
		          	<br>
		          	<textarea type="text" id="update-address" name="update-address" rows="4" cols="50" required></textarea>
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
                <h2>Customer Management</h2>
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
										<?php 
											$table_name="tbl_customer"; //Get table name for once and use it below.
											$table_data=GetData($table_name);
											$row_count=mysqli_num_rows($table_data);
										?>
										<p>Customer Count: <?php echo $row_count; ?></p>
										<table class="table data-list">
											<thead>
												<tr>
													<th><span>User Id</span></th>
													<th><span>Username</span></th>
													<th><span>Email</span></th>
													<th><span>Contact</span></th>
													<th><span>Birthdate</span></th>
													<th class="text-center"><span>Address</span></th>
													<th>&nbsp;</th>
												</tr>
											</thead>
											<tbody>
												<?php 
												if ($table_data->num_rows > 0) 
												{
													while($data = $table_data->fetch_assoc()) 
													{
														?>
														<tr>
															<td>
																<p><?php echo $data['id']; ?></p>
															</td>			
															<td>
																<img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
																<p href="#" class="data-link"><?php echo $data['username']; ?></p>
																<!--<span class="data-subhead">Admin</span>-->
															</td>
															<td>
																<p href="#"><?php echo $data['email']; ?></p>
															</td>
															<td>
																<p href="#"><?php echo $data['contact']; ?></p>
															</td>
															<td>
																<p href="#"><?php echo $data['birthdate']; ?></p>
															</td>
															<td>
																<p href="#"><?php echo $data['address']; ?></p>
															</td>
															<td style="width: 20%;">
																<button class="fa fa-search-plus fa-stack fa-inverse btn-view" 
																		data-id="<?php echo $data['id']; ?>" 
																		data-username="<?php echo $data['username']; ?>" 
																		data-email="<?php echo $data['email']; ?>" 
																		data-contact="<?php echo $data['contact']; ?>" 
																		data-birthdate="<?php echo $data['birthdate']; ?>" 
																		data-address="<?php echo $data['address']; ?>"  
																		data-bs-toggle="modal" 
																		data-bs-target="#modal-view">
																</button>
																<button class="fa fa-pencil fa-stack fa-inverse btn-update" 
																		data-id="<?php echo $data['id']; ?>" 
																		data-username="<?php echo $data['username']; ?>" 
																		data-email="<?php echo $data['email']; ?>" 
																		data-contact="<?php echo $data['contact']; ?>" 
																		data-birthdate="<?php echo $data['birthdate']; ?>" 
																		data-address="<?php echo $data['address']; ?>"  
																		data-bs-toggle="modal" 
																		data-bs-target="#modal-update">
																</button> 
																<form action="bll/delete.php" method="post" class="fa-stack">
																	    <button type="submit" name="btn-delete" class="fa fa-trash-o fa-stack-1x fa-inverse btn-delete" onclick="return confirm('Do you want to delete this record?');"></button> 
											                            <input type="hidden" name="id-data" value="<?php echo $data['id']; ?>"/>
											                            <input type="hidden" name="table-name" value="<?php echo $table_name; ?>"/>
											                            <input type="hidden" name="page-name" value="customer-management.php"/>
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
		    var username = $(this).data('username');  
		    var email = $(this).data('email');     
		    var contact = $(this).data('contact');     
		    var birthdate = $(this).data('birthdate');     
		    var address = $(this).data('address');      

		    $('#id').html(id);  
		    $('#username').html(username);  
		    $('#email').html(email);  
		    $('#contact').html(contact);  
		    $('#birthdate').html(birthdate);  
		    $('#address').html(address);   
	    } );

	    $('.btn-update').click(function() {
		    var id = $(this).data('id');      
		    var username = $(this).data('username');  
		    var email = $(this).data('email');     
		    var contact = $(this).data('contact');     
		    var birthdate = $(this).data('birthdate');     
		    var address = $(this).data('address');

		    $('#update-id').val(id);  
		    $('#update-username').val(username);  
		    $('#update-email').val(email);  
		    $('#update-contact').val(contact);  
		    $('#update-birthdate').val(birthdate);  
		    $('#update-address').val(address);    
	    } );
	</script>
</body>
</html>