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
										<button class="btn btn-primary" onclick="document.getElementById('quickform').style.display = 'block'"><i class="fa fa-address-card"></i> Add Policy File</button>
									</div>
									<div class="dis-menu">
										<ul class="dis-file-icon">
											<?php
												$table = "pslv_policyfile";
												$cond = array(
													'pslv_status' => '1',
													'pslv_createdby' => $uemail
												);
												$splcond = " ORDER BY pslv_sno DESC";
												$rowGate = $crmod->getAllrow($table,$cond,$splcond);
												if($rowGate > 0)
												{
													foreach($rowGate as $gate)
													{
														?>
														<li><a href="?ids=<?php echo $gate['pslv_sno'];?>" class="float-left"><i class="fa fa-angle-double-right"></i> <?php echo $gate['pslv_filename'];?></a><a href="<?php echo CORE;?>crm-functions.php?case=delpolicy&ids=<?php echo $gate['pslv_sno'];?>&p=<?php echo $pageName;?>" class="float-right text-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a></li>
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
											$table = "pslv_policyfile";
											$cond = array(
												'pslv_sno' => $ids,
												'pslv_status' => '1'
											);
											$rowOne = $crmod->getOnerowdata($table,$cond);
											?>
											<div class="dis-file-view">
										<table class="table text-dark table-bordered table-striped">
											<iframe src="<?php echo PUB;?>uploads/<?php echo $rowOne['pslv_filetemp'];?>" style="width:100%;height:520px"></iframe>
											
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
<div class="quickform" id="quickform">
	<div class="infernalset">
		<form class="" method="POST" action="<?php echo CORE;?>crm-functions.php?case=policy&p=<?php echo $pageName;?>" enctype="multipart/form-data">
			<div class="form-group">
				
				<label>Policy Name</label>
				<input type="text" name="policyname" required class="form-control">
				
			</div>
			<div class="form-group">
				
				<label>Choose PDF File Only</label>
				<input type="file" name="policyfile" required class="form-control">
				
			</div>
			<div class="form-group">
				
				<label>What to Publish on Website?</label>
				<input type="checkbox" name="publish" value="1">
				
			</div>
			
			<div class="form-group">
				<input type="submit" name="policysave" class="btn btn-dark" value="Submit">
				<button onclick="document.getElementById('quickform').style.display='none'" class="btn btn-danger ml-2">Close</button>
			</div>
		</form>
	</div>
</div>
		
<?php
require_once('dash-footer.php');
?>