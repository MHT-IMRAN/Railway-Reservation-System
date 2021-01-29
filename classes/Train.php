<?php
/**
 * 
 */
class Train extends DB
{

	public function daily_tain(){
		$array = array();

        date_default_timezone_set("Asia/Kuching");

		$journey_date = date("Y-m-d");

		$sql = "SELECT * FROM train WHERE journey_date='$journey_date'";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
     
        	while($row = $result->fetch_assoc()) {
        		$array[] = $row;
        	}
        return $array;
        }
	}


        public function view_train($table){
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

    public function specific_train($table,$id){
                $array = array();
        $sql = "SELECT * FROM ".$table." WHERE id='$id'";
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

    public function add_train($table, $data)  
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

     public function update_train($table,$data,$id){
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

     public function delete_train($table,$id){
        $sql = "DELETE FROM ".$table." WHERE id=".$id;

        if ($this->db->query($sql) == true) {
            return true;
        } else {
            return false;
        } 
    }
	
	
}
?>