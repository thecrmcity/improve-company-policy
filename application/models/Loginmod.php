<?php
require_once("../config/config.php");

class Loginmod extends Dbconnect
{
	protected $keycol = "";
	protected $valcol = "";

	public function userLogin($table,$cond)
	{
		foreach($cond as $ckey => $cval)
		{
			$this->valcol .= "`$ckey`='$cval' OR";
			$vhold[] = $cval;
		}
		
		$valdata = rtrim($this->valcol,' OR');
		$sql = "SELECT * FROM $table WHERE $valdata AND `pslv_status`='1'";
		$res = mysqli_query($this->conn,$sql);
		$row = mysqli_fetch_assoc($res);
		if($row == true)
		{
			$npass = $row['pslv_pass'];
			if($npass === "Null")
			{
				if($vhold[1] === "")
				{
					header("Location:".VIWS."generate.php?eid=".$vhold[0]);
				}
				else
				{
					header("Location:".VIWS."generate.php?eid=".$vhold[1]);
				}
				
			}
			else
			{
				if($vhold[1] === "")
				{
					header("Location:".VIWS."password.php?eid=".$vhold[0]);
				}
				else
				{
					header("Location:".VIWS."password.php?eid=".$vhold[1]);
				}

				
			}

		}
		else
		{
			echo "<script>alert('User Not Exist! Please Check Spelling'); window.location.href='".VIWS."login.php'</script>";
		}
		

	}
	public function userReset($table,$data,$cond)
	{
		foreach($cond as $ckey => $cval)
		{
			$this->valcol .= "`$ckey`='$cval' AND";
			
		}
		$valdata = rtrim($this->valcol,' AND');

		foreach($data as $dkey => $dval)
		{
			$this->keycol .= "`$dkey`='$dval', ";
			
		}
		$keydata = rtrim($this->keycol,', ');

		$sql = "UPDATE $table SET $keydata WHERE $valdata";
		$res = mysqli_query($this->conn,$sql);
		$row = mysqli_fetch_assoc($res);
		return $row;
	}
}