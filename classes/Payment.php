<?php
/**
 * 
 */
class Payment extends DB
{

    public function user_pay($table, $data)  
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
		
}
?>