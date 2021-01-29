<?php
/**
 * 
 */
class Passenger extends User
{
	public $db = null;
	
	function __construct()
	{
		$conn = new DB();
		$this->db = $conn->db;
	}

	public function registration($data){
		$name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "INSERT INTO user (name, phone, email, password) VALUES ('$name', '$phone', '$email', '$password')";

        if ($this->db->query($sql) === TRUE) {
        	$message = "<div class='text-center alert alert-success alert-dismissible fade show' role='alert'>"
                    ."<strong>Success!</strong> your registration has been success."
                    ."<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                    ."<span aria-hidden='true'>&times;</span>"
                    ."</button>"
                    ."</div>";
            return $message;
        } else {
        	$message = "<div class='text-center alert alert-danger alert-dismissible fade show' role='alert'>"
                    ."<strong>Failed!</strong> your registration has been failed."
                    ."<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                    ."<span aria-hidden='true'>&times;</span>"
                    ."</button>"
                    ."</div>";
            return $message;
        }
 
	}

	public function search_train($data){
		$array = array();

		$depart = $data["departures"];
		$dest = $data["destination"];
		$journey_date = $data["date"];

		$sql = "SELECT * FROM train WHERE depart='$depart' AND dest='$dest' AND journey_date='$journey_date'";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
     
        	while($row = $result->fetch_assoc()) {
        		$array[] = $row;
        	}
        return $array;
        }
	}

	public function booking($table,$data)
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

	public function cancellation($table,$ticket_number){

		$sql = "DELETE FROM ".$table." WHERE ticket_number='$ticket_number'";

    	if ($this->db->query($sql) == true) {
            return true;
        } else {
            return false;
        } 	
	}

	public function my_purchases($table,$email){
        $data = array();
		$sql = "SELECT * FROM ".$table." WHERE booked_by='$email'";
    	$result = $this->db->query($sql);
    	if ($result->num_rows > 0) {
  			while($row = $result->fetch_assoc()) {
    			$data[] = $row;
  			}
  			return $data;
		} else {
  			return false;
		}
		
	}
}
?>