<?php

class Dbconnect
{
	public $host = "localhost";
	public $user = "root";
	public $pass = "";
	public $dbname = "security";

	public $conn = "";

	public function __construct()
	{
	$conn = mysqli_connect($this->host,$this->user,$this->pass,$this->dbname) OR die('Connection Lost!');
	return $this->conn = $conn;
	}
	
}

