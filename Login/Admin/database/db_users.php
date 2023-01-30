<?php

require_once './include/config_users.php';

class DataBase extends Config {

    public function fetch_users(){

        $sql= " SELECT * FROM pmcd ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result =  $stmt->fetchAll();
        return $result;
    }
    
}

?>