<?php

require_once './include/config_recalled.php';

class RecalledProducts extends ConfigRecalled {

    public function fetch_recalled_products(){

        $sql= "SELECT count(*) as total_recalled_products FROM recalled_list ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results =  $stmt->fetch();

        return $results;
    }

    
}

?>