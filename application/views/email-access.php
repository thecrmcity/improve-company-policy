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
								<div class="col-lg-6 col-md-6">
									<div class="form-strip">
										<form class="form-inline" method="GET" action="">
											<input type="number" name="search" required class="form-control" placeholder="Find by Ticket ID...">
											<input type="submit" class="btn btn-primary ml-3" value="Search">
										</form>
									</div>
								</div>
								<div class="col-lg-6 col-md-6">
									<div class="clearfix">
										<button class="btn btn-primary float-right" onclick="document.getElementById('quickform').style.display = 'block'"><i class="fa fa-envelope"></i> Email Access</button>
									</div>
								</div>

							</div>
							<div class="table-responsive mactable mt-3">
									<table class="table table-bordered table-striped">
										<thead class="bg-info">
											<tr>
												<th>S.No</th>
												<th>Ticket_ID</th>
												<th>Creation_Date</th>
												<th>Employee_ID</th>
												<th>Employee_Name</th>
												<th>Designation</th>	
												<th>Department</th>
												<th>Reporting_to</th>
												<th>Emails_For_Access</th>
												<th>Email_Support</th>
												<th>Already_Emails_Access</th>
												<th>ISMS_Dept.</th>
												<th>ISMS_Comment</th>
												<th>CEO</th>
												<th>Email_Support</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											<?php
											if(isset($_GET['search']))
											{
												$srch = $_GET['search'];
												$splcond = "AND pslv_ticketid LIKE '%$srch%' ORDER BY pslv_sno DESC";
											}
											else
											{
												$splcond = "ORDER BY pslv_sno DESC";
											}
											$numt = 1;
											$table = "pslv_emailrequest";
											$cond = array(
												'pslv_request' => 'Access',
												'pslv_status' => '1',
												'pslv_createdemail' => $uemail
												);
											
											$rowEmail = $crmod->getAllrow($table,$cond,$splcond);
											if($rowEmail > 0)
											{
											foreach($rowEmail as $email)
											{
												?>
												<tr>
												<td><?php echo $numt;?></td>
												<td><?php echo $email['pslv_ticketid'];?></td>
												<td><?php echo $email['pslv_createdon'];?></td>
												<td><?php echo $email['pslv_empid'];?></td>
												<td><?php echo $email['pslv_empname'];?></td>
												<td><?php echo $email['pslv_desigantion'];?></td>
												<td><?php echo $email['pslv_process'];?></td>
												<td><?php echo $email['pslv_reportingto'];?></td>
												<td><?php echo html_entity_decode($email['pslv_oprationids']);?>
													<?php echo html_entity_decode($email['pslv_itismsids']);?>
													<?php echo html_entity_decode($email['pslv_adminids']);?>
													<?php echo html_entity_decode($email['pslv_trainerids']);?>
													<?php echo html_entity_decode($email['pslv_externalids']);?>
												</td>
												<td><?php $support = $email['pslv_support'];
													switch($support)
													{
														case "0":
														echo "<span class='badge badge-warning'>Progress</span>";
														break;
														case "1":
														echo "<span class='badge badge-danger'>Reject</span>";
														break;
														default:
														echo "<span class='badge badge-success'>Success</span>";
														break;
													}
													
												?></td>
												<td></td>
												<td><?php $isms = $email['pslv_isms'];
													switch($isms)
													{
														case "0":
														echo "<span class='badge badge-warning'>Progress</span>";
														break;
														case "1":
														echo "<span class='badge badge-danger'>Reject</span>";
														break;
														default:
														echo "<span class='badge badge-success'>Success</span>";
														break;
													}
												?></td>
												<td></td>
												<td><?php $ceo = $email['pslv_ceo'];
													switch($ceo)
													{
														case "0":
														echo "<span class='badge badge-warning'>Progress</span>";
														break;
														case "1":
														echo "<span class='badge badge-danger'>Reject</span>";
														break;
														default:
														echo "<span class='badge badge-success'>Success</span>";
														break;
													}
												?></td>
												<td><?php $suppsecond = $email['pslv_suppsecond'];
													switch($suppsecond)
													{
														case "0":
														echo "<span class='badge badge-warning'>Progress</span>";
														break;
														case "1":
														echo "<span class='badge badge-danger'>Reject</span>";
														break;
														default:
														echo "<span class='badge badge-success'>Success</span>";
														break;
													}
												?></td>
												<td><?php $action = $email['pslv_action'];
													switch($action)
													{
														case "0":
														echo "<span class='badge badge-warning'>Progress</span>";
														break;
														case "1":
														echo "<span class='badge badge-danger'>Reject</span>";
														break;
														default:
														echo "<span class='badge badge-success'>Success</span>";
														break;
													}
												?></td>
												</tr>
												<?php
												$numt++;
											}
										}
										else
										{
											?>
											<tr>
												<td colspan="13" class="text-center">No Data</td>
											</tr>
											<?php
										}
											?>
										
										</tbody>
									</table>
							</div>
							
						</div>
					</div>
				</div>
			</section>
		</div>
<div class="quickform" id="quickform">
	<div class="infernalset">
		<form class="" method="POST" action="<?php echo CORE;?>crm-functions.php?case=emailaccess&p=<?php echo $pageName;?>&mid=emailAccess" enctype="multipart/form-data">
			
			<div class="form-group row">
				<div class="col-lg-4 col-md-4">
					<label>Name of Employee</label>
				<input type="text" name="empname" class="form-control" required="">
				</div>
				<div class="col-lg-4 col-md-4">
					SIPLIND <input type="radio" name="idprefix" value="SIPLIND" checked="">
					SIPLTEM <input type="radio" name="idprefix" value="SIPLTEM">
				<input type="number" name="empid" class="form-control" required="">
				</div>
				<div class="col-lg-4 col-md-4">
					<label>Email Address</label>
				<input type="email" name="empemail" class="form-control" required="">
				</div>
			
			</div>
			<div class="form-group row">
				<div class="col-lg-4 col-md-4">
					<label>Process / Dept.</label>
				<input type="text" name="depart" class="form-control" required="">
				</div>
				<div class="col-lg-4 col-md-4">
					<label>Designation</label>
				<input type="text" name="design" class="form-control" required="">
				</div>
				<div class="col-lg-4 col-md-4">
					<label>Name of Manager</label>
				<input type="text" name="manager" class="form-control" required="">
				</div>
				
			</div>
			<h4>Enter Send / Recieve Email Access</h4>
			<div class="form-group row">
				
				
				<div class="col-lg-6 col-md-6">
				<label>Operation ID <small class="text-danger">Separate with Comma (,)</small></label>
				<textarea class="form-control" name="oprationids" placeholder="Emails"></textarea>
				</div>
				<div class="col-lg-6 col-md-6">
				<label>IT / ISMS ID <small class="text-danger">Separate with Comma (,)</small></label>
				<textarea class="form-control" name="itismsids" placeholder="Emails"></textarea>
				</div>
			</div>
			<div class="form-group row">
				
				
				<div class="col-lg-6 col-md-6">
				<label>Admin ID / HR <small class="text-danger">Separate with Comma (,)</small></label>
				<textarea class="form-control" name="hradminids" placeholder="Emails"></textarea>
				</div>
				<div class="col-lg-6 col-md-6">
				<label>Trainer / Quality Dept. <small class="text-danger">Separate with Comma (,)</small></label>
				<textarea class="form-control" name="trainerids" placeholder="Emails"></textarea>
				</div>
			</div>
			<div class="form-group row">
				
				<div class="col-lg-12 col-md-12">
				<label>External Domain (If any) <small class="text-danger">Separate with Comma (,)</small></label>
				<textarea class="form-control" name="externalsids" placeholder="Emails"></textarea>
				</div>
			</div>
			
			<div class="form-group">
				<input type="submit" name="emailaccess" class="btn btn-dark" value="Submit">
				<button onclick="document.getElementById('quickform').style.display='none'" class="btn btn-danger ml-2">Close</button>
			</div>
		</form>
	</div>
</div>
		
<?php
require_once('dash-footer.php');
?>