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
											<input type="number" name="search" required class="form-control" placeholder="Find by Ticket...">
											<input type="submit" class="btn btn-primary ml-3" value="Search">
										</form>
									</div>
								</div>
								<div class="col-lg-6 col-md-6">
									<div class="clearfix">
										<button class="btn btn-primary float-right" onclick="document.getElementById('quickform').style.display = 'block'"><i class="fa fa-plus"></i> Create Incident</button>
										
									</div>
								</div>

							</div>
							<div class="table-responsive mactable mt-3">
									<table class="table table-bordered table-striped">
										<thead class="bg-info">
											<tr>
												<th>S.No</th>
												<th>Ticket_No</th>
												<th>Date_Time</th>
												<th>Issued_by</th>
												<th>Process</th>
												<th>Main_Incident</th>
												<th>Sub_Incident</th>
												<th>Details</th>	
												<th>Solution</th>
												<th>Solution_Date</th>
												<th>Solution_By</th>
												<th>Status</th>
												<th>Action</th>
												

											</tr>
										</thead>
										<tbody>
											<?php

											if(isset($_GET['search']))
											{
												$srch = $_GET['search'];
												$splcond = "AND pslv_srno LIKE '%$srch%' ORDER BY pslv_srno DESC";
											}
											else
											{
												$splcond = "ORDER BY pslv_srno DESC";
											}
											$numt = 1;
											$table = "pslv_incident";
											$cond = array(
													'pslv_status' => '1',
													
											);
											
											$rowEmail = $crmod->getAllrow($table,$cond,$splcond);
											if($rowEmail > 0)
											{
												foreach($rowEmail as $email)
												{
													?>
													<tr>
													<td><?php echo $numt;?></td>
													<td><?php echo $email['pslv_ticketno'];?></td>
													<td><?php echo $email['pslv_startdate'];?></td>
													<td><?php echo $email['pslv_issueby'];?></td>
													<td><?php echo $email['pslv_process'];?></td>
													<td><?php echo $email['pslv_maininci'];?></td>
													<td><?php echo $email['pslv_subinci'];?></td>
													<td><?php echo $email['pslv_incidetails'];?></td>
													<td><?php echo $email['pslv_solutions'];?></td>
													<td><?php echo $email['pslv_closedate'];?></td>
													<td><?php echo $email['pslv_solveby'];?></td>
													<td><?php $solut = $email['pslv_solutions'];
													if($solut != "")
													{
														?>
														
														<span class="badge badge-success">Sovled</span>
														<?php
													}
													else
													{
														?>
														<span class="badge badge-warning">Pending</span>
														<?php
													}	
														
													?></td>
													<td><?php $solut = $email['pslv_solutions'];
													if($solut == "")
													{
														?>
													<a href="incident-view.php?ids=<?php echo $email['pslv_srno'];?>" class="badge badge-success">Action</a>
														<?php
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
		<h3 class="text-center">Incident Ticket</h3>
       <form class="" method="POST" action="<?php echo CORE;?>crm-functions.php?case=creatinci&p=<?php echo $pageName;?>" enctype="multipart/form-data">
			<div class="form-group row">
        		<div class="col-lg-6 col-md-6">
        			<?php
					$table = "pslv_incident";
					$rowid = "pslv_srno";
					$mod = new Models();
					$getData = $mod->getOne($table,$rowid);
					
					if($getData > 0)
					{
						$getval = "INCI".date('Y').$getData;
					}
					else
					{
						$getval = "INCI".date('Y')."1";
					}
					
					
					?>
				<label>Ticket No</label>
        		<input type="text" name="ticketid" value="<?php echo $getval;?>" readonly class="form-control">
        		</div>
        		<div class="col-lg-6 col-md-6">
        			<label>Process Name</label>
		        		<select class="form-control" name="incipro">
		        			<option value="" hidden>Select Process</option>
		        			<?php
		        				$table = "pslv_cateories";
								$cond = array(
									'pslv_category' => 'process',
									'pslv_status' => '1'
								);
								$mod = new Models();
								$postData = $mod->getAllrow($table,$cond);
								foreach($postData as $post)
								{
									?>
									<option value="<?php echo $post['pslv_catname'];?>"><?php echo $post['pslv_catname'];?></option>
									<?php
								}
		        			?>
		        		</select>
        		</div>
        		

        		
        		
        	</div>
        	<div class="form-group row">
        		<div class="col-lg-6 col-md-6">
        			<label>Main Incident</label>
		        		<select class="form-control" name="incimain">
		        			<option value="" hidden>Select Main Incident</option>
		        			<?php
		        				$table = "pslv_cateories";
								$cond = array(
									'pslv_category' => 'maininci',
									'pslv_status' => '1'
								);
								$mod = new Models();
								$postData = $mod->getAllrow($table,$cond);
								foreach($postData as $post)
								{
									?>
									<option value="<?php echo $post['pslv_catname'];?>"><?php echo $post['pslv_catname'];?></option>
									<?php
								}
		        			?>
		        		</select>
        		</div>
        		<div class="col-lg-6 col-md-6">
        			<label>Sub Incident</label>
		        		<select class="form-control" name="incisub">
		        			<option value="" hidden>Select Sub Incident</option>
		        			<?php
		        				$table = "pslv_cateories";
								$cond = array(
									'pslv_category' => 'subinci',
									'pslv_status' => '1'
								);
								$mod = new Models();
								$postData = $mod->getAllrow($table,$cond);
								foreach($postData as $post)
								{
									?>
									<option value="<?php echo $post['pslv_catname'];?>"><?php echo $post['pslv_catname'];?></option>
									<?php
								}
		        			?>
		        		</select>
        		</div>

        		
        	</div>
        	
        	<div class="form-group">
        		<label>Issue in Details :</label>
        		<textarea class="form-control" name="incidetail"></textarea>
        	</div>
			<div class="form-group">
				<input type="submit" name="saveinci" class="btn btn-dark" value="Submit">
				<span onclick="document.getElementById('quickform').style.display='none'" class="btn btn-danger ml-2">Close</span>
			</div>
		</form>
	</div>
</div>
		
<?php
require_once('dash-footer.php');
?>