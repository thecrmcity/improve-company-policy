<?php

if(!defined("BASEURL"))
{
	require_once'./core.php';
}

$fupost = $_SESSION['post'];
$fuemail = $_SESSION['uemail'];
$funame = $_SESSION['uname'];

date_default_timezone_set('Asia/Kolkata');
$newDate = date('Y-m-d h:i:s');
$onlyDate = date('Y-m-d');
$cont = new Controller();
$mod = new Models();

if(isset($_GET['case']))
{
	$case = $_GET['case'];
	switch($case)
	{
		
		
		// create functions start here.....
		
		case "post":
		if(isset($_POST['savePost']))
		{
			$table = "pslv_cateories";
			$p = $_GET['p'];
			$fpost = trim(ucwords($_POST['fpost']));
			$data = array(
				'pslv_category' => 'post',
				'pslv_catname' => $fpost,
				'pslv_status' => "1",
				'pslv_createdon' => $newDate
			);
			$cont->insertData($table,$data,$p);

		}
		break;
		case "page":
		if(isset($_POST['savePost']))
		{
			
			$p = $_GET['p'];
			$fpage = strtolower($_POST['fpost']);
			$fname = ucwords($fpage);
			$fpost = str_replace(' ','-',$fpage);
			$flink = $fpost.".php";
			$data = array('pslv_catname');
			$cond = array(
					
					'pslv_status' =>'1'
				);
			$table = "pslv_cateories";
			$getName = $mod->getOnerow($table,$data,$cond);
			if($getName['pslv_catname'] == $fname)
			{
				echo "<script>alert('Page Name Already Exist!'); window.location.href='".VIWS.$p.".php'</script>";
			}
			else
			{
				$data = array(
				'pslv_category' => 'page',
				'pslv_catname' => $fname,
				'pslv_extatext' => $flink,
				'pslv_status' => "1",
				'pslv_createdon' => $newDate
				);
				$cont->insertData($table,$data,$p);
			}
			

		}
		break;
		case "adduser":
		if(isset($_POST['saveUser']))
		{
			$table = "pslv_user";
			$p = $_GET['p'];
			$prefix = $_POST['prefix'];
			$fempid = $_POST['fempid'];
			$empid = ($prefix.$fempid);
			$data = array(
				'pslv_name' => htmlspecialchars($_POST['fname']),
				'pslv_empid' => htmlspecialchars($empid),
				'pslv_email' => htmlspecialchars($_POST['femail']),
				'pslv_pass' => 'Null',
				'pslv_manager' => htmlspecialchars($_POST['fmanager']),
				'pslv_process' => htmlspecialchars($_POST['fprocess']),
				'pslv_post' => htmlspecialchars($_POST['fpost']),
				'pslv_authority' => 'User',
				'pslv_status' => '1',
				'pslv_createdon' => $newDate,
				'pslv_createdby' => $funame,
				'pslv_byemail' => $fuemail
			);
			$cont->insertData($table,$data,$p);
		}
		
		break;
		case "process":
		if(isset($_POST['saveProcess']))
		{
			$table = "pslv_cateories";
			$p = $_GET['p'];
			$fprocess = trim(ucwords($_POST['fprocess']));
			$data = array(
				'pslv_category' => 'process',
				'pslv_catname' => $fprocess,
				'pslv_status' => "1",
				'pslv_createdon' => $newDate
			);
			$cont->insertData($table,$data,$p);

		}
		break;
		case "subprocess":
		if(isset($_POST['subProcess']))
		{
			$table = "pslv_cateories";
			$p = $_GET['p'];
			$fprocess = trim(ucwords($_POST['fprocess']));
			$data = array(
				'pslv_category' => 'subprocess',
				'pslv_catname' => $fprocess,
				'pslv_status' => "1",
				'pslv_createdon' => $newDate
			);
			$cont->insertData($table,$data,$p);

		}
		break;
		// create functions end here.....
		// update functions start here ...
		
		case "update":
		$table = "pslv_cateories";
		$p = $_GET['p'];
		$id = $_GET['id'];
		if(isset($_POST['savePost']))
		{
			$fpost = trim(ucwords($_POST['fpost']));
			$data = array(
				
				'pslv_catname' => $fpost
				
			);
			$cond = array(
				'pslv_sno' => $id
			);
			$cont->updateData($table,$data,$cond,$p);

		}
		break;
		case "updatepage":
		$table = "pslv_cateories";
		$p = $_GET['p'];
		$id = $_GET['id'];
		if(isset($_POST['savePost']))
		{
			$fpage = strtolower($_POST['fpost']);
			$fname = ucwords($fpage);
			$fpost = str_replace(' ','-',$fpage);
			$flink = $fpost.".php";
			$data = array(
				
				'pslv_catname' => $fname,
				'pslv_extatext' => $flink
				
			);
			$cond = array(
				'pslv_sno' => $id
			);
			$cont->updateData($table,$data,$cond,$p);

		}
		break;
		case "updouser":
		$table = "pslv_user";
		$p = $_GET['p'];
		$id = $_GET['id'];
		if(isset($_POST['updateUser']))
		{

			$data = array(
				
				'pslv_name' => htmlspecialchars($_POST['fname']),
				'pslv_empid' => htmlspecialchars($_POST['fempid']),
				'pslv_email' => htmlspecialchars($_POST['femail']),
				'pslv_manager' => htmlspecialchars($_POST['fmanager']),
				'pslv_process' => htmlspecialchars($_POST['fprocess']),
				'pslv_post' => htmlspecialchars($_POST['fpost']),
				
			);
			$cond = array(
				'pslv_sno' => $id
			);
			$cont->updateData($table,$data,$cond,$p);

		}
		break;
		case "updatepro":
		if(isset($_POST['savePost']))
		{
			$table = "pslv_cateories";
			$p = $_GET['p'];
			$id = $_GET['id'];
			$fprocess = trim(ucwords($_POST['fpost']));
			$data = array(
				
				'pslv_catname' => $fprocess
				
			);
			$cond = array(
				'pslv_sno' => $id
			);
			$cont->updateData($table,$data,$cond,$p);

		}
		break;
		case "updatesubpro":
		if(isset($_POST['savePost']))
		{
			$table = "pslv_cateories";
			$p = $_GET['p'];
			$id = $_GET['id'];
			$fprocess = trim(ucwords($_POST['fpost']));
			$data = array(
				
				'pslv_catname' => $fprocess
				
			);
			$cond = array(
				'pslv_sno' => $id
			);
			$cont->updateData($table,$data,$cond,$p);

		}
		break;
		case "url":
		$table = "pslv_post";
		$p = $_GET['p'];
		$pid = $_GET['pid'];

		$pageid = implode(',', $_POST['pageid']);
		$data = array(
				'pslv_pagelinks' => "$pageid"
			
			);
		$cond = array(
				'pslv_postid' => $pid,
				'pslv_status' => '1'
			);
		$cont->updateData($table,$data,$cond,$p);
		break;
		// update functions end here ....
		// delete functions statrt here ...
		case "del":
		$table = "pslv_cateories";
		$p = $_GET['p'];
		$id = $_GET['id'];
		$data = array(
				
				'pslv_sno' => $id
				
			);
		$cont->delUpdate($table,$data,$p);
		break;
		case "delpage":
		$table = "pslv_cateories";
		$p = $_GET['p'];
		$id = $_GET['id'];
		$data = array(
				
				'pslv_sno' => $id
				
			);
		$cont->delUpdate($table,$data,$p);
		break;
		case "delpro":
		$table = "pslv_cateories";
		$p = $_GET['p'];
		$id = $_GET['id'];
		$data = array(
				
				'pslv_sno' => $id
				
			);
		$cont->delUpdate($table,$data,$p);
		break;
		case "delsubpro":
		$table = "pslv_cateories";
		$p = $_GET['p'];
		$id = $_GET['id'];
		$data = array(
				
				'pslv_sno' => $id
				
			);
		$cont->delUpdate($table,$data,$p);
		break;
		case "deluser":
		$table = "pslv_user";
		$p = $_GET['p'];
		$sid = $_GET['sid'];
		$data = array(
				
				'pslv_sno' => $sid
				
			);
		$cont->delUpdate($table,$data,$p);
		break;
		case "reset":
		$table = "pslv_user";
		$p = $_GET['p'];
		$sid = $_GET['sid'];
		$data = array(
			'pslv_pass' => 'Null',
			'pslv_pass_setdate' => '0000-00-00'
		);
		$cond = array(
				
				'pslv_sno' => $sid
				
			);
		$cont->updateData($table,$data,$cond,$p);
		break;
		// delete functions end here ...
		
		
	}
}


