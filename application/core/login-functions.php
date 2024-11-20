<?php

if(!defined("BASEURL"))
{
	require_once'./core.php';
}

date_default_timezone_set('Asia/Kolkata');
$newDate = date('Y-m-d h:i:s');
$onlyDate = date('Y-m-d');
$cont = new Controller();
$lcont = new Logincontrol();
$lmod = new Loginmod();
$mod = new Models();

if(isset($_GET['case']))
{
	$case = $_GET['case'];
	switch($case)
	{
		case "login":
		if(isset($_POST['userlogin']))
		{
			$cond = array(
				'pslv_empid' => strtoupper($_POST['fname']),
				'pslv_email' => htmlspecialchars($_POST['fname']),
				
			);
			
			$table = "pslv_user";
			$lmod->userLogin($table,$cond);
			
		}
		break;
		case "access":
		if(isset($_POST['loginAccess']))
		{
			$eid = strtolower($_GET['eid']);
			$setid = substr($eid, (strpos($eid,'@')));
			
			switch($setid)
			{
				case "@silaris.in":
				$data = array('pslv_empid','pslv_email','pslv_pass_setdate');
				$cond = array(
					'pslv_email' => $eid,
					'pslv_status' =>'1'
				);
				
				$table = "pslv_user";
				$row = $mod->getOnerow($table,$data,$cond);
				$ydate = $row['pslv_pass_setdate'];
				$ydate = strtotime($ydate);
				$cdate = time();
				$diff_date = $cdate-$ydate;

				$mat = round($diff_date/(3600*24));

				if($mat > 0)
				{
				    
				    // echo "Positive Value";
				    $fpass = htmlspecialchars($_POST['fpass']);
					$fname = $eid;
					$lcont->userLogemail($table,$fname,$fpass);
				}
				else
				{
				    // echo "Negative Value";
				    echo "<script>window.location.href='".VIWS."generate.php';alert('Password has been expired. Please set your password first.');</script>";
				}				
				
				break;
				default:
				$data = array('pslv_empid','pslv_email','pslv_pass_setdate');
				$cond = array(
					'pslv_email' => $eid,
					'pslv_status' =>'1'
				);
				
				$table = "pslv_user";
				$row = $mod->getOnerow($table,$data,$cond);
				$ydate = $row['pslv_pass_setdate'];
				$ydate = strtotime($ydate);
				$cdate = time();
				$diff_date = $cdate-$ydate;

				$mat = round($diff_date/(3600*24));

				if($mat > 0)
				{
				    
				    // echo "Positive Value";
				    $fpass = htmlspecialchars($_POST['fpass']);
					$fname = $eid;
					$lcont->userLogempid($table,$fname,$fpass);
				}
				else
				{
				    // echo "Negative Value";
				    echo "<script> window.location.href='".VIWS."generate.php';alert('Password has been expired. Please set your password first.');</script>";
				}

			} 
			
			
		}
		break;
		case "generate":
		if(isset($_POST['generatePass']))
		{
			$eid = strtolower($_GET['eid']);
			$setid = substr($eid, (strpos($eid,'@')));
			$fpass = $_POST['fpass'];
			$spass = $_POST['spass'];

			if($fpass === $spass)
			{
				switch($setid)
				{
					case "@silaris.in":
					$data = array(
						'pslv_pass' => $fpass,
						'pslv_pass_setdate' => $onlyDate
					);
					$cond = array(
						'pslv_email' => $eid,
						'pslv_status' => '1'
					);
					
					$table = "pslv_user";
					$lcont->loginPass($table,$data,$cond);
					break;
					default:
					$data = array(
						'pslv_pass' => $fpass,
						'pslv_pass_setdate' => $onlyDate
					);
					$cond = array(
						'pslv_empid' => strtoupper($eid),
						'pslv_status' => '1'
					);
					
					$table = "pslv_user";
					$lcont->loginPass($table,$data,$cond);
					
				}
				
				
			}
			else
			{
				switch($setid)
				{
					case "@silaris.in":
					echo "<script>window.location.href='".VIWS."generate.php?eid=$eid';alert('Password Not Match! Please try Again.');</script>";
					break;
					default:
					echo "<script>window.location.href='".VIWS."generate.php?eid=$eid';alert('Password Not Match! Please try Again.');</script>";
					
				}
				
			}

			
			
		}
		break;
		case "reset":
		if(isset($_POST['resetpass']))
		{
			$eid = strtolower($_POST['resetuser']);
			$setid = substr($eid, (strpos($eid,'@')));
			switch($setid)
			{
				case "@silaris.in":
				$cond = array(
					'pslv_email' => $eid,
					'pslv_status' =>'1'
				);
				$table = "pslv_user";
				$row = $mod->getOnerowdata($table,$cond);
				if($row == true)
				{
					$table = "pslv_user";
					$data = array(
						'pslv_pass' => 'Null'
					);
					$cond = array(
					'pslv_email' => $eid,
					'pslv_status' =>'1'
					);
					$row = $lmod->userReset($table,$data,$cond);
					echo "<script>window.location.href='".VIWS."login.php';alert('Password reset successfully. Please set your password first.');</script>";
				}
				else
				{
					echo "<script>window.location.href='".VIWS."login.php';alert('Server Busy Please Try After some time.');</script>";
				}
				break;
				default:
				$cond = array(
					'pslv_empid' => $eid,
					'pslv_status' =>'1'
				);
				$table = "pslv_user";
				$row = $mod->getOnerowdata($table,$cond);
				if($row == true)
				{
					$table = "pslv_user";
					$data = array(
						'pslv_pass' => 'Null'
					);
					$cond = array(
					'pslv_empid' => $eid,
					'pslv_status' =>'1'
					);
					$row = $lmod->userReset($table,$data,$cond);
					echo "<script>window.location.href='".VIWS."login.php';alert('Password reset successfully. Please set your password first.');</script>";
				}
				else
				{
					echo "<script>window.location.href='".VIWS."login.php';alert('Server Busy Please Try After some time.');</script>";
				}	
				break;
			}
		}
		break;
	}
}