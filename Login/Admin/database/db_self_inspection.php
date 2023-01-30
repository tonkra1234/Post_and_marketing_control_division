<?php

require_once './include/config_self_inspection.php';

class SelfInspection extends ConfigSelf {

    public function fetch_self_inspection(){

        $sql= "SELECT Dzongkhag,count(*) as total_self_inspection FROM `inspection_detail` GROUP BY Dzongkhag;";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results =  $stmt->fetchAll();
        $Dzongkhag = [];
        $Number_of_inspection = [];
        foreach ($results as $result) {
            array_push($Dzongkhag, $result['Dzongkhag']);
            array_push($Number_of_inspection, $result['total_self_inspection']);
        }

        return [$Dzongkhag,$Number_of_inspection];
    }

    public function count_self_inspection(){

        $sql= "SELECT count(*) as number_self_inspection FROM `inspection_detail` ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results =  $stmt->fetch();

        return $results;
    }

    
}

?>
