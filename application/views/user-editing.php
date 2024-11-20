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
							<div class="box-body">
								<?php
								if(isset($_GET['sid']))
								{
									$sid =  $_GET['sid'];
									$table = "pslv_user";

									$cond = array(
										'pslv_sno' => $sid
									);
									
									$mat = $mod->getOnerowdata($table,$cond);

									?>
									<div class="modal-body">
								    	<form class="" method="POST" action="<?php echo CORE;?>functions.php?case=updouser&p=<?php echo 'user-creation';?>&id=<?php echo $sid;?>">
								    <div class="form-group row">
										<div class="col-lg-6 col-md-6">
											
												<label>Employee ID</label>
									<input type="text" name="fempid" value="<?php echo $mat['pslv_empid'];?>" class="form-control">

										</div>
										<div class="col-lg-6 col-md-6">
											<label>Name of Employee</label>
											<input type="text" name="fname" value="<?php echo $mat['pslv_name'];?>" class="form-control">
										</div>

									</div>
									
									<div class="form-group row">
										<div class="col-lg-6 col-md-6">
											<label>Email Address</label>
											<input type="text" name="femail" value="<?php echo $mat['pslv_email'];?>" class="form-control">
										</div>
										<div class="col-lg-6 col-md-6">
											<label>User Post</label>
											<input type="text" name="fpost" value="<?php echo $mat['pslv_post'];?>" class="form-control">
											
										</div>

									</div>
									<div class="form-group row">
										<div class="col-lg-6 col-md-6">
											<label>Process / Dept.</label>
											<select class="form-control" name="fprocess" required>
												<option value="<?php echo $mat['pslv_process'];?>" hidden><?php echo $mat['pslv_process'];?></option>
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
											<label>Manager Name</label>
											<input type="text" name="fmanager" value="<?php echo $mat['pslv_manager'];?>" class="form-control">
										</div>

									</div>
									
								
								    </div>
								    <div class="modal-footer">
								    	<input type="submit" name="updateUser" value="Submit" class="btn btn-dark">
							        
							      </div>
									</form>
									<?php
								}
							?>
							
							</div>
							
						</div>
					</div>
				</div>
			</section>
		</div>
		
		
<?php
require_once('dash-footer.php');
?>