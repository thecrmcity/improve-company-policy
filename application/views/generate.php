<?php
require_once'../core/core.php';

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo TITLE;?></title>
	<?php $obj->getHeader();?>
</head>
<body>

<div class="isms-login">
	<div class="overlay">
		<div class="container">
			<div class="isms-version">
				<div class="row">
					<div class="col-lg-6 col-md-6">
					<p>Website Version : 2.0</p>
				</div>
				<div class="col-lg-6 col-md-6">
					<p>Silaris Informations Pvt Ltd &copy; <?php echo date('Y');?> <a href="<?php echo VIWS?>index.php" class="btnback"><i class="fa fa-arrow-left"></i> Back</a></p>
				</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<div class="login-img">
						<img src="<?php  echo IMG?>login-img.png"  class="img-fluid">
						<h2>ISMS <span> SECURITY</span></h2>
						<em>Information security management system defines and manages controls that an organization needs to implement to ensure that it is sensibly protecting the confidentiality, availability, and integrity of assets from threats and vulnerabilities.</em>
					</div>
				</div>
				<div class="col-lg-6 col-md-6">
					<div class="login-set">
						<h3 class="text-center">ISMS Login</h3>
						
						<form class="" method="POST" action="<?php echo CORE;?>login-functions.php?case=generate&eid=<?php echo $_GET['eid']?>">
							<div class="form-group">
								<label>Your Password</label>

								<div class="input-group">
									<div class="input-group-prepend">
								      <span class="input-group-text"><i class="fa fa-lock"></i></span>
								    </div>
								    <input type="password" class="form-control inputcolor" name="fpass" placeholder="Password.." required>
								</div>
							</div>
							<div class="form-group">
								<label>Confirm Password</label>

								<div class="input-group">
									<div class="input-group-prepend">
								      <span class="input-group-text"><i class="fa fa-lock"></i></span>
								    </div>
								    <input type="password" class="form-control inputcolor" name="spass" placeholder="Confirm Password.." required>
								</div>
							</div>

							<div class="form-group">
								
								<input type="submit" class="btn btn-danger mt-3 px-5" value="Login" name="generatePass">
								
							</div>
							
						</form>
						<p>ISMS <small>Dept. of information security </small>&copy; <?php echo date('Y');?> <a href="<?php echo VIWS?>reset-password.php" class="forget">Reset Password</a></p>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	
</div>
<?php $obj->getFooter();?>
</body>
</html>