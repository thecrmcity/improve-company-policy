<?php
require_once('dash-header.php');
$mod = new Models();
?>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		
		<?php require_once('dash-top.php'); ?>

		<?php require_once('dash-sidebar.php'); ?>

		<div class="content-wrapper">
			<section class="content-header">
				<h1>
					<?php 
					echo $pageName;
					?>
				</h1>
				<ol class="breadcrumb">
					<li><a href="<?php echo VIWS; ?>dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="active"><?php echo $pageName;?></li>
				</ol>
			</section>

			<section class="content">
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="box p-3">
							<div class="box-header clearfix">
								
								<button class="btn btn-primary float-right" data-toggle="modal" data-target="#userForm"><i class="fa fa-user-plus"></i> Add User</button>
							</div>
							<div class="box-body">
								<div class="">
									<table id="attendance" class="table table-bordered table-striped">
										<thead class="bg-info">
											<tr>
												<th>S.No</th>
												<th>Creation_Date</th>
												<th>Employee_ID</th>
												<th>Email_Address</th>
												<th>Employee_Name</th>
												<th>Post</th>	
												<th>Department</th>
												<th>Manager</th>
												<th>Password</th>
												<th colspan="3">Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
													$num = "1";
													$table = "pslv_user";
													$cond = array(
														
														'pslv_status' => '1',
														'pslv_byemail' => $uemail
													);
													
													$postData = $mod->getAllrow($table,$cond);
													if($postData == "")
													{
														?>
														<tr>
															<td colspan="9" class="text-center">No Data</td>
														</tr>
														<?php
													}
													else
													{
													foreach($postData as $post)
													{

														?>

														<tr>
														<td><?php echo $num;?></td>
														<td><?php echo $post['pslv_createdon'];?></td>
														<td><?php echo $post['pslv_empid'];?></td>
														<td><?php echo $post['pslv_email'];?></td>
														<td><?php echo $post['pslv_name'];?></td>
														<td><?php echo $post['pslv_post'];?></td>
														<td><?php echo $post['pslv_process'];?></td>
														<td><?php echo $post['pslv_manager'];?></td>
														<td><?php
														$epass = $post['pslv_pass'];
														switch($epass)
														{
															case "Null":
															echo "<div class='badge badge-secondary'>Not Set</div>";
															break;
															default:
															echo "<div class='badge badge-success'>Already Set</div>";
															break;
														}
														?></td>
														<td><?php
														$epass = $post['pslv_pass'];
														switch($epass)
														{
															case "Null":
															
															break;
															default:
															?>
															<a href="<?php echo CORE; ?>functions.php?case=reset&sid=<?php echo $post['pslv_sno'];?>&p=<?php echo $pageName;?>" class="badge badge-info" title="Reset Password" onclick="return confirm('Are You Sure!')"><i class="fa fa-retweet"></i></a>
															<?php
															break;
														}
														?></td>
														
														<td><a href="user-editing.php?sid=<?php echo $post['pslv_sno'];?>" class="badge badge-success" title="User Edit"><i class="fa fa-edit"></i></a></td>
														<td><a href="<?php echo CORE;?>functions.php?case=deluser&sid=<?php echo $post['pslv_sno'];?>&p=<?php echo $pageName;?>" class="badge badge-danger" title="Delete User" onclick="return confirm('Are You Sure!')"><i class="fa fa-trash"></i></a></td>
														</tr>
														<?php
														$num++;
													}

													}
													?>
										</tbody>
									</table>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</section>
		</div>
		<div class="modal"  id="userForm">
			<div class="modal-dialog">
				<div class="modal-content px-5 py-4 rounded">
					<div class="modal-header">
				        <h4 class="modal-title text-center mb-2 text-info">User Creation Form</h4>
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
				    </div>
				    <div class="modal-body">
				    	<form class="" method="POST" action="<?php echo CORE;?>functions.php?case=adduser&p=<?php echo $pageName;?>&eid=accessIsms">
				    <div class="form-group row">
						<div class="col-lg-6 col-md-6">
							<label>Prefix Value</label>
							<br>
							<input type="radio" name="prefix" required checked value="SIPLIND"> SIPLIND
							<input type="radio" name="prefix" required class="ml-2" value="SIPTEMP"> SIPTEMP


						</div>
						<div class="col-lg-6 col-md-6">
							<label>Employee ID</label>
							<input type="number" name="fempid" required class="form-control">
						</div>

					</div>
					<div class="form-group row">
						<div class="col-lg-12 col-md-12">
							<label>Name of Employee</label>
							<input type="text" name="fname" required class="form-control">
						</div>
						

					</div>
					<div class="form-group row">
						<div class="col-lg-12 col-md-12">
							<label>Email Address</label>
							<input type="email" name="femail" required class="form-control">
						</div>
						

					</div>
					<div class="form-group row">
						<div class="col-lg-6 col-md-6">
							<label>Process / Dept.</label>
							<select class="form-control" name="fprocess" required>
								<option value="" hidden>Select Process</option>
								<?php
									$table = 'pslv_cateories';
									$cond = array(
										'pslv_category' => 'process',
										'pslv_status' => '1'
									);
									$postData = $mod->getAllrow($table,$cond);

									foreach($postData as $post)
									{
										?>
										<option value="<?php echo $post['pslv_catname'];?>"><?php echo $post['pslv_catname'];?></option>
										<?php
									}

								?>
							</select>
							
						</div>
						<div class="col-lg-6 col-md-6">
							<label>User Post</label>
							<input type="text" name="fpost" required class="form-control">
						</div>

					</div>
					<div class="form-group row">
						<div class="col-lg-12 col-md-12">
							<label>Manager Name</label>
							<input type="text" name="fmanager" required class="form-control">
						</div>
					</div>
				
				    </div>
				    <div class="modal-footer">
				    	<input type="submit" name="saveUser" value="Submit" class="btn btn-dark">
			        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			      </div>
					</form>
				</div>
			</div>
		</div>
		
<?php
require_once('dash-footer.php');
?>