<?php
/**
 * class for database connection and query.
 **/

class DB
{
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "oosd";

	public $db = null;
	private $conn = null;

	function __construct(){
		$this->conn = new mysqli(
			$this->host,
			$this->user,
			$this->password,
			$this->database
		);
		
		$this->db = $this->conn;
		if ($this->db->connect_error) {
			die('connection failed. '.$this->db->connect_errno.": ".$this->db->connect_error);
		}
	}
}

/**
 * class for database connection and query.
 **/

?>