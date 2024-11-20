

<aside class="main-sidebar">
	<section class="sidebar">
		<div class="user-panel">
			<?php
				if($uauthor == "SuperAdmin")
				{
					?>
					<a href="<?php echo VIWS;?>website-setting.php">
				<i class="fa fa-cogs"></i> <span> Website Setting <small><i class="fa fa-circle text-success"></i></small></span></a>
					<?php
				}
				else
				{
					echo '<span class="text-white"> ISMS 3.0 <small><i class="fa fa-circle text-success"></i></small></span>';
				}
			?>
			
			
			
			
		</div>
		
				
	        

					<ul class="sidebar-menu mt-4">
						<li class="header">ISMS NAVIGATION</li>
							<li class="<?php echo $page_name == "dashboard" ? 'active' : ''; ?>">
								<a href="<?php echo VIWS;?>dashboard.php">
									<i class="fa fa-dashboard"></i> <span>Dashboard</span>
								</a>
							</li>
							<?php
								if($uauthor == "SuperAdmin")
								{
									?>
									<li class="<?php echo $page_name == "silaris-pass" ? 'active' : ''; ?>">
								<a href="<?php echo VIWS;?>silaris-pass.php">
									<i class="fa fa-flag-checkered"></i> <span>Silaris Gate Pass</span>
								</a>
							</li>
							<li class="<?php echo $page_name == "ccrm-request" ? 'active' : ''; ?>">
								<a href="<?php echo VIWS;?>ccrm-request.php">
									<i class="fa fa-keyboard-o"></i> <span>CCRF Request</span>
								</a>
							</li>
							<li class="<?php echo $page_name == "email-request" ? 'active' : ''; ?>">
								<a href="<?php echo VIWS;?>email-request.php">
									<i class="fa fa-envelope"></i> <span>Email Request</span>
								</a>
							</li>
							<li class="<?php echo $page_name == "incident-management" ? 'active' : ''; ?>">
								<a href="<?php echo VIWS;?>incident-management.php">
									<i class="fa fa-database"></i> <span>Incident Management</span>
								</a>
							</li>
							<li class="<?php echo $page_name == "assets-management" ? 'active' : ''; ?>">
								<a href="<?php echo VIWS;?>assets-management.php">
									<i class="fa fa-area-chart"></i> <span>Assets Management</span>
								</a>
							</li>
							<li class="<?php echo $page_name == "website-access" ? 'active' : ''; ?>">
								<a href="<?php echo VIWS;?>website-access.php">
									<i class="fa fa-globe"></i> <span>Website Access</span>
								</a>
							</li>
							<li class="<?php echo $page_name == "wifi-access" ? 'active' : ''; ?>">
								<a href="<?php echo VIWS;?>wifi-access.php">
									<i class="fa fa-wifi"></i> <span>Wifi Access</span>
								</a>
							</li>
									<?php
								}
								else
								{
									if(($uemail == "samarth.jain@silaris.in") || ($uemail == "rajesh.bisht@silaris.in") || ($uemail == "pinaki.narendra@silaris.in"))
									{
										?>
										<li class="<?php echo $page_name == "ccrm-request" ? 'active' : ''; ?>">
											<a href="<?php echo VIWS;?>ccrm-request.php">
												<i class="fa fa-keyboard-o"></i> <span>CCRF Request</span>
											</a>
										</li>
										<?php
									}
									else
									{
									?>
									<li class="<?php echo $page_name == "silaris-pass" ? 'active' : ''; ?>">
								<a href="<?php echo VIWS;?>silaris-pass.php">
									<i class="fa fa-flag-checkered"></i> <span>Silaris Gate Pass</span>
								</a>
							</li>
							<li class="<?php echo $page_name == "email-request" ? 'active' : ''; ?>">
								<a href="<?php echo VIWS;?>email-request.php">
									<i class="fa fa-envelope"></i> <span>Email Request</span>
								</a>
							</li>
									<?php
									}
								}
							?>
							
							
				
			
		</ul>
		
	</section>
</aside>
