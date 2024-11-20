<?php
$page_name = basename($_SERVER["SCRIPT_FILENAME"], '.php');
$pageName = $page_name;
require_once'../core/core.php';
if(!isset($_SESSION['uemail']))
{
	header('Location:index.php');
	session_destroy();
}
$upost = $_SESSION['post'];
$uemail = $_SESSION['uemail'];
$uname = $_SESSION['uname'];
$uauthor = $_SESSION['author'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<title><?php echo TITLE;?></title>

	<?php $obj->dashHeader();?>
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.jqueryui.min.css">

	<script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript" charset="utf-8"></script>
	<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="https://cdn.datatables.net/1.13.1/js/dataTables.jqueryui.min.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>