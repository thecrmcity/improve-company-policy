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
										<a href="ccrm-request.php" class="btn btn-primary"><i class="fa fa-angle-double-left"></i> Back</a>
										
									</div>
									<div class="dis-menu">
										<ul class="dis-file-icon">
											<?php
											
												$table = "pslv_ccrmdata";
												$cond = array(
													
													'pslv_status' => '1'
												);
												$splcond = " ORDER BY pslv_srno DESC";
												$rowGate = $crmod->getAllrow($table,$cond,$splcond);
												if($rowGate > 0)
												{
													foreach($rowGate as $gate)
													{
														?>
														<li class="clearfix mytet"><a href="?ids=<?php echo $gate['pslv_srno'];?>" class="float-left"><i class="fa fa-angle-double-right"></i> <?php echo $gate['pslv_ccrno'];?></a><a href="<?php echo CORE;?>crm-functions.php?case=ccrdel&ids=<?php echo $gate['pslv_srno'];?>&p=<?php echo 'ccrm-request';?>" class="float-right text-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a></li>
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
									
									<div class="box-body">
									<?php
										if(isset($_GET['ids']))
										{
											$ids = $_GET['ids'];
											$table = "pslv_ccrmdata";
											$cond = array(
												'pslv_srno' => $ids,
												'pslv_status' => '1'
											);
											$ret = $crmod->getOnerowdata($table,$cond);
											?>
											<div class="dis-file-view">
										<table border='1' style="width:100%">
			<tr>
				<th>Priority</th>
				<th>CCR Number</th>
				<th>CCR Date & Time</th>
				<th>Type of Change</th>
				
			</tr>
			
			<tr>
				<td><?php echo $ret['pslv_priority'];?></td>
				<td><?php echo $ret['pslv_ccrno'];?></td>
				<td><?php echo $ret['pslv_ccrdate'];?></td>
				<td><?php echo $ret['pslv_typeofchange'];?></td>
				

			</tr>
		</table>
		<br>
		
		<table style="width:100%" border="1">
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Location</td>
				<td><?php echo $ret['pslv_location'];?></td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Description of Change</td>
				<td><?php echo $ret['pslv_description'];?></td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Nature of Change</td>
				<td><?php echo $ret['pslv_natureofchange'];?></td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Start Date & Time</td>
				<td><?php echo $ret['pslv_startdate'];?></td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Expected Date & Time</td>
				<td><?php echo $ret['pslv_expectedate'];?></td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Information Security Impact</td>
				<td><?php echo $ret['pslv_ismsimpact'];?></td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Possible Impact Detail</td>
				<td><?php echo $ret['pslv_possibleimpact'];?></td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Security Impact Approved By</td>
				<td><?php echo $ret['pslv_ismsapprove'];?></td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Purpose for the changes</td>
				<td><?php echo $ret['pslv_purposechange'];?></td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Process Owner</td>
				<td><?php echo $ret['pslv_processowner'];?></td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Owner</td>
				<td><?php echo $ret['pslv_owner'];?></td>
			</tr>
		</table>
<br>

<table style="width:100%">
	<tr style="padding:2px 0px 2px 2px;">
		<td><?php echo $ret['pslv_fulldetails'];?></td>
	</tr>
</table>
<br>
<table style="width:100%" border="1">
	<tr style="padding:2px 0px 2px 2px;">
		<td style="font-weight:bold">Will this change cause an outage to customer/business?</td>
		<td><?php echo $ret['pslv_custmbusiness'];?></td>
	</tr>
	<tr style="padding:2px 0px 2px 2px;">
		<td style="font-weight:bold">Regression procedure (In case of failure due to changes made)</td>
		<td><?php echo $ret['pslv_regression'];?></td>
	</tr>
	<tr style="padding:2px 0px 2px 2px;">
		<td style="font-weight:bold">Required time to back out</td>
		<td><?php echo $ret['pslv_backout'];?></td>
	</tr>
	<tr style="padding:2px 0px 2px 2px;">
		<td style="font-weight:bold">Potential Impact if the change fails</td>
		<td><?php echo $ret['pslv_potenial'];?></td>
	</tr>
	<tr style="padding:2px 0px 2px 2px;">
		<td style="font-weight:bold">Proposed change conflicting with any other planned change for the same day</td>
		<td><?php echo $ret['pslv_conflicting'];?></td>
	</tr>
</table>
<br>
<hr>
<table style="width:100%">
		<tr style="text-align:center">
		<td>Silaris Informations Pvt Ltd</td>
		
	</tr>
	<tr style="text-align:center">
		<td>14/3, Naraina Industrial Area Phase-II, Naraina New Delhi-110028</td>
	</tr>	
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