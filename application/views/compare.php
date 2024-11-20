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
							<div class="row">
								<div class="col-lg-6 col-md-6">
									<h6>Recently Data</h6>
									<form class="" method="POST" action="<?php echo CORE;?>crm-functions.php?case=addcompare&p=<?php echo "add-employee";?>">
									<div class="table-responsive mactable mt-3">
										
										<table class="table table-bordered table-striped">
											<thead class="bg-info sticky-top">
												<tr>
													<td>S.No</td>
													<td>Employee ID</td>
													<td>Employee Name</td>
													<td>Process</td>
													<td>Sub Process</td>
													<td>Manager</td>
													<td><div class="custom-control custom-switch"><input type="checkbox" name="" value="" class="chk_all custom-control-input" id="switch1"><label class="custom-control-label" for="switch1"> </label> </div></td>
												</tr>
											</thead>
											<tbody>
												<?php
												$numt = 1;
												$table ="pslv_temp";
												$cond = array(
													'pslv_status' => "1",
												);
												$mod = new Models();
												$getdataRow = $mod->getAllrow($table,$cond);
												if($getdataRow == "")
												{
													?>
													<tr>
														<td colspan="7" class="text-center">No Data</td>
													</tr>
													<?php
												}
												else
												{
													foreach($getdataRow as $row)
													{
												
												
													?>
													<tr>
													<td><?php echo $numt;?></td>
													<td><?php echo $row['pslv_empid'];?></td>
													<td><?php echo $row['pslv_empname'];?></td>
													<td><?php echo $row['pslv_process'];?></td>
													<td><?php echo $row['pslv_subpro'];?></td>
													<td><?php echo $row['pslv_prohead'];?></td>
													<td><input type="checkbox" name="addcan[]" value="<?php echo $row['pslv_empid'];?>" class="chk_me"></td>
													</tr>
													<?php
													$numt++;
												}


												}

												?>
											</tbody>
										</table>
										<?php
										$mtable = "pslv_employee";
										$table = "pslv_temp";
										$data  = array(
											'pslv_employee.pslv_empname' => 'empname',
											'pslv_employee.pslv_empid' => 'empid',
											'pslv_employee.pslv_process' => 'process',
											'pslv_employee.pslv_subpro' => 'subpro',
											'pslv_employee.pslv_prohead' => 'prohead',

										);
										$joint = "pslv_employee.pslv_empid = pslv_temp.pslv_empid";
										
										$cond = array(
											'pslv_employee.pslv_status' => "1",
										);
										$mod = new Models();
										$getRow = $mod->innerJoin($mtable,$table,$data,$joint,$cond);
									
										if($getRow == "")
										{
											?>
											<input type="submit" name="savecan" class="btn btn-primary" value="Save & Continue">
											<?php
										}
										else
										{
											?>
											<input type="submit" name="candel" class="btn btn-danger" value="Delete & Continue">
											<?php
										}
									
									?>
									
									</div>
									</form>
								</div>
								<div class="col-lg-6 col-md-6">
									<h6>Exist Data</h6>
									<div class="table-responsive mactable mt-3">
										<table class="table table-bordered table-striped">
											<thead class="bg-info sticky-top">
												<tr>
													<td>S.No</td>
													<td>Employee ID</td>
													<td>Employee Name</td>
													<td>Process</td>
													<td>Sub Process</td>
													<td>Manager</td>
													
												</tr>
											</thead>
											<tbody>
												<?php
												$numt = 1;
												$mtable = "pslv_employee";
												$table = "pslv_temp";
												$data  = array(
													'pslv_employee.pslv_empname' => 'empname',
													'pslv_employee.pslv_empid' => 'empid',
													'pslv_employee.pslv_process' => 'process',
													'pslv_employee.pslv_subpro' => 'subpro',
													'pslv_employee.pslv_prohead' => 'prohead',

												);
												$joint = "pslv_employee.pslv_empid = pslv_temp.pslv_empid";
												
												$cond = array(
													'pslv_employee.pslv_status' => "1",
												);
												$mod = new Models();
												$getRow = $mod->innerJoin($mtable,$table,$data,$joint,$cond);
												
												if($getRow == "")
												{
													?>
													<tr>
														<td colspan="7" class="text-center">No Data</td>
													</tr>
													<?php
												}
												else
												{
													foreach($getRow as $row)
													{
													?>
													<tr>
													<td><?php echo $numt;?></td>
													<td><?php echo $row['empid'];?></td>
													<td><?php echo $row['empname'];?></td>
													<td><?php echo $row['process'];?></td>
													<td><?php echo $row['subpro'];?></td>
													<td><?php echo $row['prohead'];?></td>
												</tr>
													<?php
													$numt++;
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
				</div>
			</section>
		</div>

	<script type="text/javascript">
		$(document).ready(function(){
		  $(".chk_all").click(function(){
		    $(".chk_me").prop('checked', this.checked);
		  });
		  
		  
		});
	</script>	
<?php
require_once('dash-footer.php');
?>