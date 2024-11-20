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
							
								<?php

								if($uauthor == "User")
								{
									?>
									<div class="col-lg-3 col-md-3">
									<div class="small-box bg-info">
									  <div class="inner text-light">
									  	<div class="dis-icon">
									  		<h3 class="pl-3"><i class="fa fa-envelope"></i></h3>
									  	</div>
									    
									    <p class="mt-3">Email Creation</p>
									  </div>
									  <div class="icon">
									    <i class="fa fa-envelope"></i>
									  </div>
									  <a href="<?php echo VIWS; ?>email-creation.php" class="small-box-footer">
									    Goto Link <i class="fa fa-arrow-circle-right"></i>
									  </a>
									</div>
								</div>
								<div class="col-lg-3 col-md-3">
									<div class="small-box bg-primary">
									  <div class="inner text-light">
									  	<div class="dis-icon">
									  		<h3 class="pl-3"><i class="fa fa-envelope-open"></i></h3>
									  	</div>
									    
									    <p class="mt-3">Email Access</p>
									  </div>
									  <div class="icon">
									    <i class="fa fa-envelope-open"></i>
									  </div>
									  <a href="<?php echo VIWS; ?>email-access.php" class="small-box-footer">
									    Goto Link <i class="fa fa-arrow-circle-right"></i>
									  </a>
									</div>
								</div>
								<?php
								if($uemail == "aarti.dogra@silaris.in")
									{
									?>
									<div class="col-lg-3 col-md-3">
									<div class="small-box bg-success">
									  <div class="inner text-light">
									  	<div class="dis-icon">
									  		<h3 class="pl-3"><i class="fa fa-envelope-open"></i></h3>
									  	</div>
									    
									    <p class="mt-3">Email Creation Approval</p>
									  </div>
									  <div class="icon">
									    <i class="fa fa-envelope-open"></i>
									  </div>
									  <a href="<?php echo VIWS;?>email-approval.php" class="small-box-footer">
									    Goto Link <i class="fa fa-arrow-circle-right"></i>
									  </a>
									</div>
								</div>
									<?php
									}
								}
								if($uemail == "email.support@silaris.in")
								{
									?>
									<div class="col-lg-3 col-md-3">
									<div class="small-box bg-success">
									  <div class="inner text-light">
									  	<div class="dis-icon">
									  		<h3 class="pl-3"><i class="fa fa-envelope-open"></i></h3>
									  	</div>
									    
									    <p class="mt-3">Email Creation Approval</p>
									  </div>
									  <div class="icon">
									    <i class="fa fa-envelope-open"></i>
									  </div>
									  <a href="<?php echo VIWS;?>email-approval.php" class="small-box-footer">
									    Goto Link <i class="fa fa-arrow-circle-right"></i>
									  </a>
									</div>
								</div>
								<div class="col-lg-3 col-md-3">
									<div class="small-box bg-secondary">
									  <div class="inner text-light">
									  	<div class="dis-icon">
									  		<h3 class="pl-3"><i class="fa fa-envelope-open"></i></h3>
									  	</div>
									    
									    <p class="mt-3">Email Access Approval</p>
									  </div>
									  <div class="icon">
									    <i class="fa fa-envelope-open"></i>
									  </div>
									  <a href="<?php echo VIWS;?>access-approval.php" class="small-box-footer">
									    Goto Link <i class="fa fa-arrow-circle-right"></i>
									  </a>
									</div>
								</div>
									<?php
								}
								if($uauthor == "SuperAdmin")
								{
									?>
									<div class="col-lg-3 col-md-3">
									<div class="small-box bg-warning">
									  <div class="inner text-light">
									  	<div class="dis-icon">
									  		<h3 class="pl-3"><i class="fa fa-group"></i></h3>
									  	</div>
									    
									    <p class="mt-3 text-dark">Add Employee</p>
									  </div>
									  <div class="icon">
									    <i class="fa fa-group"></i>
									  </div>
									  <a href="<?php echo VIWS; ?>add-employee.php" class="small-box-footer">
									    Goto Link <i class="fa fa-arrow-circle-right"></i>
									  </a>
									</div>
								</div>
								
								<div class="col-lg-3 col-md-3">
									<div class="small-box bg-dark">
									  <div class="inner text-light">
									  	<div class="dis-icon">
									  		<h3 class="pl-3"><i class="fa fa-object-ungroup"></i></h3>
									  	</div>
									    
									    <p class="mt-3">CCR Form</p>
									  </div>
									  <div class="icon">
									    <i class="fa fa-object-ungroup"></i>
									  </div>
									  <a href="<?php echo VIWS; ?>ccr-form.php" class="small-box-footer">
									    Goto Link <i class="fa fa-arrow-circle-right"></i>
									  </a>
									</div>
								</div>

							
								<div class="col-lg-3 col-md-3">
									<div class="small-box bg-success">
									  <div class="inner text-light">
									  	<div class="dis-icon">
									  		<h3 class="pl-3"><i class="fa fa-binoculars"></i></h3>
									  	</div>
									    
									    <p class="mt-3">ISMS Policies</p>
									  </div>
									  <div class="icon">
									    <i class="fa fa-binoculars"></i>
									  </div>
									  <a href="<?php echo VIWS; ?>isms-policies.php" class="small-box-footer">
									    Goto Link <i class="fa fa-arrow-circle-right"></i>
									  </a>
									</div>
								</div>
								<div class="col-lg-3 col-md-3">
									<div class="small-box bg-secondary">
									  <div class="inner text-light">
									  	<div class="dis-icon">
									  		<h3 class="pl-3"><i class="fa fa-newspaper-o"></i></h3>
									  	</div>
									    
									    <p class="mt-3">Incident Report</p>
									  </div>
									  <div class="icon">
									    <i class="fa fa-newspaper-o"></i>
									  </div>
									  <a href="<?php echo VIWS; ?>incident-report.php" class="small-box-footer">
									    Goto Link <i class="fa fa-arrow-circle-right"></i>
									  </a>
									</div>
								</div>
									<?php
								}
								?>
								
								

							
									
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>

		
<?php
require_once('dash-footer.php');
?>