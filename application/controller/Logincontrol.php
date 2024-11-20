
<?php
require_once("../config/config.php");
class Logincontrol extends Dbconnect
{

	public $conn = "";
	
	protected $keycol = "";
	protected $valcol = "";

	public function userLogemail($table,$fname,$fpass)
	{
		$sql = "SELECT * FROM $table WHERE `pslv_email`='$fname' AND `pslv_status`='1'";
		$res = mysqli_query($this->conn,$sql);
		$row = mysqli_fetch_array($res);
		
		if($row['pslv_pass'] === "$fpass")
		{
			$_SESSION['uname'] = $row['pslv_name'];
			$_SESSION['uemail'] = $row['pslv_email'];
			$_SESSION['uempid'] = $row['pslv_empid'];
			$_SESSION['post'] = $row['pslv_post'];
			$_SESSION['author'] = $row['pslv_authority'];
			$_SESSION['process'] = $row['pslv_process'];
			$_SESSION['manager'] = $row['pslv_manager'];
			$_SESSION['srlno'] = $row['pslv_sno'];
			$_SESSION['fpass'] = $row['pslv_pass'];
			header('Location:'.VIWS.'dashboard.php');
		}
		else
		{
			echo "<script>alert('You have entered an invalid username or password!');window.location.href='".VIWS."login.php';</script>";
		}
	}
	public function userLogempid($table,$fname,$fpass)
	{
		$sql = "SELECT * FROM $table WHERE `pslv_empid`='$fname' AND `pslv_status`='1'";
		$res = mysqli_query($this->conn,$sql);
		$row = mysqli_fetch_array($res);
		
		if($row['pslv_pass'] === "$fpass")
		{
			$_SESSION['uname'] = $row['pslv_name'];
			$_SESSION['uemail'] = $row['pslv_email'];
			$_SESSION['uempid'] = $row['pslv_empid'];
			$_SESSION['post'] = $row['pslv_post'];
			$_SESSION['author'] = $row['pslv_authority'];
			$_SESSION['process'] = $row['pslv_process'];
			$_SESSION['manager'] = $row['pslv_manager'];
			$_SESSION['srlno'] = $row['pslv_sno'];
			$_SESSION['fpass'] = $row['pslv_pass'];
			header('Location:'.VIWS.'dashboard.php');
		}
		else
		{
			echo "<script>alert('You have entered an invalid username or password!');window.location.href='".VIWS."login.php';</script>";
		}
	}
	public function loginPass($table,$data,$cond)
	{
		foreach($data as $key => $val)
		{
			$this->keycol .="`$key` = '$val', ";
		}
		foreach($cond as $cony => $cal)
		{
			$this->valcol .="`$cony` = '$cal' AND ";
		}
		$keydata = rtrim($this->keycol,', ');
		$valdata = rtrim($this->valcol,' AND ');

		$sql = "UPDATE $table SET $keydata WHERE $valdata";
		$res = mysqli_query($this->conn,$sql);
		if($res == true)
		{
			
			echo "<script>alert('Your password has been set! Please login');window.location.href='".VIWS."login.php';</script>";
		}
		else
		{
			echo "<script>alert('Some technical issue try after some time!');window.location.href='".VIWS."index.php';</script>";
		}
	}
}