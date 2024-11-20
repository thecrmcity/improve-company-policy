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
					<?php echo $pageName;
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
									<div class="small-box bg-success">
									  <div class="inner text-light">
									  	<div class="dis-icon">
									  		<h3 class="pl-3"><i class="fa fa-user-plus"></i></h3>
									  	</div>
									    
									    <p class="mt-3">User Creation</p>
									  </div>
									  <div class="icon">
									    <i class="fa fa-user-plus"></i>
									  </div>
									  <a href="<?php echo VIWS; ?>user-creation.php" class="small-box-footer">
									    Goto Link <i class="fa fa-arrow-circle-right"></i>
									  </a>
									</div>
								</div>
								
								
								<div class="col-lg-3 col-md-3">
									<div class="small-box bg-info">
									  <div class="inner text-light">
									  	<div class="dis-icon">
									  		<h3 class="pl-3"><i class="fa fa-cube"></i></h3>
									  	</div>
									    
									    <p class="mt-3">Process Creation</p>
									  </div>
									  <div class="icon">
									    <i class="fa fa-cube"></i>
									  </div>
									  <a href="<?php echo VIWS; ?>process-creation.php" class="small-box-footer">
									    Goto Link <i class="fa fa-arrow-circle-right"></i>
									  </a>
									</div>
								</div>
								<div class="col-lg-3 col-md-3">
									<div class="small-box bg-warning">
									  <div class="inner text-dark">
									  	<div class="dis-icon">
									  		<h3 class="pl-3"><i class="fa fa-cubes"></i></h3>
									  	</div>
									    
									    <p class="mt-3">Sub-Process Creation</p>
									  </div>
									  <div class="icon">
									    <i class="fa fa-cubes"></i>
									  </div>
									  <a href="<?php echo VIWS; ?>sub-process-creation.php" class="small-box-footer">
									    Goto Link <i class="fa fa-arrow-circle-right"></i>
									  </a>
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