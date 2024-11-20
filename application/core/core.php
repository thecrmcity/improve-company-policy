<?php

if(!defined('BASECON'))
{
	require_once("../config/config.php");
	//$dbcon->conn --- Connection variable

}


class Frameworks
{
	public function __construct()
	{
		
		$this->init();
		$this->autoload();
		
	}
	public function init()
	{
		define("BASE_URL","http://localhost/security/");
		define("TITLE","Silaris ISMS Department");
		define("US","/");
		define("APP",BASE_URL.'application'.US);
		define("PUB",BASE_URL.'public'.US);
		define("SYS",BASE_URL.'systems'.US);

		define("CONFIG",APP.'config'.US);
		define("CONTRL",APP.'controller'.US);
		define("CORE",APP.'core'.US);
		define("MODLS",APP.'models'.US);
		define("VIWS",APP.'views'.US);

		define("DIST",PUB.'dist'.US);
		define("PLUG",PUB.'plugins'.US);

		define("CSS",SYS.'css'.US);
		define("IMG",SYS.'img'.US);
		define("JS",SYS.'js'.US);

		session_start();
		$upost = @$_SESSION['post'];
		$uemail = @$_SESSION['uemail'];
		$uname = @$_SESSION['uname'];

		date_default_timezone_set('Asia/Kolkata');
		$newDate = date('Y-m-d h:i:s');
		$onlyDate = date('Y-m-d');
		$active = "1";
		$deactive = "0";

		
		
	}
	public function autoload()
	{
		spl_autoload_register(array(__CLASS__,'load'));
	}
	public function load($classname)
	{
		switch($classname)
		{
			case "Controller":
			require_once("../controller/$classname.php");
			break;
			case "Logincontrol":
			require_once("../controller/$classname.php");
			break;
			case "Models":
			require_once("../models/$classname.php");
			break;
			case "Loginmod":
			require_once("../models/$classname.php");
			break;
			case "Crmodels":
			require_once("../models/$classname.php");
			break;
		}
		
	}
	public function getHeader()
	{
		echo '
			<link rel="stylesheet" href="'.CSS.'font-awesome.css">
			<link rel="icon" type="image/gif" href="'.IMG.'fevicon.png">
			<link rel="stylesheet" type="text/css" href="'.CSS.'style.css">
			<link rel="stylesheet" type="text/css" href="'.CSS.'responsive.css">
		  	<link rel="stylesheet" href="'.CSS.'bootstrap.css">
		  	<script src="'.JS.'jquery.js"></script>
		';
	}
	public function getFooter()
	{
		echo '
		<script src="'.JS.'popper.js"></script>
		<script src="'.JS.'bootstrap.js"></script>
		';
	}
	public function dashHeader()
	{
		echo '
			<link rel="stylesheet" href="'.CSS.'font-awesome.css">
			<link rel="icon" type="image/gif" href="'.IMG.'fevicon.png">
			<link rel="stylesheet" type="text/css" href="'.CSS.'style.css">
			<link rel="stylesheet" type="text/css" href="'.CSS.'responsive.css">
		  	<link rel="stylesheet" href="'.CSS.'bootstrap.css">
		  	<link rel="stylesheet" href="'.CSS.'jquery-ui.css">
			<link rel="stylesheet" href="'.PLUG.'datatables/dataTables.bootstrap.css">
			<link rel="stylesheet" href="'.PLUG.'datatables/jquery.dataTables_themeroller.css">
			<link rel="stylesheet" href="'.DIST.'css/AdminLTE.css">
			<link rel="stylesheet" href="'.DIST.'css/skins/_all-skins.min.css">
			<script src="'.JS.'Chart.min.js"></script>
			
		';
	}
	public function dashFooter()
	{
		echo '
			

			<script src="'.JS.'jquery.js"></script>
			<script src="'.JS.'popper.js"></script>
			<script src="'.JS.'bootstrap.js"></script>
			<script src="'.PLUG.'datatables/jquery.dataTables.min.js"></script>
			<script src="'.PLUG.'datatables/dataTables.bootstrap.min.js"></script>
			<script src="'.PLUG.'bootstrap-notify/bootstrap-notify.min.js"></script>
			<script src="'.JS.'dataTables.jqueryui.min.js"></script>
			<script src="'.DIST.'js/app.min.js"></script>
			<script src="'.JS.'main.js"></script>

		';
	}
	public function dashSidebar()
	{

	}
	
}
$obj = new Frameworks();
