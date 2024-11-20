<?php
require_once("../config/config.php");

class Crmodels extends Dbconnect
{
	public $dataid ="";
	
	protected $keycol = "";
	protected $valcol = "";
	protected $sincol = "";

	protected $emailcol = "";

	public function getAllrow($table,$cond,$splcond)
	{
		
		
		foreach($cond as $ckey => $cval)
		{
			$this->valcol .= " `$ckey` ='$cval' AND ";
		}
		
		$valdata = rtrim($this->valcol,' AND ');
		
		$sql = "SELECT * FROM $table WHERE $valdata $splcond";
		
		$res = mysqli_query($this->conn,$sql);
		if(mysqli_num_rows($res) > 0)
		{
			while($row = mysqli_fetch_assoc($res))
			{
				$alldataList[] = $row;
			}
			return $alldataList;
		}
		
		
	}
	public function getAllnot($table,$cond,$notin,$splcond)
	{
		
		
		foreach($cond as $ckey => $cval)
		{
			$this->valcol .= " `$ckey` ='$cval' AND ";
		}
		
		$valdata = rtrim($this->valcol,' AND ');

		foreach($notin as $cnot => $inval)
		{
			$this->keycol .= " AND `$cnot` !='$inval' AND ";
		}
		
		$keydata = rtrim($this->keycol,' AND ');
		
		$sql = "SELECT * FROM $table WHERE $valdata $keydata $splcond";
		
		$res = mysqli_query($this->conn,$sql);
		if(mysqli_num_rows($res) > 0)
		{
			while($row = mysqli_fetch_assoc($res))
			{
				$alldataList[] = $row;
			}
			return $alldataList;
		}
		
		
	}
	public function getOnerowdata($table,$cond)
	{
		

		foreach($cond as $ckey => $cval)
		{
			$this->valcol.=" `$ckey`='$cval' AND ";
		}
		$valdata = rtrim($this->valcol,' AND ');
		$sql = "SELECT * FROM $table WHERE $valdata";
		$res = mysqli_query($this->conn,$sql);
		$row = mysqli_fetch_assoc($res);
		return $row;
	}
	public function filterEmails($emaild)
	{
		$emailed = str_replace(array("'","<",">",","," ",";"),'*',$emaild);
		$emailet = (array_filter(explode("*", $emailed)));

		foreach($emailet as $eval)
		{
			$eval1 = strpos($eval, substr($eval, strpos($eval,'@')));
			$fistval1 = substr($eval, '0',strpos($eval,'@'));
			$lastval1 = substr($eval, strpos($eval,'@'));
			if($eval1 != 0)
			{
				$this->emailcol .= htmlentities($fistval1.$lastval1."<br>");
			}
		}
		$emaildd = $this->emailcol;
		return $emaildd;
		exit();
	}
}