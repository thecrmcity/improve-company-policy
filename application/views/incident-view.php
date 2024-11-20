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
						<form class="" method="POST" action="<?php echo CORE;?>crm-functions.php?case=solveinci&p=<?php echo "incident-report";?>&ids=<?php echo $_GET['ids']?>">
								<div class="table-responsive">
								<table class="table custometh table-bordered table-striped">
									<tbody>
										<?php
										if(isset($_GET['ids']))
										{
											$ids = $_GET['ids'];
											$table = "pslv_incident";
											$cond = array(
												'pslv_srno'=> $ids
											);
											$mod = new Models();
											$getData = $mod->getOnerowdata($table,$cond);
										}
										
										
										
										?>
										<tr>
										<th>Incident Number</th>

									<td><?php echo $getData['pslv_ticketno'];?></td>
																	
										<th>Issued BY</th>
										<td><?php echo $getData['pslv_issueby'];?></td>
										<th>Process</th>
										<td><?php echo $getData['pslv_process'];?></td>
										
									</tr>
									<tr>
										<th>Main Incident</th>
										<td><?php echo $getData['pslv_maininci'];?></td>
										<th>Sub Incident</th>
										<td><?php echo $getData['pslv_subinci'];?></td>
										<th>Incident Date_Time</th>
										<td><?php echo $getData['pslv_startdate'];?></td>
									</tr>
									<tr>
										<th>Incident Details :</th>
										<td colspan="5"><?php echo $getData['pslv_incidetails'];?></td>
									</tr>
									
									<tr>
									<td colspan="6">
									<textarea name="message" class="form-control" required placeholder="Details..."></textarea></td>
									</tr>
									
									<tr>
										<td colspan="4"></td>
										<td>
											
										</td>
										<td>
											<input type="submit" name="saveinci" class="sbsave">
										</td>
										
										
									</tr>
								</tbody>
							</table>
							</div>
							</form>
							
						</div>
					</div>
				</div>
			</section>
		</div>

		
<?php
require_once('dash-footer.php');
?>