<?php

require_once './include/config.php';

class DataBase extends Config {

    public function read() {
        
        $sql ="SELECT * FROM `gmp_list` ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function read_inspector() {
        
        $sql ="SELECT * FROM `inspector` ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function read_detail($inspector) {
        
        $sql ="SELECT * FROM `gmp_list` WHERE Inspector = '$inspector' ORDER BY Date_inspection DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function count_inspection($inspector) {
        
        $sql ="SELECT count(*) as number_inspection FROM `gmp_list` WHERE Inspector = '$inspector'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }


    public function insert($Firm_inspection, $Inspector_name ,$Division , $Country, $Sales_and_Distribution, $Blood_product, $Date_inspection) {
        $sql = "INSERT INTO gmp_list (Inspector,Division,Sales_and_Distribution,Firm_inspection,Country,Date_inspection,Blood_product) 
        VALUES(:Inspector,:Division,:Sales_and_Distribution,:Firm_inspection,:Country,:Date_inspection,:Blood_product)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'Firm_inspection' => $Firm_inspection,
            'Inspector' => $Inspector_name,
            'Division' => $Division,
            'Country' => $Country,
            'Sales_and_Distribution' => $Sales_and_Distribution,
            'Blood_product' => $Blood_product,
            'Date_inspection' => $Date_inspection
        ]);
        return true;
    }

    public function edit($id, $Firm_inspection, $Inspector_name ,$Division , $Country, $Sales_and_Distribution, $Blood_product,  $Date_inspection) {
        $sql = "UPDATE gmp_list SET Firm_inspection=:Firm_inspection, Inspector=:Inspector, Division=:Division, Country=:Country, Sales_and_Distribution=:Sales_and_Distribution, Blood_product=:Blood_product, Date_inspection=:Date_inspection WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
            'Firm_inspection' => $Firm_inspection,
            'Inspector' => $Inspector_name,
            'Division' => $Division,
            'Country' => $Country,
            'Sales_and_Distribution' => $Sales_and_Distribution,
            'Blood_product' => $Blood_product,
            'Date_inspection' => $Date_inspection
        ]);
        return true;
    }

    
}

?>