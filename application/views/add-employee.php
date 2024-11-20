<?php
require_once('dash-header.php');
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
								<div class="row">
									<div class="col-lg-6 col-md-6">
										<a href="<?php echo PUB;?>Employee_format.xls" class="btn btn-secondary" download><i class="fa fa-download"></i> Employee Format Sheet</a>
									</div>
									<div class="col-lg-6 col-md-6 clearfix">

										<a href="employee-list.php" class="btn btn-primary float-right"><i class="fa fa-group"></i> Employee List</a>
										<a href="<?php echo CORE;?>crm-functions.php?case=refresh&p=<?php echo $pageName;?>" class="btn btn-success float-right mr-3"><i class="fa fa-refresh"></i> Refresh Server</a>
									</div>

								</div>
								<div class="row">
									<div class="col-lg-7 col-md-7">
										<?php
											if(isset($_GET['ids']))
											{
												$ids = $_GET['ids'];
												$table = "pslv_employee";
												$data = "*";
												$cond = array(
													'pslv_empsno' => $ids,
													'pslv_status' => '1'
												);
												$mod = new Models();
												$gets = $mod->getSingle($table,$data,$cond);
												?>
												<div class="single-employee">
											<form class="" method="POST" action="<?php echo CORE;?>crm-functions.php?case=updateemploy&p=<?php echo $pageName;?>&ids=<?php echo $ids;?>">
												<div class="form-group row">
													<div class="col-lg-6 col-md-6">
														<label>Employee Name</label>
													<input type="text" name="empname" required value="<?php echo $gets['pslv_empname'];?>" class="form-control">
													</div>
													<div class="col-lg-6 col-md-6">
														<label>Employee ID</label>
													<input type="text" name="empid" required value="<?php echo $gets['pslv_empid'];?>" class="form-control">
													</div>
													
												</div>
												<div class="form-group row">
													<div class="col-lg-6 col-md-6">
														<label>Process</label>
														<select class="form-control" name="empro" required>
															<option value="<?php echo $gets['pslv_process'];?>" hidden><?php echo $gets['pslv_process'];?></option>
															<?php
																$table = "pslv_cateories";
																$cond = array(
																	'pslv_category' => 'process',
																	'pslv_status' => '1'
																);
																$mod = new Models();
																$proData = $mod->getAllrow($table,$cond);
																foreach($proData as $pro)
																{
																	?>
																	<option value="<?php echo $pro['pslv_catname'];?>"><?php echo $pro['pslv_catname'];?></option>
																	<?php
																}
															?>
															
														</select>
													</div>
													<div class="col-lg-6 col-md-6">
														<label>Sub Process</label>
														<select class="form-control" name="emsubpro" required>
															<option value="<?php echo $gets['pslv_subpro'];?>" hidden><?php echo $gets['pslv_subpro'];?></option>
															<?php
																$table = "pslv_cateories";
																$cond = array(
																	'pslv_category' => 'subprocess',
																	'pslv_status' => '1'
																);
																$mod = new Models();
																$proData = $mod->getAllrow($table,$cond);
																foreach($proData as $pro)
																{
																	?>
																	<option value="<?php echo $pro['pslv_catname'];?>"><?php echo $pro['pslv_catname'];?></option>
																	<?php
																}
															?>
															
														</select>
													</div>
													
												</div>
												<div class="form-group row">
													<div class="col-lg-6 col-md-6">
														<label>Post</label>
														<input type="text" name="empost" required class="form-control" value="<?php echo $gets['pslv_userpost'];?>">
													</div>
													<div class="col-lg-6 col-md-6">
														<label>Process Manager</label>
														<input type="text" name="promanager" required class="form-control" value="<?php echo $gets['pslv_prohead'];?>">
													</div>
													
												</div>
												<div class="form-group clearfix">
													<input type="submit" class="btn btn-primary float-right" value="Update & Continue" name="updoempoly">
												</div>
											</form>
										</div>
												<?php
											}
											else
											{
												?>
												<div class="single-employee">
											<form class="" method="POST" action="<?php echo CORE;?>crm-functions.php?case=addemploy&p=<?php echo $pageName;?>">
												<div class="form-group">
													<label>Employee Name</label>
													<input type="text" name="empname" required placeholder="Name..." class="form-control">
												</div>
												<div class="form-group row">
													<div class="col-lg-6 col-md-6">
														<label>Employee ID Prefix</label>
														<br>
														SIPLIND <input type="radio" name="prefix" required checked="" value="SIPLIND">
														SIPTEMP <input type="radio" name="prefix" required value="SIPTEMP">
													</div>
													<div class="col-lg-6 col-md-6">
														<label>Employee ID</label>
													<input type="number" name="empid" required placeholder="Employee ID...(Only Number)" class="form-control">
													</div>

													
												</div>
												<div class="form-group row">
													<div class="col-lg-6 col-md-6">
														<label>Process</label>
														<select class="form-control" name="empro" required>
															<option value="" hidden>Select Process</option>
															<?php
																$table = "pslv_cateories";
																$cond = array(
																	'pslv_category' => 'process',
																	'pslv_status' => '1'
																);
																$mod = new Models();
																$proData = $mod->getAllrow($table,$cond);
																foreach($proData as $pro)
																{
																	?>
																	<option value="<?php echo $pro['pslv_catname'];?>"><?php echo $pro['pslv_catname'];?></option>
																	<?php
																}
															?>
															
														</select>
													</div>
													<div class="col-lg-6 col-md-6">
														<label>Sub Process</label>
														<select class="form-control" name="emsubpro" required>
															<option value="" hidden>Select Sub Process</option>
															<?php
																$table = "pslv_cateories";
																$cond = array(
																	'pslv_category' => 'subprocess',
																	'pslv_status' => '1'
																);
																$mod = new Models();
																$proData = $mod->getAllrow($table,$cond);
																foreach($proData as $pro)
																{
																	?>
																	<option value="<?php echo $pro['pslv_catname'];?>"><?php echo $pro['pslv_catname'];?></option>
																	<?php
																}
															?>
															
														</select>
													</div>
													
												</div>
												<div class="form-group row">
													
													<div class="col-lg-12 col-md-12">
														<label>Process Manager</label>
														<input type="text" name="promanager" required class="form-control" placeholder="Process Head..">
													</div>
													
												</div>
												<div class="form-group clearfix">
													<input type="submit" class="btn btn-primary float-right" value="Save & Continue" name="addempoly">
												</div>
											</form>
										</div>
												<?php
											}
										?>
										
									</div>
									<div class="col-lg-5 col-md-5">
										<div class="add-sheet">
											<h5>Add Empolyee By Excelsheet</h5>
											<form class="" method="POST" action="<?php echo CORE;?>crm-functions.php?case=addefile&p=<?php echo "compare";?>" enctype="multipart/form-data">
												<div class="form-group">
													<input type="file" name="filename" required class="form-control">
												</div>
												<div class="form-group">
													<input type="submit" name="filesave" value="Save & Continue" class="btn btn-success">
												</div>
											</form>
										</div>
									</div>

								</div>
							</div>
							
						</div>
					</div>
				</div>
			</section>
		</div>

		
<?php
require_once('dash-footer.php');
?>