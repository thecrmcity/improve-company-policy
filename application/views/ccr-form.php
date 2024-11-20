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
							<form class="" method="POST" action="<?php echo CORE;?>crm-functions.php?case=ccrm&p=<?php echo $pageName;?>&mid=ccrEmail">
								<div class="table-responsive">
								<table class="table custometh table-bordered table-striped">
									<tbody>
										<tr>
										<th>CCRM Number</th>
										<?php
										$table = "pslv_ccrmdata";
										$rowid = "pslv_srno";
										$mod = new Models();
										$getData = $mod->getOne($table,$rowid);
										
										if($getData > 0)
										{
											$getval = "CCR".date('Y').$getData;
										}
										else
										{
											$getval = "CCR".date('Y')."1";
										}
										
										
										?>
									<td><?php echo $getval;?><input type="hidden" name="ccrmno" value="<?php echo $getval;?>"></td>
																	
										<th>CCRM Raised Date</th>
										<td><input type="datetime-local" name="raisedate" required="" class="inputap"></td>
										<th>Type of Change</th>
										<td><select class="inputap" name="typechange">
											<option value="" disabled="" selected="">Select Type</option>
											<option value="Installation">Installation</option>
											<option value="Upgrade">Upgrade</option>
											<option value="Maintenance">Maintenance</option>
											<option value="Replacement">Replacement</option>
											<option value="Movement">Movement</option>
										</select></td>
										
									</tr>
									<tr>
										<th>Location</th>
										<td><input type="text" name="location" required="" class="inputap"></td>
										<th>Description of change</th>
										<td><input type="text" name="descripchange" required="" class="inputap"></td>
										<th>Nature of Change</th>
										<td><select class="inputap" name="nature">
											<option value="" disabled="" selected="">Select Nature</option>
											<option value="Normal">Normal</option>
											<option value="Emergency">Emergency</option>
											
										</select>
										</td>
									</tr>
									<tr>
										
										<th>Start Date|Time</th>
										<td><input type="datetime-local" name="startdate" required="" class="inputap"></td>
										<th>Expected Date|Time</th>
										<td><input type="datetime-local" name="expectdate" required="" class="inputap"></td>
										<th>Priority</th>
										<td><input type="text" name="priority" required="" class="inputap"></td>
										
									</tr>
									<tr>
										<th>Information Security Impact</th>
										<td><input type="text" name="ismsimpact" required="" class="inputap"></td>
										<th>Possible Impact Details</th>
										<td><input type="text" name="possiblmpact" required="" class="inputap"></td>
										<th>Security Impact Approved By</th>
										<td>
											<select class="inputap" name="approveby">
											<option value="" disabled="" selected="">Approved By</option>
											<option value="samarth.jain@silaris.in">Samarth Jain</option>
											<option value="pinaki.narendra@silaris.in">Pinaki Narendra</option>
											<option value="isms@silaris.in">Tanay Dobhal</option>
											
										</select>

										</td>
										
									</tr>
									<tr>
										<th>Purpose for the Changes</th>
										<td><input type="text" name="purpose" required="" class="inputap"></td>
										<th>Process Owner</th>
										<td><input type="text" name="process" required="" class="inputap"></td>
										<th>Owner</th>
										<td><input type="text" name="owner" required="" class="inputap"></td>
									</tr>
									<tr>
										<td colspan="6">
									<textarea name="message" class="form-control" required placeholder="Details..."></textarea></td>
									</tr>
									<tr>
										<th colspan="4">Will this change cause an outage to customer/business?</th>
										<td colspan="2"><input type="text" name="willchange" required="" class="inputap"></td>
										
									</tr>
									<tr>
										
										<th colspan="4">Regression procedure (In case of failure due to changes made)</th>
										<td colspan="2"><input type="text" name="regression" required="" class="inputap"></td>
										
									</tr>
									<tr>
										
										<th colspan="4">Required time to back out</th>
										<td colspan="2"><input type="text" name="backout" required="" class="inputap"></td>
										
										
									</tr>
									<tr>
											
										<th colspan="4">Potential Impact if the change fails</th>
										<td colspan="2"><input type="text" name="changefails" required="" class="inputap"></td>
										
									</tr>
									<tr>
											
										<th colspan="4">Proposed change conflicting with any other planned change for the same day</th>
										<td colspan="2"><input type="text" name="conflicting" required="" class="inputap"></td>
										
									</tr>
									<tr>
											
										<th colspan="6">Informed all the team members about the change :</th>
										
									</tr>
									<tr>
										<td><input type="checkbox" name="pinaki" value="pinaki.narendra@silaris.in"> Pinaki Narendra</td>
										<td><input type="checkbox" name="samarth" value="samarth.jain@silaris.in" class=""> Samarth Jain</td>
										
										<td><input type="checkbox" name="rajesh" value="rajesh.bisht@silaris.in"> Rajesh Bisht</td>
										<td><input type="checkbox" name="isms" value="dilip.kumar@silaris.in"> Tanay Dobhal</td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td colspan="4"></td>
										<td>
											<input type="reset" class="resetbtn">
										</td>
										<td>
											<input type="submit" name="datasave" class="sbsave">
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