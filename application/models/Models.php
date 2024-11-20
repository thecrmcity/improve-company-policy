<?php
require_once("../config/config.php");

class Models extends Dbconnect
{
	public $dataid ="";
	
	protected $keycol = "";
	protected $valcol = "";
	protected $sincol = "";

	protected $inkey = "";
	protected $inval = "";
	protected $intable = "";
	protected $injoint = "";
	protected $indata = "";
	protected $incond = "";
	protected $innotcond = "";
	protected  $ntab = "";
	


	public function getOne($table,$rowid)
	{
		$sql = "SELECT $rowid FROM $table ORDER BY $rowid DESC LIMIT 1";
		$res = mysqli_query($this->conn,$sql);
		$row = mysqli_fetch_array($res);
		if(mysqli_num_rows($res) > 0)
		{
			$rowone = $row[$rowid];
			return $this->dataid = $rowone+1;
		}
		else
		{
			return $this->dataid = "1";
		}
		
	}
	public function getSingle($table,$data,$cond)
	{

		foreach($cond as $ckey => $cval)
		{
			$this->sincol.=" `$ckey`='$cval' AND ";

		}
		
		$valdata = rtrim($this->sincol,' AND ');
		$sql = "SELECT $data FROM $table WHERE $valdata";
		$res = mysqli_query($this->conn,$sql);
		$row = mysqli_fetch_assoc($res);
		return $row;
	}
	public function getOnerow($table,$data,$cond)
	{
		
		foreach($data as $vkey)
		{
			$this->keycol.="$vkey,";
		}
		$keydata = rtrim($this->keycol,',');

		foreach($cond as $ckey => $cval)
		{
			$this->valcol.=" `$ckey`='$cval' AND ";
		}
		$valdata = rtrim($this->valcol,' AND ');
		$sql = "SELECT $keydata FROM $table WHERE $valdata";
		$res = mysqli_query($this->conn,$sql);
		$row = mysqli_fetch_assoc($res);
		return $row;
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
	
	
	public function getAllrow($table,$cond)
	{
		
		
		foreach($cond as $ckey => $cval)
		{
			$this->valcol .= " `$ckey` ='$cval' AND ";
		}
		
		$valdata = rtrim($this->valcol,' AND ');
		
		$sql = "SELECT * FROM $table WHERE $valdata";
		
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
	public function getAll_notcond($table,$cond)
	{
		
		
		foreach($cond as $ckey => $cval)
		{
			$this->valcol .= "`$ckey`='$cval' AND";
			

		}
		
		$valdata = rtrim($this->valcol,' AND');
		$sql = "SELECT * FROM $table WHERE $valdata AND `pslv_post` != 'post1'";
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
	public function innerCond($mtable,$table,$data,$joint,$cond,$notcond="")
	{
		
		foreach($data as $kdata => $vdata)
		{
			$this->inkey.="$kdata AS $vdata, ";
		}
		$intdata = rtrim($this->inkey,', ');
		
		foreach($joint as $jkey => $jval)
		{
			$mtjoin[] = $jkey;
			$vtjoin[] = $jval;
		}
		
		foreach($table as $tab)
		{
		$ntabl[] = $tab;
		}

		for($i=0; $i<count($table);$i++)
		{
			
			$this->injoint .= " INNER JOIN $ntabl[$i] ON $mtjoin[$i] = $vtjoin[$i] ";
			
			
		}
		foreach($cond as $kcond => $vcond)
		{
			$this->incond.="$kcond = '$vcond' AND ";
		}
		$intcond = rtrim($this->incond,'AND ');
		foreach($notcond as $knotcond => $vnotcond)
		{
			$this->innotcond.="$knotcond != '$vnotcond' AND ";
		}
		$intnotcond = rtrim($this->innotcond,'AND ');

		$sql = "SELECT $intdata FROM $mtable $this->injoint WHERE $intcond AND $intnotcond";
		$res = mysqli_query($this->conn,$sql);
		while($row = mysqli_fetch_assoc($res))
		{
			$allinnerData[] = $row;
		}
		return $allinnerData;

	}
	public function innerJoin($mtable,$table,$data,$joint,$cond)
	{

		foreach($data as $kdata => $vdata)
		{
			$this->inkey.="$kdata AS $vdata, ";
		}
		$intdata = rtrim($this->inkey,', ');

		foreach($cond as $kcond => $vcond)
		{
			$this->incond.="$kcond = '$vcond' AND ";
		}
		$intcond = rtrim($this->incond,'AND ');
		
		$sql = "SELECT $intdata FROM $mtable INNER JOIN $table ON $joint WHERE $intcond";
		$res = mysqli_query($this->conn,$sql);
		if(mysqli_num_rows($res) > 0)
		{
			while($row = mysqli_fetch_assoc($res))
			{
				$allinnerData[] = $row;
			}
			return $allinnerData;
		}
		
		
		

	}
	

	
}

