<?php

require_once 'C:\xampp\htdocs\Post_and_marketing_control_division\Login\Admin\include\config_gmp.php';

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

    public function inspectors(){

        $sql= "SELECT * FROM `inspector` ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results =  $stmt->fetchAll();

        return $results;
    }

    public function insert_inspectors($name,$division,$Avatar){

        $sql= "INSERT INTO inspector(name,Division,picture) VALUES(:name,:division,:picture) ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'name'=>$name,
            'division' =>$division,
            'picture' => $Avatar
        ]);

        return true;
    }

    public function edit_inspectors($id,$Inspector_name,$Division,$Avatar) {
        $sql = "UPDATE inspector SET name=:Inspector_name, Division=:Division, picture=:Avatar WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
            'Inspector_name' => $Inspector_name,
            'Division' => $Division,
            'Avatar' => $Avatar,
        ]);
        return true;
    }

    public function delete_inspectors($id) {
        $sql = "DELETE FROM inspector WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
        ]);
        return true;
    }
    
}

?>