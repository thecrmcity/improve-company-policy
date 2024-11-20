<?php
require_once('dash-header.php');
$crmod = new Crmodels();
$build = @$_SESSION['build'];
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
									
									<div class="dis-menu">
										<ul class="dis-file-menu">
											<?php
												$table = "pslv_gatepass";
												$cond = array(
													'pslv_action' => '1',
													'pslv_building' => $build
												);
												$splcond = " ORDER BY pslv_gateid DESC";
												$rowGate = $crmod->getAllrow($table,$cond,$splcond);
												foreach($rowGate as $gate)
												{
													?>
													<li><a href="?ids=<?php echo $gate['pslv_gateid'];?>"><i class="fa fa-angle-double-right"></i> <?php echo $gate['pslv_empname'];?> <small><?php echo $gate['pslv_empid'];?></small></a></li>
													<?php
												}
											?>
										
										
									</ul>
									</div>
									
								</div>
								<div class="col-lg-9 col-md-9">
									<div class="box-header">
										<h3 class="box-title"><?php echo $pageName;?> Details:</h3>
									</div>
									<div class="box-body">
										<?php
											if(isset($_GET['ids']))
											{
												$ids = $_GET['ids'];
												$table = "pslv_gatepass";
												$cond = array(
													'pslv_gateid' => $ids,
													'pslv_action' => '1',
													'pslv_building' => $build
												);
												$rowOne = $crmod->getOnerowdata($table,$cond);
												?>
												<div class="dis-file-view">
											<table class="table text-dark table-bordered table-striped">
							
												<tbody><tr>
													<td colspan="2" class="text-center"> <?php echo $pageName;?> For <?php echo $pageName;?><br>
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
		                                        
		                                    </tbody>
		                                </table>
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

		
<?php
require_once('dash-footer.php');
?>