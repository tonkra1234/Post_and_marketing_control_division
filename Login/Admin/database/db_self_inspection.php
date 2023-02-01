<?php

require_once 'C:\xampp\htdocs\Post_and_marketing_control_division\Login\Admin\include\config_self_inspection.php';

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

    public function count_self_inspection_human(){

        $sql= "SELECT count(*) as number_self_inspection_human FROM `inspection_detail` WHERE type_of_premises = 'Human' ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results =  $stmt->fetch();

        return $results;
    }

    public function count_self_inspection_veterinary(){

        $sql= "SELECT count(*) as number_self_inspection_veterinary FROM `inspection_detail` WHERE type_of_premises = 'Veterinary' ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results =  $stmt->fetch();

        return $results;
    }

    public function fetch_question(){

        $sql= "SELECT *  FROM `inspect_question`";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results =  $stmt->fetchAll();

        return $results;
    }

    public function insert_question($question,$level){

        $sql= "INSERT INTO inspect_question(question,level) VALUES(:question,:level) ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'question'=>$question,
            'level' =>$level,
        ]);

        return true;
    }

    public function edit_question($id,$question,$level) {
        $sql = "UPDATE inspect_question SET question=:question, level=:level WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
            'question' => $question,
            'level' => $level
        ]);
        return true;
    }

    public function delete_question($id) {
        $sql = "DELETE FROM inspect_question WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
        ]);
        return true;
    }



    
}

?>
