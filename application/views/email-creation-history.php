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
							
							<?php
								if(isset($_GET['setid']))
								{
									$setid = $_GET['setid'];
									?>
									<div class="response-form">
										<form class="" method="POST" action="<?php echo CORE;?>crm-functions.php?case=emailapprovalisms&p=<?php echo $pageName;?>">
											<div class="form-group">
												<input type="hidden" name="setid" value="<?php echo $setid;?>">
												<label>Comment</label>
												<textarea class="form-control" name="comment" placeholder="details..."></textarea>
											</div>
											<div class="form-group">
												<input type="submit" name="approve" class="btn btn-primary" value="Approve">
												<input type="submit" name="rejected" class="btn btn-danger ml-2" value="Reject">
											</div>
										</form>
									</div>
									
									<?php
								}
								else
								{
									?>
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
												<th>Process</th>
												<th>Reporting_to</th>
												<th>Suggested_Email</th>
												<th>HR_Dept.</th>
												<th>ISMS_Dept.</th>
												<th>Email Support</th>
												
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
												
												'pslv_request' => 'Creation',
												'pslv_status' => '1'
												
												);
											$notin = array(
												'pslv_hrdepart' => '0',
											);
											
											$rowEmail = $crmod->getAllnot($table,$cond,$notin,$splcond);
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
												<td><?php echo $email['pslv_suggested'];?></td>
												<td><?php $hrdepart = $email['pslv_hrdepart'];
													switch($hrdepart)
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
												
												
												</tr>
												<?php
												$numt++;
											}
										}
											?>
										</tbody>
									</table>
							</div>
							<?php
						}
							?>
						</div>
					</div>
				</div>
			</section>
		</div>

	
<?php
require_once('dash-footer.php');
?>