<?php
	/**
     * insert data to specified table of database.
    **/

	public function insert($table, $data)  
    {  
        $sql = "INSERT INTO ".$table." (";            
        $sql .= implode(",", array_keys($data)) . ') VALUES (';            
        $sql .= "'" . implode("','", array_values($data)) . "')";

        if ($this->db->query($sql) == true) {
            return true;
        } else {
            return false;
        }   
    }

    public function update($table,$data,$id){
        $set = '';
        $x = 1;

        foreach($data as $name => $value) {
        	$set .= "$name = '$value'";
        	if($x < count($data)) {
        		$set .= ',';
        	}
        	$x++;
    	}

    	$sql = "UPDATE ".$table." SET ".$set." WHERE id=".$id;

        if ($this->db->query($sql) == true) {
            return true;
        } else {
            return false;
        } 

    }

    public function delete($table,$id){
    	$sql = "DELETE FROM ".$table." WHERE id=".$id;

    	if ($this->db->query($sql) == true) {
            return true;
        } else {
            return false;
        } 
    }

    public function select($table){
    	$sql = "SELECT * FROM ".$table;
    	$result = $this->db->query($sql);
    	if ($result->num_rows > 0) {
  			while($row = $result->fetch_assoc()) {
    			$this->array[] = $row;
  			}
  			return $this->array;
		} else {
  			return false;
		}
    }

    public function select_by_id($table,$id){
    	$sql = "SELECT * FROM ".$table." WHERE id=".$id;
    	$result = $this->db->query($sql);
    	if ($result->num_rows > 0) {
  			while($row = $result->fetch_assoc()) {
    			$this->array[] = $row;
  			}
  			return $this->array;
		} else {
  			return false;
		}
    }

    public function query($sql){
    	return $this->db->query($sql);
    }  

?>