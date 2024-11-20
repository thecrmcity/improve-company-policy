<?php
require_once('dash-header.php');
$crmod = new Crmodels();
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
							<div class="row">
								<div class="col-lg-3 col-md-3">
									<div class="postForm bg-light p-3 border shadow text-center">
										<button class="btn btn-primary" onclick="document.getElementById('quickform').style.display = 'block'"><i class="fa fa-address-card"></i> Create Pass</button>
									</div>
									<div class="dis-menu">
										<ul class="dis-file-menu">
											<?php
												$table = "pslv_gatepass";
												$cond = array(
													'pslv_status' => '1',
													'pslv_actionby' => $uemail
												);
												$splcond = " ORDER BY pslv_gateid DESC";
												$rowGate = $crmod->getAllrow($table,$cond,$splcond);
												if($rowGate > 0)
												{
													foreach($rowGate as $gate)
													{
														?>
														<li><a href="?ids=<?php echo $gate['pslv_gateid'];?>"><i class="fa fa-angle-double-right"></i> <?php echo $gate['pslv_empname'];?> <small><?php echo $gate['pslv_empid'];?></small></a></li>
														<?php
													}
												}
												else
												{
													echo '<li>No Data</li>';
												}
												
											?>
										
										
									</ul>
									</div>
									
								</div>
								<div class="col-lg-9 col-md-9">
									<div class="box-header">
										<h3 class="box-title">Pass Details:</h3>
									</div>
									<div class="box-body">
										<?php
											if(isset($_GET['ids']))
											{
												$ids = $_GET['ids'];
												$table = "pslv_gatepass";
												$cond = array(
													'pslv_gateid' => $ids,
													'pslv_status' => '1',
													'pslv_actionby' => $uemail
												);
												$rowOne = $crmod->getOnerowdata($table,$cond);
												?>
												<div class="dis-file-view">
											<table class="table text-dark table-bordered table-striped">
							
												<tbody><tr>
													<td colspan="2" class="text-center"> Silaris Informations Pvt. ltd.<br>
													<small>Timing 9:30 to 18:30</small>
													</td>
												</tr>
												
												<tr>
													<td>Building Number</td><td><?php echo $rowOne['pslv_building'];?></td>

												</tr>
												<tr>
													<td>Name of Employee</td><td><?php echo $rowOne['pslv_empname'];?></td>
													
												</tr>
												<tr>
													<td>Employee ID</td><td><?php echo $rowOne['pslv_empid'];?></td>
													
												</tr>
												<tr>
													<td>Will Employee Return</td><td><?php echo $rowOne['pslv_willreturn'];?></td>
													
												</tr>
												<tr>
													<td>Process / Department</td><td><?php echo $rowOne['pslv_process'];?></td>
													
												</tr>
												<tr>
													<td>Name of Manager</td><td><?php echo $rowOne['pslv_manager'];?></td>
													
												</tr>
												
												<tr>
													<td>Reason For Going Out</td><td><?php echo $rowOne['pslv_description'];?></td>
													
												</tr>
												</tbody></table>
												<br>
												<table class="table text-dark table-bordered table-striped">
												<tbody><tr>
		                                            <td>Approved By</td><td><?php echo $rowOne['pslv_approvedby'];?></td>
		                                            
		                                        </tr>
		                                        <tr>
		                                            <td>Date | Time</td><td><?php echo $rowOne['pslv_datetime'];?></td>
		                                            
		                                        </tr>
		                                        

																		
								</tbody></table>
							</div>
												<?php
											}
										?>
									</div>
								</div>

							</div>
							
						</div>
					</div>
				</div>
			</section>
		</div>
<div class="quickform" id="quickform">
	<div class="infernalset">
		<form class="" method="POST" action="<?php echo CORE;?>crm-functions.php?case=gatepass&p=<?php echo $pageName;?>" enctype="multipart/form-data">
			<div class="form-group row">
				<div class="col-lg-6 col-md-6">
					<label>Building Number :</label>
				<select class="form-control" name="building" required="">
					<option value="" hidden>Select Building</option>
					<option value="14/1">14/1</option>
					<option value="14/2">14/2</option>
					<option value="14/3">14/3</option>
					<option value="A-6">A-6</option>
					<option value="A-7">A-7</option>
					<option value="21/24">21/24</option>
				</select>
				</div>
				<div class="col-lg-6 col-md-6">
					<label>Will Employee Return <small>(yes/no)</small> :</label>
					<select class="form-control" name="willreturn" required="">
					<option value="Yes" selected="">Yes</option>
					<option value="No">No</option>
				</select>
				</div>

				
			</div>
			<div class="form-group row">
				<div class="col-lg-6 col-md-6">
					<label>Name of Employee</label>
				<input type="text" name="empname" class="form-control" required="">
				</div>
				<div class="col-lg-6 col-md-6">
					<label>Employee ID</label>
				<input type="text" name="empid" class="form-control" required="">
				</div>

				
			</div>
			<div class="form-group row">
				<div class="col-lg-6 col-md-6">
					<label>Process / Dept.</label>
				<input type="text" name="depart" class="form-control" required="">
				</div>
				<div class="col-lg-6 col-md-6">
					<label>Name of Manager</label>
				<input type="text" name="manager" class="form-control" required="">
				</div>
				
			</div>
			<div class="form-group">
				<label>Reason for Going Out</label>
				<textarea class="form-control" name="reason" required=""></textarea>
				
			</div>
			<div class="form-group">
				<input type="submit" name="getpass" class="btn btn-dark" value="Submit">
				<button onclick="document.getElementById('quickform').style.display='none'" class="btn btn-danger ml-2">Close</button>
			</div>
		</form>
	</div>
</div>
		
<?php
require_once('dash-footer.php');
?>