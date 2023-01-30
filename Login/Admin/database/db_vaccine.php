<?php

require_once './include/config_vaccine.php';

class Vaccine extends ConfigVaccine {

    public function fetch_vaccine(){

        $sql= "SELECT count(*) as total_vaccine FROM log_sheet ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results =  $stmt->fetch();

        return $results;
    }

    
}

?>