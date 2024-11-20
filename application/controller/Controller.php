<?php

require_once("../config/config.php");
class Controller extends Dbconnect
{
	public $conn = "";
	
	protected $keycol = "";
	protected $valcol = "";

	

	public function insertData($table,$data,$p)
	{
		foreach($data as $key => $val)
		{
			$this->keycol.="`$key`,";
			$this->valcol .= "'$val',";
		}
		$keydata = rtrim($this->keycol,',');
		$valdata = rtrim($this->valcol,',');

		$sql = "INSERT INTO $table($keydata) VALUES($valdata)";
		$res = mysqli_query($this->conn,$sql);
		if($res == true)
		{
			header('Location:'.VIWS.$p.'.php');
		}
		else
		{
			echo "<script>alert('Something Went Wrong!');window.location.href='".VIWS."$p.php';</script>";
		}
	}
	public  function updateData($table,$data,$cond,$p)
	{
		foreach($data as $key => $val)
		{
			$this->keycol .="`$key` = '$val',";
		}
		foreach($cond as $cony => $cal)
		{
			$this->valcol .="`$cony` = '$cal' AND";
		}
		$keydata = rtrim($this->keycol,',');
		$valdata = rtrim($this->valcol,' AND ');

		$sql = "UPDATE $table SET $keydata WHERE $valdata";
		
		$res = mysqli_query($this->conn,$sql);
		if($res == true)
		{
			header('Location:'.VIWS.$p.'.php');
		}
		else
		{
			echo "<script>alert('Something Went Wrong!');window.location.href='".VIWS."$p.php';</script>";
		}
	}
	
	public function delData($table,$data,$p)
	{
		foreach($data as $key => $val)
		{
			$this->keycol .="`$key` = '$val' AND ";
		}
		$keydata = rtrim($this->keycol,' AND ');
		$sql = "DELETE FROM $table WHERE $keydata";
		$res = mysqli_query($this->conn,$sql);
		if($res == true)
		{
			header('Location:'.VIWS.$p.'.php');
		}
		else
		{
			echo "<script>alert('Something Went Wrong!');window.location.href='".VIWS."$p.php';</script>";
		}
	}
	public function delUpdate($table,$data,$p)
	{
		foreach($data as $key => $val)
		{
			$this->keycol .="`$key` = '$val' AND ";
		}
		$keydata = rtrim($this->keycol,' AND ');
		$sql = "UPDATE $table SET `pslv_status`='0' WHERE $keydata";
		$res = mysqli_query($this->conn,$sql);
		if($res == true)
		{
			header('Location:'.VIWS.$p.'.php');
		}
		else
		{
			echo "<script>alert('Something Went Wrong!');window.location.href='".VIWS."$p.php';</script>";
		}
	}
	public function refreshServ($table,$p)
	{
		$sql = "TRUNCATE TABLE $table;";
		$res = mysqli_query($this->conn,$sql);
		if($res == true)
		{
			header('Location:'.VIWS.$p.'.php');
		}
		else
		{
			echo "<script>alert('Something Went Wrong!');window.location.href='".VIWS."$p.php';</script>";
		}
	}
	


}
