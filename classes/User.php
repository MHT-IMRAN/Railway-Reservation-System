<?php

// use classes\connection as db;

class User extends DB implements Login
{
	public $name;
	public $phone;
	public $address;
	protected $email;
	protected $password;

	public function login($table,$credential){
		$email = $credential["email"];
		$password = $credential["password"];

		$sql = "SELECT email FROM ".$table." WHERE email = '$email' AND password = '$password' LIMIT 1";
		$result = $this->db->query($sql);
		if ($result->num_rows > 0) {
  			return "success";
		} else {
  			$message = "<div class='text-center alert alert-danger alert-dismissible fade show' role='alert'>"
                    ."<strong>Login failed!</strong> check email or password."
                    ."<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                    ."<span aria-hidden='true'>&times;</span>"
                    ."</button>"
                    ."</div>";
            return $message;
		}
	}
}

?>