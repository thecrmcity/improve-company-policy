<?php
require_once('dash-header.php');
$mod = new Models();
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
										<button class="btn btn-primary" onclick="document.getElementById('quickform').style.display = 'block'"><i class="fa fa-address-card"></i> Create Pass</button>
									</div>
									<div class="dis-menu">
										<ul class="dis-file-menu">
										<li><a href="?ids=getpass8"><i class="fa fa-angle-double-right"></i> test <small>(23123)</small></a></li>
										
									</ul>
									</div>
									
								</div>
								<div class="col-lg-9 col-md-9">
									<div class="box-header">
										<h3 class="box-title"><?php echo $pageName;?> Details:</h3>
									</div>
									<div class="box-body">
										<div class="table-responsive datatable">
											
										</div>
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