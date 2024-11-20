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
											<input type="number" name="search" required class="form-control" placeholder="Employee Id...">
											<input type="submit" class="btn btn-primary ml-3" value="Search">
										</form>
									</div>
								</div>
								<div class="col-lg-6 col-md-6">
									<div class="clearfix">
										<a href="add-employee.php" title="" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Add Employee</a>
									</div>
								</div>

							</div>
							<div class="table-responsive mactable mt-3">
									<table class="table table-bordered table-striped">
										<thead class="bg-info">
											<tr>
												<th>S.No</th>
												<th>Employee ID</th>
												<th>Employee Name</th>
												<th>Post</th>
												<th>Process</th>
												<th>Sub Process</th>
												<th>Head / Manager</th>
												<th colspan="2">Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
											if(isset($_GET['search']))
											{
												$srch = $_GET['search'];
												$splcond = "AND pslv_empid LIKE '%$srch%' ORDER BY pslv_empsno  DESC";
											}
											else
											{
												$splcond = "ORDER BY pslv_empsno  DESC";
											}
											$numt = 1;
											$table = "pslv_employee";
											$cond = array(
												'pslv_status' => '1',
												'pslv_uploadby' => $uemail
												);
											
											$rowEmail = $crmod->getAllrow($table,$cond,$splcond);
											if($rowEmail != 0)
											{
											foreach($rowEmail as $email)
											{
												?>
												<tr>
												<td><?php echo $numt;?></td>
												<td><?php echo $email['pslv_empid'];?></td>
												<td><?php echo $email['pslv_empname'];?></td>
												<td><?php echo $email['pslv_userpost'];?></td>
												<td><?php echo $email['pslv_process'];?></td>
												<td><?php echo $email['pslv_subpro'];?></td>
												<td><?php echo $email['pslv_prohead'];?></td>
												
												<td><a href="add-employee.php?ids=<?php echo $email['pslv_empsno'];?>" class="badge badge-success"><i class="fa fa-edit"></i> Edit</a></td>
												<td><a href="<?php echo CORE;?>crm-functions.php?case=delemp&p=<?php echo $pageName;?>&ids=<?php echo $email['pslv_empsno'];?>" class="badge badge-danger"><i class="fa fa-trash"></i> Delete</a></td>
												</tr>
												<?php
												$numt++;
											}
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

		
<?php
require_once('dash-footer.php');
?>