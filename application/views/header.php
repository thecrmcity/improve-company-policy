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
	<div class="top-stip-desktop bg-dark">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<ul class="top-strip-list">
						<li class="textnav"><i class="fa fa-envelope"></i>  Email Us : contact@khap.in</li>
						<li class="textnav" id="phoneid"><i class="fa fa-phone"></i>  Call Us : +91-9650891653</li>
					</ul>
					
					
				</div>
				<div class="col-lg-6 col-md-6">
					<span class="infor">Website Version : 3.0</span>
				</div>

			</div>
		</div>
	</div>
	<div class="top-stip-mobile bg-dark">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<ul class="top-strip-list">
						
						<li class="textnav"><i class="fa fa-phone"></i>  Call Us : +91-11-66158716</li>
					</ul>
					
					
				</div>
				

			</div>
		</div>
	</div>
	<div class="top-navmenu-desktop">
		<div class="container">
			<div class="row">
			<div class="col-lg-6 col-md-6">
				<img src="<?php  echo IMG?>ismslog-new.png"  class="img-fluid">
			</div>
			<div class="col-lg-6 col-md-6">
				<!-- <img src="<?php  echo IMG?>eleven.png"  class="img-fluid float-right"> -->
			</div>
		</div>
		</div>
	</div>
	<div class="top-navmenu-mobile">
		<div class="container">
			<div class="row">
			<div class="col-lg-12 col-md-12">
				<img src="<?php  echo IMG?>ismslog-new.png"  class="img-fluid">
			</div>
			
		</div>
		</div>
	</div>
	<div class="bottom-strip">
		<nav class="navbar navbar-expand-md mynewbg navbar-dark">
			<div class="container">
 <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fa fa-home"></i> Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fa fa-book"></i> Company Policies</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbariso" data-toggle="dropdown"><i class="fa fa-certificate"></i> Certification</a>
        <div class="dropdown-menu">
        	<?php
        		
        		$db = new Dbconnect();
        		$sql = "SELECT * FROM pslv_policyfile WHERE pslv_publish='1' AND pslv_status='1'";
        		$res = mysqli_query($db->conn,$sql);
        		while($row = mysqli_fetch_array($res))
        		{
        			?>
        			<a class="dropdown-item" href="<?php echo PUB.'uploads/'.$row['pslv_filetemp'];?>" target="_blank"><?php echo $row['pslv_filename']?></a>
        			<?php
        		}
        	?>
        	
        
       
      </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fa fa-phone"></i> Contact Us</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"><i class="fa fa-tags"></i> Important Links</a>

        <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Saarthi Training</a>
        <a class="dropdown-item" href="#">360 Feedback</a>
        <a class="dropdown-item" href="#">Admin Concern</a>
        <a class="dropdown-item" href="#">Online Feedback</a>
      </div>

      </li>
      
    </ul>
  </div>
  </div>
</nav>
	</div>