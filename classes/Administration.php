<?php

/**
 * 
 */
class Administration extends User
{
	
	public $db = null;
	
	function __construct()
	{
		$conn = new DB();
		$this->db = $conn->db;
	}


	public function view_sell($table){
		$array = array();
    	$sql = "SELECT * FROM ".$table;
    	$result = $this->db->query($sql);
    	if ($result->num_rows > 0) {
  			while($row = $result->fetch_assoc()) {
    			$array[] = $row;
  			}
  			return $array;
		} else {
  			return false;
		}
    }
	
}
?>