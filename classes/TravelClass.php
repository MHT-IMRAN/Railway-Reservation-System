<?php
/**
 ** define class for train travel class.
 **/
class TravelClass extends Train
{
    private $class_id;
	protected $class_name;
	protected $class_fare;
    protected $number_of_seats;
    public $train_no;
    public $train_name;


     public function view_travel_class($table){
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
    

    //method to add travel classes of train.
	public function add_travel_class($table,$data){

        $sql = "INSERT INTO ".$table." (";            
        $sql .= implode(",", array_keys($data)) . ') VALUES (';            
        $sql .= "'" . implode("','", array_values($data)) . "')";

        if ($this->db->query($sql) == true) {
            return true;
        } else {
            return false;
        }    

	}
    //method to add travel classes of train.
    public function update_class($table,$data,$id){

    $set = '';
        $x = 1;

        foreach($data as $name => $value) {
            $set .= "$name = '$value'";
            if($x < count($data)) {
                $set .= ',';
            }
            $x++;
        }

        $sql = "UPDATE ".$table." SET ".$set." WHERE class_id=".$id;

        if ($this->db->query($sql) == true) {
            return true;
        } else {
            return false;
        }    

    }
    //method to add travel classes of train.
    public function delete_class($table,$id){ 

    $sql = "DELETE FROM ".$table." WHERE class_id='$id'";

        if ($this->db->query($sql) == true) {
            return true;
        } else {
            return false;
        }  

    }
    //method to add travel classes of train.

    public function search_class($train_id){

    $array = array();
        $sql = "SELECT * FROM travel_class WHERE train_no='$train_id'";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
     
            while($row = $result->fetch_assoc()) {
                $array[] = $row;
            }
        return $array;
        }   

    }

    public function specific_class($table,$train_id){

    $array = array();
        $sql = "SELECT * FROM travel_class WHERE class_id='$train_id'";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
     
            while($row = $result->fetch_assoc()) {
                $array[] = $row;
            }
        return $array;
        }   

    }

}
?>