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
											<input type="number" name="search" required class="form-control" placeholder="Find by CCR No...">
											<input type="submit" class="btn btn-primary ml-3" value="Search">
										</form>
									</div>
								</div>
								<div class="col-lg-6 col-md-6">
									<div class="clearfix">
										
										<a href="<?php echo VIWS?>ccr-form.php" class="btn btn-primary float-right"><i class="fa fa-plus"></i> CCR Form</a>
									</div>
								</div>

							</div>
							<div class="table-responsive mactable mt-3">
									<table class="table table-bordered table-striped">
										<thead class="bg-info">
											<tr>
												<th>S.No</th>
												<?php
												if(($uemail == "samarth.jain@silaris.in") || ($uemail == "rajesh.bisht@silaris.in") || ($uemail == "pinaki.narendra@silaris.in") || ($uemail == "dilip.kumar@silaris.in"))
												{
													?>
													<th>View</th>
													<?php
												}
												?>
												<th>CCR_Number</th>
												<th>CC_Date_Time</th>
												<th>Type_of_Change</th>
												<th>Location</th>
												<th>Description</th>
												<th>Nature_of_Change</th>	
												<th>Start_Datetime</th>
												<th>Expected_Datetime</th>
												<th>Priority</th>
												<th>ISMS_Impact</th>
												<th>Possible_Impact</th>
												<th>Approved_By</th>
												<th>Pupose_for_Change</th>
												<th>Owner</th>
												<th>CIO</th>
												<th>IT_VP</th>
												<th>IT_GM</th>
												<th>ISMS</th>
												
												<th colspan="2">Action</th>
												<th><i class="fa fa-download"></i></th>
											</tr>
										</thead>
										<tbody>
											<?php

											if(isset($_GET['search']))
											{
												$srch = $_GET['search'];
												$splcond = "AND pslv_ccrno LIKE '%$srch%' ORDER BY pslv_ccrno DESC";
											}
											else
											{
												$splcond = "ORDER BY pslv_ccrno DESC";
											}

											$numt = 1;
											$table = "pslv_ccrmdata";
											$cond = array(

													'pslv_createdby' => $uemail,
													'pslv_status' => '1'
													
											);
											
											$rowEmail = $crmod->getAllrow($table,$cond,$splcond);
											if($rowEmail > 0)
											{
												foreach($rowEmail as $email)
												{
													?>
													<tr>
													<td><?php echo $numt;?></td>
													<td><a href="ccrm-view.php?ids=<?php echo $email['pslv_srno']?>"><i class="fa fa-eye"></i></a></td>
													<td>PASS<?php echo $email['pslv_ccrno'];?></td>
													<td><?php echo $email['pslv_ccrdate'];?></td>
													<td><?php echo $email['pslv_typeofchange'];?></td>
													<td><?php echo $email['pslv_location'];?></td>
													<td><?php echo $email['pslv_description'];?></td>
													<td><?php echo $email['pslv_natureofchange'];?></td>
													<td><?php echo $email['pslv_startdate'];?></td>
													<td><?php echo $email['pslv_expectedate'];?></td>
													<td><?php echo $email['pslv_priority'];?></td>
													<td><?php echo $email['pslv_ismsimpact'];?></td>
													<td><?php echo $email['pslv_purposechange'];?></td>
													<td><?php echo $email['pslv_processowner'];?></td>
													<td><?php echo $email['pslv_owner'];?></td>
													<td><?php echo $email['pslv_fulldetails'];?></td>
													<td><?php 
													if($email['pslv_ciochar'] != "")
													{
														$cioint = $email['pslv_cioint'];
														switch($cioint)
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
													}
													else
													{
														echo "";
													}
													?></td>
													<td><?php 
													if($email['pslv_itvpchar'] != "")
													{
														$itvpint = $email['pslv_itvpint'];
														switch($itvpint)
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
													}
													else
													{
														echo "";
													}
													?></td>
													<td><?php
													if($email['pslv_itgmchar'] != "")
													{
														$itgmint = $email['pslv_itgmint'];
														switch($itgmint)
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
													}
													else
													{
														echo "";
													}
													?></td>
													<td><?php 
													if($email['pslv_ismschar'] != "")
													{
														$ismsint = $email['pslv_ismsint'];
														switch($ismsint)
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
													}
													else
													{
														echo "";
													}
													?></td>
													
													

														<?php
						if((($uemail == $email['pslv_ciochar']) && ($email['pslv_cioint'] == "0")) || (($uemail == $email['pslv_itvpchar']) && ($email['pslv_itvpint'] == "0")) || (($uemail == $email['pslv_itgmchar']) && ($email['pslv_itgmint'] == "0")) || (($uemail == $email['pslv_ismschar']) && ($email['pslv_ismsint'] == "0")))
									{
										?>
										<td><a href="<?php echo CORE;?>crm-functions.php?case=ccraprve&p=<?php echo $pageName;?>&ids=<?php echo $email['pslv_srno'];?>&emet=<?php echo $uemail;?>" class="badge badge-info px-3"><i class="fa fa-check" title="Approve"></i></a></td>
										<?php
									}
									else
									{
										?>
										<td></td>
										<?php
									}
														?>
														<td>
					<a href="<?php echo CORE;?>crm-functions.php?case=ccrdel&p=<?php echo $pageName;?>&ids=<?php echo $email['pslv_srno'];?>" class="badge badge-danger"><i class="fa fa-trash"></i></a></td>
													
													<td><a href="<?php echo CORE;?>crm-functions.php?case=ccrdwnld&p=<?php echo $pageName;?>&ids=<?php echo $email['pslv_srno'];?>" class="badge badge-primary"><i class="fa fa-download"></i></a></td>
													</tr>
													<?php
													$numt++;
												}
											}
											else
											{
												?>
												<tr>
													<td colspan="14" style="text-align: center;">No Data</td>
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
		<form class="" method="POST" action="<?php echo CORE;?>crm-functions.php?case=emailcreate&p=<?php echo $pageName;?>" enctype="multipart/form-data">
			
			<div class="form-group row">
				<div class="col-lg-6 col-md-6">
					<label>Name of Employee</label>
				<input type="text" name="empname" class="form-control" required="">
				</div>
				<div class="col-lg-6 col-md-6">
					SIPLIND <input type="radio" name="idprefix" value="SIPLIND" checked="">
					SIPLTEM <input type="radio" name="idprefix" value="SIPLTEM">
				<input type="number" name="empid" class="form-control" required="">
				</div>

				
			</div>
			<div class="form-group row">
				<div class="col-lg-6 col-md-6">
					<label>Process / Dept.</label>
				<input type="text" name="depart" class="form-control" required="">
				</div>
				<div class="col-lg-6 col-md-6">
					<label>Designation</label>
				<input type="text" name="design" class="form-control" required="">
				</div>
				
			</div>
			<div class="form-group row">
				
				<div class="col-lg-6 col-md-6">
					<label>Name of Manager</label>
				<input type="text" name="manager" class="form-control" required="">
				</div>
				<div class="col-lg-6 col-md-6">
					<label>Enter Email ID ( Which need to create)</label>
				<input type="email" name="suggested" class="form-control" required="">
				<small class="text-danger">If required generic email id then first consult with ISMS Officer</small>
				</div>
				
			</div>
			
			<div class="form-group">
				<input type="submit" name="emailcreat" class="btn btn-dark" value="Submit">
				<button onclick="document.getElementById('quickform').style.display='none'" class="btn btn-danger ml-2">Close</button>
			</div>
		</form>
	</div>
</div>
		
<?php
require_once('dash-footer.php');
?>