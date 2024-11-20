<header class="main-header">
	<a href="<?php echo VIWS; ?>dashboard.php" class="logo">
		<span class="logo-mini"><b><img src="<?php echo IMG?>small.png"></span>
		<span class="logo-lg"><b><img src="<?php echo IMG?>dash-logo.png"></span>
	</a>
	<nav class="navbar navbar-static-top" role="navigation">
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Toggle navigation</span>
		</a>
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-user"></i>
							<span class="hidden-xs"><?php echo $uname;?></span>
						</a>
					<ul class="dropdown-menu">
						<li class="user-header">
							<?php
							
							$postid = $_SESSION['post'];
							$uproid = $_SESSION['process'];
							
							?>
							<p><?php echo strtoupper($postid);?>
								
								<small><?php echo "Silaris ".ucfirst($uproid)." Department" ?></small>
							</p>
						</li>
						<li class="user-footer">
							<div class="pull-left">
								<a href="<?php echo VIWS;?>profile.php" class="btn btn-default btn-flat">Profile</a>
							</div>
							<div class="pull-right">
								<a href="<?php echo VIWS;?>logout.php" class="btn btn-default btn-flat">Logout</a>
							</div>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
</header>