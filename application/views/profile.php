<?php
require_once('dash-header.php');

$fempid = $_SESSION['uempid'];
$fpro = $_SESSION['process'];
$fmanager = $_SESSION['manager'];
$fsrlno = $_SESSION['srlno'];
$fpasswrd = $_SESSION['fpass'];
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
									<div class="profile-view m-4">
										<table class="table table-striped table-bordered">
											<tr>
												<td colspan="2" class="text-center bg-info">Your Profile Summary</td>
											</tr>
											<tr>
												<td>Full Name</td>
												<td><?php echo $uname;?></td>
											</tr>
											<tr>
												<td>Email Address</td>
												<td><?php echo $uemail;?></td>
											</tr>
											<tr>
												<td>Email ID</td>
												<td><?php echo $fempid;?></td>
											</tr>
											<tr>
												<td>Manager</td>
												<td><?php echo $fmanager;?></td>
											</tr>
											<tr>
												<th>Password</th>
												<th><?php echo $fpasswrd;?></th>
											</tr>
										</table>
									</div>
								</div>
								<div class="col-lg-6 col-md-6">
									<div class="change-pass m-4 p-3">
										<form class="" method="POST" action="<?php echo CORE;?>crm-functions.php?case=changepass&p=<?php echo $pageName;?>">
											<div class="form-group">
												<label>New Password</label>
												<input type="password" name="fpass" class="form-control" required>
											</div>
											<div class="form-group">
												<label>Confirm Password</label>
												<input type="password" name="cpass" class="form-control" required>

												<input type="hidden" name="employ" value="<?php echo $fsrlno;?>">
											</div>
											<div class="form-group">
												<input type="submit" name="changepass" class="btn btn-primary" value="Change Password">
											</div>
										</form>
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