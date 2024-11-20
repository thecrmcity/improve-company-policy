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
									<div class="postForm bg-light p-3 border shadow">
										<?php
										if(isset($_GET['id']))
										{
											$rowid = $_GET['id'];
											$table = "pslv_cateories";
											$data = array('pslv_catname');
											$cond = array(
												'pslv_category' => 'process',
												'pslv_status' => '1'
											);
											$mod = new Models();
											$row = $mod->getOnerow($table,$data,$cond);

											?>
											<form class="" method="POST" action="<?php echo CORE;?>functions.php?case=updatepro&p=<?php echo $pageName;?>&id=<?php echo $rowid;?>">
											<div class="form-group">
												<label>Recheck Process Name</label>
												<input type="text" name="fpost" required class="form-control" value="<?php echo $row['pslv_catname'];?>">
											</div>
											
											<div class="form-group">
												<input type="submit" name="savePost" value="Save" class="btn btn-primary">
											</div>
										</form>
											<?php
										}
										else
										{
											?>
											<form class="" method="POST" action="<?php echo CORE;?>functions.php?case=process&p=<?php echo $pageName;?>">
											<div class="form-group">
												<label>Enter Process Name</label>
												<input type="text" name="fprocess" required class="form-control" placeholder="Process Name...">
											</div>
											
											<div class="form-group">
												<input type="submit" name="saveProcess" value="Save" class="btn btn-primary">
											</div>
										</form>
											<?php
										}
										?>

									</div>
								</div>
								<div class="col-lg-9 col-md-9">
									<div class="box-header">
										<h3 class="box-title">User Process Details:</h3>
									</div>
									<div class="box-body">
										<div class="table-responsive datatable">
											<table id="dataSheet" class="table table-bordered table-striped datasheet">
												<thead class="bg-info">
													<tr>
														<th>S.No</th>
														<th>Process Name</th>
														
														<th>Status</th>
														<th colspan="2" class="text-center">Action</th>
														
													</tr>
												</thead>
												<tbody>
													<?php
													$num = "1";
													$table = "pslv_cateories";
													$cond = array(
														'pslv_category' => 'process',
														"pslv_status" => '1'
													);
													$mod = new Models();
													$postData = $mod->getAllrow($table,$cond);
													if($postData == "")
													{
														?>
														<tr>
															<td colspan="5" class="text-center">No Data</td>
														</tr>
														<?php
													}
													else
													{
													foreach($postData as $post)
													{

														?>

														<tr>
															<td><?php echo $num;?></td>
															
															<td><?php echo $post['pslv_catname'];?></td>
															
															<td><?php $sval = $post['pslv_status'];
															if($sval == "1")
															{
																echo "<span class='badge bg-success'>Active</span>";
															}
															?></td>
															
															<td><a href="process-creation.php?id=<?php echo $post['pslv_sno'];?>" class="badge bg-success text-light">Edit</a></td>
															<td><a href="<?php echo CORE;?>functions.php?case=delpro&id=<?php echo $post['pslv_sno'];?>&p=<?php echo $pageName;?>" class="badge bg-danger text-light" onclick="return confirm('Are you sure! you want to delete.')">Delete</a></td>
														</tr>
														<?php
														$num++;
													}

													}
													?>
												</tbody>
											</table>
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