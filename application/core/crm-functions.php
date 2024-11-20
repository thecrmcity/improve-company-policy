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
$crmod = new Crmodels();

if(isset($_GET['case']))
{
	$case = $_GET['case'];
	switch($case)
	{
		case "gatepass":
		if(isset($_POST['getpass']))
		{
			$p = $_GET['p'];
			$building = $_POST['building'];
			$willreturn = $_POST['willreturn'];
			$empname = $_POST['empname'];
			$empid = strtoupper($_POST['empid']);
			$depart = $_POST['depart'];
			$manager = $_POST['manager'];
			$reason = $_POST['reason'];

			$table = "pslv_gatepass";
			$data = array(
				'pslv_cdate' => $onlyDate,
				'pslv_empname' => $empname,
				'pslv_empid' => $empid,
				'pslv_building' => $building,
				'pslv_willreturn' => $willreturn,
				'pslv_process' => $depart,
				'pslv_manager' => $manager,
				'pslv_approvedby' => $funame,
				'pslv_datetime' => $newDate,
				'pslv_description'=> $reason,
				'pslv_status' => '1',
				'pslv_actionby' => $fuemail,
			);
			$cont->insertData($table,$data,$p);

		}
		break;
		case "emailcreate":
		if(isset($_POST['emailcreat']))
		{
			$p = $_GET['p'];
			$mid = $_GET['mid'];
			$empname = $_POST['empname'];
			$idprefix = $_POST['idprefix'];
			$empid = $_POST['empid'];
			$depart = $_POST['depart'];
			$design = $_POST['design'];
			$manager =  $_POST['manager'];
			$suggested = strtolower($_POST['suggested']);

			$table = "pslv_emailrequest";
			$rowid = "pslv_sno";
			$matid = $mod->getOne($table,$rowid);
			$ticketid = "EMAIL".date('Y').$matid;
			$data = array(
				'pslv_ticketid' => $ticketid,
				'pslv_request' => "Creation",
				'pslv_empname' => $empname,
				'pslv_empid' => $idprefix.$empid,
				'pslv_process' => $depart,
				'pslv_desigantion' => $design,
				'pslv_suggested' => $suggested,
				'pslv_reportingto' => $manager,
				'pslv_status' => '1',
				'pslv_createdby' => $funame,
				'pslv_createdemail' => $fuemail,
				'pslv_createdon' => $newDate
			);
			require_once 'email-functions.php';
			$cont->insertData($table,$data,$p);
			
		}
		break;
		case "emailaccess":
		if(isset($_POST['emailaccess']))
		{
			$p = $_GET['p'];
			$mid = $_GET['mid'];
			$empname = $_POST['empname'];
			$idprefix = $_POST['idprefix'];
			$empid = $_POST['empid'];
			$depart = $_POST['depart'];
			$design = $_POST['design'];
			$manager =  $_POST['manager'];


			$oprationids = $_POST['oprationids'];
			$opratids = $crmod->filterEmails($oprationids);

			$crmod = new Crmodels();
			$itismsids = $_POST['itismsids'];
			$itismsids = $crmod->filterEmails($itismsids);

			$crmod = new Crmodels();
			$hradminids = $_POST['hradminids'];
			$adminids = $crmod->filterEmails($hradminids);

			$crmod = new Crmodels();
			$trainerids = $_POST['trainerids'];
			$tainerids = $crmod->filterEmails($trainerids);

			$crmod = new Crmodels();
			$externalsids = $_POST['externalsids'];
			$externalids = $crmod->filterEmails($externalsids);

			$table = "pslv_emailrequest";
			$rowid = "pslv_sno";
			$matid = $mod->getOne($table,$rowid);
			$ticketid = "EMAIL".date('Y').$matid;
			$data = array(
				'pslv_ticketid' => $ticketid,
				'pslv_request' => "Access",
				'pslv_empname' => $empname,
				'pslv_empid' => $idprefix.$empid,
				'pslv_process' => $depart,
				'pslv_desigantion' => $design,
				'pslv_reportingto' => $manager,
				'pslv_status' => '1',
				'pslv_createdby' => $funame,
				'pslv_createdemail' => $fuemail,
				'pslv_createdon' => $newDate,
				'pslv_oprationids' => $opratids,
				'pslv_itismsids' => $itismsids,
				'pslv_adminids' => $adminids,
				'pslv_trainerids' => $tainerids,
				'pslv_externalids' => $externalids,
			);
			require_once 'email-functions.php';
			$cont->insertData($table,$data,$p);

		}
		break;
		case "emailapprov":
		if(isset($_GET['type']))
		{
			$type = $_GET['type'];
			switch($type)
			{
				case "aarti.dogra@silaris.in":
				if(isset($_POST['approve']))
				{
					$p = $_GET['p'];
					$setid = $_POST['setid'];
					$suser = $_POST['suser'];
					$semail = $_POST['semail'];
					$empname = $_POST['empname'];
					$empid = $_POST['empid'];
					$depart = $_POST['depart'];
					$design = $_POST['design'];
					$manager = $_POST['manager'];
					$suggestemail = $_POST['suggestemail'];
					$comment = $_POST['comment'];

					$table = "pslv_emailrequest";
					$data = array(
						'pslv_hrdepart' => '2',
						'pslv_hrcomment' => $comment
					);
					$cond = array(
						'pslv_status' => '1',
						'pslv_sno' => $setid
					);
					require_once 'email-functions.php';
					$cont->updateData($table,$data,$cond,$p);
				}
				else
				{
					$p = $_GET['p'];
					$setid = $_POST['setid'];
					$suser = $_POST['suser'];
					$semail = $_POST['semail'];
					$empname = $_POST['empname'];
					$empid = $_POST['empid'];
					$depart = $_POST['depart'];
					$design = $_POST['design'];
					$manager = $_POST['manager'];
					$suggestemail = $_POST['suggestemail'];
					$comment = $_POST['comment'];

					$table = "pslv_emailrequest";
					$data = array(
						'pslv_hrdepart' => '1',
						'pslv_hrcomment' => $comment,
						'pslv_action' => '1'
					);
					$cond = array(
						'pslv_status' => '1',
						'pslv_sno' => $setid
					);
					require_once 'email-functions.php';
					$cont->updateData($table,$data,$cond,$p);
				}
				break;
				case "isms@silaris.in":
				if(isset($_POST['approve']))
				{
					$p = $_GET['p'];
					$setid = $_POST['setid'];
					$suser = $_POST['suser'];
					$semail = $_POST['semail'];
					$empname = $_POST['empname'];
					$empid = $_POST['empid'];
					$depart = $_POST['depart'];
					$design = $_POST['design'];
					$manager = $_POST['manager'];
					$suggestemail = $_POST['suggestemail'];
					$comment = $_POST['comment'];

					$table = "pslv_emailrequest";
					$data = array(
						'pslv_isms' => '2',
						'pslv_ismscomment' => $comment
					);
					$cond = array(
						'pslv_status' => '1',
						'pslv_sno' => $setid
					);
					require_once 'email-functions.php';
					$cont->updateData($table,$data,$cond,$p);
				}
				else
				{
					$p = $_GET['p'];
					$setid = $_POST['setid'];
					$suser = $_POST['suser'];
					$semail = $_POST['semail'];
					$empname = $_POST['empname'];
					$empid = $_POST['empid'];
					$depart = $_POST['depart'];
					$design = $_POST['design'];
					$manager = $_POST['manager'];
					$suggestemail = $_POST['suggestemail'];
					$comment = $_POST['comment'];

					$table = "pslv_emailrequest";
					$data = array(
						'pslv_isms' => '1',
						'pslv_ismscomment' => $comment,
						'pslv_action' => '1'
					);
					$cond = array(
						'pslv_status' => '1',
						'pslv_sno' => $setid
					);
					require_once 'email-functions.php';
					$cont->updateData($table,$data,$cond,$p);
				}
				break;
				case "email.support@silaris.in":
				if(isset($_POST['approve']))
				{
					$p = $_GET['p'];
					$setid = $_POST['setid'];
					$suser = $_POST['suser'];
					$semail = $_POST['semail'];
					$empname = $_POST['empname'];
					$empid = $_POST['empid'];
					$depart = $_POST['depart'];
					$design = $_POST['design'];
					$manager = $_POST['manager'];
					$suggestemail = $_POST['suggestemail'];
					$comment = $_POST['comment'];

					$table = "pslv_emailrequest";
					$data = array(
						'pslv_support' => '2',
						'pslv_supportcoment' => $comment
					);
					$cond = array(
						'pslv_status' => '1',
						'pslv_sno' => $setid
					);
					require_once 'email-functions.php';
					$cont->updateData($table,$data,$cond,$p);
				}
				else
				{
					$p = $_GET['p'];
					$setid = $_POST['setid'];
					$suser = $_POST['suser'];
					$semail = $_POST['semail'];
					$empname = $_POST['empname'];
					$empid = $_POST['empid'];
					$depart = $_POST['depart'];
					$design = $_POST['design'];
					$manager = $_POST['manager'];
					$suggestemail = $_POST['suggestemail'];
					$comment = $_POST['comment'];

					$table = "pslv_emailrequest";
					$data = array(
						'pslv_support' => '1',
						'pslv_supportcoment' => $comment,
						'pslv_action' => '1'
					);
					$cond = array(
						'pslv_status' => '1',
						'pslv_sno' => $setid
					);
					require_once 'email-functions.php';
					$cont->updateData($table,$data,$cond,$p);
				}
				break;
			}
		}
		
		break;
		case "viewpass":
		if(isset($_POST['viewpass']))
		{
			$p = $_GET['p'];
			$gateid = $_POST['gateid'];
			$table = "pslv_gatepass";

			$data = array(
				'pslv_action' => '1',
			);
			$cond = array(
				'pslv_gateid' => $gateid,
			);
			$cont->updateData($table,$data,$cond,$p);
		}
		break;
		case "changepass":
		if(isset($_POST['changepass']))
		{
			$p = $_GET['p'];
			$fpass = $_POST['fpass'];
			$cpass = $_POST['cpass'];
			$employ = $_POST['employ'];

			if($fpass === $cpass)
			{
				$table = "pslv_user";
				$data = array(
					'pslv_pass' => $fpass,
					'pslv_pass_setdate' => $onlyDate,
				);
				$cond = array(
					'pslv_sno' => $employ,
				);
				$cont->updateData($table,$data,$cond,$p);
			}
			else
			{
				echo "<script>alert('Password Not Match!');window.location.href='".VIWS."$p.php';</script>";
			}

			
		}
		break;
		case "addemploy":
		if(isset($_POST['addempoly']))
		{
			$p = $_GET['p'];
			$empname = $_POST['empname'];
			$prefix = $_POST['prefix'];
			$empid = $_POST['empid'];
			$emplid = $prefix.$empid;
			$empro = $_POST['empro'];
			$emsubpro = $_POST['emsubpro'];
			$empost = 'employee';
			$promanager = $_POST['promanager'];



			$table = "pslv_employee";
			$cond = array(
				'pslv_empid' =>$emplid
			);
			$getEmp = $mod->getAllrow($table,$cond);
			$data = array(
				'pslv_empname' => $empname,
				'pslv_empid' => $emplid,
				'pslv_userpost' => $empost,
				'pslv_process' => $empro,
				'pslv_subpro' => $emsubpro,
				'pslv_prohead' => $promanager,
				'pslv_password' => 'Null',
				'pslv_status' => '1',
				'pslv_uploadon' => $newDate,
				'pslv_uploadby' => $fuemail
			);
			if($getEmp == "")
			{
				$cont->insertData($table,$data,$p);
			}
			else
			{
				echo "<script>alert('Employee already Exist!');window.location.href='".VIWS."$p.php';</script>";
			}
			
		}
		break;
		case "updateemploy":
		if(isset($_POST['updoempoly']))
		{
			$p = $_GET['p'];
			$ids = $_GET['ids'];
			$empname = $_POST['empname'];
			$emplid = $_POST['empid'];
			$empro = $_POST['empro'];
			$emsubpro = $_POST['emsubpro'];
			$empost = $_POST['empost'];
			$promanager = $_POST['promanager'];

			$table = "pslv_employee";
			$data = array(
				'pslv_empname' => $empname,
				'pslv_empid' => $emplid,
				'pslv_userpost' => $empost,
				'pslv_process' => $empro,
				'pslv_subpro' => $emsubpro,
				'pslv_prohead' => $promanager
			);
			$cond = array(
				
				'pslv_empsno' => $ids,
				'pslv_status' => '1',
				
			);
			$cont->updateData($table,$data,$cond,$p);
		}
		break;
		case "delemp":
		$p = $_GET['p'];
		$ids = $_GET['ids'];
		$table = "pslv_employee";
		$data = array(
			'pslv_status' => '0',
			
		);
		$cond = array(
			'pslv_empsno' => $ids,
		);
		$cont->updateData($table,$data,$cond,$p);
		break;
		case "addefile":
		$p = $_GET['p'];
		$fileVal = dirname(dirname(dirname(__FILE__)));
		include $fileVal.'\public\PHPExcel\IOFactory.php';
		require_once $fileVal.'\public\PHPExcel.php';
		require_once("../config/config.php");
		$dbc = new Dbconnect();
		if(isset($_POST['filesave']))
		{
			$fileName = $_FILES['filename']['name'];
			$fileTemp = $_FILES['filename']['tmp_name'];

			$objExcel = PHPExcel_IOFactory::load($fileTemp);
			foreach($objExcel->getWorksheetIterator() as $worksheet)
			{
				$highestrow = $worksheet -> getHighestRow();

				for($row=2;$row<=$highestrow;$row++)
				{
					$empname = $worksheet->getCellByColumnAndRow(1,$row)->getValue();
					$silarid = $worksheet->getCellByColumnAndRow(2,$row)->getValue();
					$empro = $worksheet->getCellByColumnAndRow(3,$row)->getValue();
					$emsubpro = $worksheet->getCellByColumnAndRow(4,$row)->getValue();
					$promanager = $worksheet->getCellByColumnAndRow(5,$row)->getValue();
					$emplid = strtoupper($silarid);

					$sql =  "INSERT INTO `pslv_temp`(`pslv_empname`, `pslv_empid`, `pslv_userpost`, `pslv_process`, `pslv_subpro`, `pslv_prohead`, `pslv_password`, `pslv_status`, `pslv_uploadon`, `pslv_uploadby`) VALUES ('$empname','$emplid','employee','$empro','$emsubpro','$promanager','Null','1','$newDate','$fuemail')";
					$res = mysqli_query($dbc->conn,$sql);
					if($res == true)
					{
						header('Location:'.VIWS.$p.'.php');
					}
				}


			}


		}
		break;
		case "refresh":
		$table = "pslv_temp";
		$p = $_GET['p'];
		$cont->refreshServ($table,$p);
		break;
		case "addcompare":
		if(isset($_POST['savecan']))
		{
			$p = $_GET['p'];
			require_once("../config/config.php");
			$dbc = new Dbconnect();
			$addcan = $_POST['addcan'];
			
			foreach ($addcan as $addval)
			{
				
				$temp = "SELECT * FROM pslv_temp WHERE pslv_empid='$addval'";
				$res = mysqli_query($dbc->conn,$temp);
				$row = mysqli_fetch_assoc($res);
				$empname = $row['pslv_empname'];
				$empid = $row['pslv_empid'];
				$userpost = $row['pslv_userpost'];
				$process = $row['pslv_process'];
				$subpro = $row['pslv_subpro'];
				$prohead = $row['pslv_prohead'];

				$sql = "INSERT INTO `pslv_employee`(`pslv_empname`, `pslv_empid`, `pslv_userpost`, `pslv_process`, `pslv_subpro`, `pslv_prohead`, `pslv_password`, `pslv_status`, `pslv_uploadon`, `pslv_uploadby`) VALUES ('$empname','$empid','$userpost','$process','$subpro','$prohead','Null','1','$newDate','$fuemail')";
				$res = mysqli_query($dbc->conn,$sql);
				if($res == true)
				{
					mysqli_query($dbc->conn,"DELETE FROM pslv_temp WHERE pslv_empid='$addval'");
					header('Location:'.VIWS.$p.'.php');
				}
			}
			
		}
		if(isset($_POST['candel']))
		{
			$p = $_GET['p'];
			require_once("../config/config.php");
			$dbc = new Dbconnect();
			$addcan = $_POST['addcan'];
			foreach ($addcan as $addval)
			{
				
				$temp = "SELECT * FROM pslv_employee WHERE pslv_empid='$addval'";
				$res = mysqli_query($dbc->conn,$temp);
				$row = mysqli_fetch_assoc($res);
				if($row == true)
				{
					mysqli_query($dbc->conn,"DELETE FROM pslv_temp WHERE pslv_empid='$addval'");
					header('Location:'.VIWS.'compare.php');
				}

			}
			
		}
		break;
		case "maininci":
		if(isset($_POST['savemain']))
		{
			$p = $_GET['p'];
			$maininci = ucwords($_POST['maininci']);
			$table = "pslv_cateories";
			$data = array(
				'pslv_category' => 'maininci',
				'pslv_catname' => $maininci,
				'pslv_status' => '1',
				'pslv_createdon' => $newDate
			);
			$cont = new Controller();
			$cont->insertData($table,$data,$p);
		}
		break;
		case "subinci":
		if(isset($_POST['savesub']))
		{
			$p = $_GET['p'];
			$subinci = ucwords($_POST['subinci']);
			$table = "pslv_cateories";
			$data = array(
				'pslv_category' => 'subinci',
				'pslv_catname' => $subinci,
				'pslv_status' => '1',
				'pslv_createdon' => $newDate
			);
			$cont = new Controller();
			$cont->insertData($table,$data,$p);
		}
		break;
		case "creatinci":
		if(isset($_POST['saveinci']))
		{
			$p = $_GET['p'];
			$ticketid = $_POST['ticketid'];
			$incipro = $_POST['incipro'];
			$incimain = $_POST['incimain'];
			$incisub = $_POST['incisub'];
			$incidetail = str_replace("'","\'",$incisub);
			$table = "pslv_incident";
			$data = array(
				'pslv_ticketno' => $ticketid,
				'pslv_issueby' => $funame,
				'pslv_issuemail' => $fuemail,
				'pslv_incidetails' => $incidetail,
				'pslv_process' => $incipro,
				'pslv_maininci' => $incimain,
				'pslv_subinci' => $incisub,
				'pslv_startdate' => $newDate,
				'pslv_createdby' => $fuemail,
				'pslv_createdon' => $newDate,
				'pslv_status' => '1'
			);

			$cont = new Controller();
			$cont->insertData($table,$data,$p);
		}
		break;
		case "ccrm":
		if(isset($_POST['datasave']))
		{
			$p = $_GET['p'];
			$mid = $_GET['mid'];
			$ccrmno = $_POST['ccrmno'];
			$raisedate = $_POST['raisedate'];
			$typechange = $_POST['typechange'];
			$location = $_POST['location'];
			$descripchange = $_POST['descripchange'];
			$nature = $_POST['nature'];
			$startdate = $_POST['startdate'];
			$expectdate = $_POST['expectdate'];
			$priority = $_POST['priority'];
			$ismsimpact = $_POST['ismsimpact'];
			$possiblmpact = $_POST['possiblmpact'];
			$approveby = $_POST['approveby'];
			$purpose = $_POST['purpose'];
			$process = $_POST['process'];
			$owner = $_POST['owner'];
			$message = $_POST['message'];
			$newmessage = str_replace("'","\'",$message);
			$willchange = $_POST['willchange'];
			$regression = $_POST['regression'];
			$backout = $_POST['backout'];
			$changefails = $_POST['changefails'];
			$conflicting = $_POST['conflicting'];
			$pinaki = @$_POST['pinaki'];
			$samarth = @$_POST['samarth'];
			$rajesh = @$_POST['rajesh'];
			$isms = @$_POST['isms'];

			date_default_timezone_set('Asia/Kolkata');
			$uploadon = date('Y-m-d');
			$daytime = date('Y-m-d h:i:s');
			$utime = date('h:i:s');
			$yr = date('Y');
			$mr = date('m');


			$table = "pslv_ccrmdata";
			$data = array(
				'pslv_ccrno' => $ccrmno,
				'pslv_ccrdate' => $raisedate,
				'pslv_typeofchange' => $typechange,
				'pslv_location' => $location,
				'pslv_description' => $descripchange,
				'pslv_natureofchange' => $nature,
				'pslv_startdate' => $startdate,
				'pslv_expectedate' => $expectdate,
				'pslv_priority' => $priority,
				'pslv_ismsimpact' => $ismsimpact,
				'pslv_possibleimpact' => $possiblmpact,
				'pslv_ismsapprove' => $approveby,
				'pslv_purposechange' => $purpose,
				'pslv_processowner' => $process,
				'pslv_owner' => $owner,
				'pslv_fulldetails' => $newmessage,
				'pslv_custmbusiness' => $willchange,
				'pslv_regression' => $regression,
				'pslv_backout' => $backout,
				'pslv_potenial' => $changefails,
				'pslv_conflicting' => $conflicting,
				'pslv_ciochar' => $pinaki,
				'pslv_itvpchar' => $samarth,
				'pslv_itgmchar' => $rajesh,
				'pslv_ismschar' => $isms,
				'pslv_createdon' => $daytime,
				'pslv_createdby' => $fuemail,
				'pslv_action' => '0',
				'pslv_status' => '1',
			);
		require_once 'email-functions.php';
		$cont = new Controller();
		$cont->insertData($table,$data,$p);
			
		}
		break;
		case "policy":
		if(isset($_POST['policysave']))
		{
			$p = $_GET['p'];
			$policyname = $_POST['policyname'];
			$publish = @$_POST['publish'];
			$filename = $_FILES["policyfile"]["name"];
			$filetemp = $_FILES["policyfile"]["tmp_name"];
			$policynam = str_replace("'","\'",$policyname);
			$target_dir = dirname(dirname(dirname(__FILE__)))."/public/uploads/";
			$target_file = $target_dir . basename($filename);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			$table = "pslv_policyfile";
			$data = array(
				'pslv_filename' => $policyname,
				'pslv_filetemp' => $filename,
				'pslv_createdby' => $fuemail,
				'pslv_createdon' => $newDate,
				'pslv_publish' => $publish,
				'pslv_status' => '1'
			);

			if($imageFileType != "pdf")
			{
				echo "<script>alert('Only PDF File Accepted!');window.location.href='".VIWS."$p.php';</script>";
			}
			else
			{
				if(move_uploaded_file($filetemp, $target_file))
				{
					$cont = new Controller();
					$cont->insertData($table,$data,$p);
				}
			}
		}
		break;
		case "delpolicy":
		if(isset($_GET['ids']))
		{
			$ids = $_GET['ids'];
			$p = $_GET['p'];
			$table = "pslv_policyfile";
			$data = array(
				'pslv_status' => '0'
			);
			$cond = array(
				'pslv_sno' => $ids
				
			);
			$cont = new Controller();
			$cont->updateData($table,$data,$cond,$p);
		}
		break;
		case "ccrdwnld":
		if(isset($_GET['ids']))
		{
			require_once 'pdf-files.php'; 
		}
		break;
		case "ccraprve":
		if(isset($_GET['ids']))
		{
			$ids = $_GET['ids'];
			$p = $_GET['p'];
			$emet = $_GET['emet'];
			switch($emet)
			{
				case "samarth.jain@silaris.in":
				$data = array(

					'pslv_itvpint' => '2'
				);
				$table = "pslv_ccrmdata";
				$cond = array(
					'pslv_srno' => $ids
				);
				$cont = new Controller();
				$cont->updateData($table,$data,$cond,$p);
				break;
				case "rajesh.bisht@silaris.in":
				$data = array(

					'pslv_itgmint' => '2'
				);
				$table = "pslv_ccrmdata";
				$cond = array(
					'pslv_srno' => $ids
				);
				$cont = new Controller();
				$cont->updateData($table,$data,$cond,$p);
				break;
				case "isms@silaris.in":
				$data = array(

					'pslv_ismsint' => '2'
				);
				$table = "pslv_ccrmdata";
				$cond = array(
					'pslv_srno' => $ids
				);
				$cont = new Controller();
				$cont->updateData($table,$data,$cond,$p);
				break;
				case "pinaki.narendra@silaris.in":
				$data = array(

					'pslv_cioint' => '2'
				);
				$table = "pslv_ccrmdata";
				$cond = array(
					'pslv_srno' => $ids
				);
				$cont = new Controller();
				$cont->updateData($table,$data,$cond,$p);
				break;
			}
			
			
		}
		break;
		case "solveinci":
		if(isset($_POST['saveinci']))
		{
			$ids = $_GET['ids'];
			$p = $_GET['p'];
			$message = $_POST['message'];
			$messt = str_replace("'","\'",$message);
			$table = "pslv_incident";
			$data = array(
				'pslv_closedate' => $newDate,
				'pslv_solutions' => $messt,
				'pslv_solveby' => $funame,
				'pslv_solvemail' => $fuemail
			);
			$cond = array(
				'pslv_srno' => $ids
			);

			$cont = new Controller();
			$cont->updateData($table,$data,$cond,$p);

		}
		break;
	}
}