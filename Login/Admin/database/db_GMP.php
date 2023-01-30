<?php

require_once './include/config_gmp.php';

class GmpInspection extends ConfigGmp {

    public function fetch_gmp_inspection(){

        $sql= "SELECT `Inspector`,count(*) as total_gmp_inspection FROM gmp_list GROUP BY `Inspector`";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results =  $stmt->fetchAll();
        $Inspector = [];
        $Number_firm = [];
        foreach ($results as $result) {
            array_push($Inspector, $result['Inspector']);
            array_push($Number_firm, $result['total_gmp_inspection']);
        }

        return [$Inspector,$Number_firm];
    }

    public function count_gmp_inspection(){

        $sql= "SELECT count(*) as number_gmp_inspection FROM `gmp_list` ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results =  $stmt->fetch();

        return $results;
    }

    public function count_inspectors(){

        $sql= "SELECT count(*) as number_inspectors FROM `inspector` ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results =  $stmt->fetch();

        return $results;
    }
    
}

?>