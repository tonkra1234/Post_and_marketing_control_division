<?php

class ConfigInspect {
    private const DBHOST = "localhost";
    private const DBUSER = "root";
    private const DBPASS = "";
    private const DBNAME = "inspection_check";
    private $dsn = "mysql:host=" . self::DBHOST . ";dbname=" . self::DBNAME . '';
    protected $conn = null;

    public function __construct() {
        try {
            $this->conn = new PDO($this->dsn, self::DBUSER, self::DBPASS);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
}

class Inspection extends ConfigInspect {

    public function fetch_trash_inspection_g(){

        $sql= "SELECT * FROM trash_g ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();

        return $results;
    }

    public function fetch_trash_inspection_p(){

        $sql= "SELECT * FROM trash_p ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();

        return $results;
    }


    public function delete_inspection_g($id) {
        $sql = "DELETE FROM trash_g WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
        ]);
        return true;
    }

    public function retrieve_inspection_g($id) {
        $sql = "INSERT INTO government_detail2023 SELECT * FROM trash_g WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
        ]);
        return true;
    }

    public function delete_inspection_p($id) {
        $sql = "DELETE FROM trash_p WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
        ]);
        return true;
    }

    public function retrieve_inspection_p($id) {
        $sql = "INSERT INTO private_detail2023 SELECT * FROM trash_p WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
        ]);
        return true;
    }

    public function fetch_question_g(){

        $sql= "SELECT * FROM question_g2023 ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();

        return $results;
    }

    public function fetch_question_p(){

        $sql= "SELECT * FROM question_p2023 ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();

        return $results;
    }

    public function insert_question_g($question,$level){

        $sql= "INSERT INTO question_g2023 (question,level) VALUES(:question,:level) ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'question'=>$question,
            'level' =>$level,
        ]);

        return true;
    }

    public function insert_question_p($question,$level){

        $sql= "INSERT INTO question_p2023 (question,level) VALUES(:question,:level) ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'question'=>$question,
            'level' =>$level,
        ]);

        return true;
    }

    public function delete_question_g($id) {
        $sql = "DELETE FROM question_g2023 WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
        ]);
        return true;
    }

    public function delete_question_p($id) {
        $sql = "DELETE FROM question_p2023 WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
        ]);
        return true;
    }

    public function edit_question_g($id,$question,$level) {
        $sql = "UPDATE question_g2023 SET question=:question, level=:level WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
            'question' => $question,
            'level' => $level
        ]);
        return true;
    }


    public function edit_question_p($id,$question,$level) {
        $sql = "UPDATE question_p2023 SET question=:question, level=:level WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
            'question' => $question,
            'level' => $level
        ]);
        return true;
    }

    public function header_g() {
        $sql ="SELECT * FROM `header_report_g` ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetch();

        return $result;
    }

    public function header_p() {
        $sql ="SELECT * FROM `header_report_p` ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetch();

        return $result;
    }

    public function edit_header_g_inspect_report($id,$Document_Number,$Effective_Date,$Review_Date,$Version) {
        $sql = "UPDATE `header_report_g` SET Document_Number=:Document_Number, Effective_Date=:Effective_Date,Review_Date=:Review_Date,`Version`=:Version WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
            'Document_Number' => $Document_Number,
            'Effective_Date' => $Effective_Date,
            'Review_Date' => $Review_Date,
            'Version' => $Version,
        ]);
        return true;
    }

    public function edit_header_p_inspect_report($id,$Document_Number,$Effective_Date,$Review_Date,$Version) {
        $sql = "UPDATE `header_report_p` SET Document_Number=:Document_Number, Effective_Date=:Effective_Date,Review_Date=:Review_Date,`Version`=:Version WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
            'Document_Number' => $Document_Number,
            'Effective_Date' => $Effective_Date,
            'Review_Date' => $Review_Date,
            'Version' => $Version,
        ]);
        return true;
    }

    public function fetch_facility_g_h() {
        $sql ="SELECT * FROM `government_premise_human` ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function fetch_facility_g_v() {
        $sql ="SELECT * FROM `government_premise_verterinary` ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function fetch_facility_p_h() {
        $sql ="SELECT * FROM `private_premise_human` ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function edit_facility_g_h($id,$Facility_name,$Dzongkhag) {
        $sql = "UPDATE `government_premise_human` SET Facility_name=:Facility_name, Dzongkhag=:Dzongkhag WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
            'Facility_name' => $Facility_name,
            'Dzongkhag' => $Dzongkhag,
        ]);
        return true;
    }

    public function edit_facility_g_v($id,$Facility_name,$Dzongkhag) {
        $sql = "UPDATE `government_premise_verterinary` SET Facility_name=:Facility_name, Dzongkhag=:Dzongkhag WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
            'Facility_name' => $Facility_name,
            'Dzongkhag' => $Dzongkhag,
        ]);
        return true;
    }

    public function edit_facility_p_h($id,$Facility_name,$Dzongkhag) {
        $sql = "UPDATE `private_premise_human` SET Facility_name=:Facility_name, Dzongkhag=:Dzongkhag WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
            'Facility_name' => $Facility_name,
            'Dzongkhag' => $Dzongkhag,
        ]);
        return true;
    }

    public function delete_government_facility($id,$type) {
        $sql = "DELETE FROM $type WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
        ]);
        return true;
    }

    public function insert_government_facility($Facility_name,$Dzongkhag,$type){

        $sql= "INSERT INTO $type (Facility_name,Dzongkhag) VALUES(:Facility_name,:Dzongkhag) ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'Facility_name'=>$Facility_name,
            'Dzongkhag' =>$Dzongkhag,
        ]);

        return true;
    }

    public function delete_private_facility($id) {
        $sql = "DELETE FROM `private_premise_human` WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
        ]);
        return true;
    }
    public function insert_private_facility($Facility_name,$Dzongkhag){

        $sql= "INSERT INTO `private_premise_human` (Facility_name,Dzongkhag) VALUES(:Facility_name,:Dzongkhag) ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'Facility_name'=>$Facility_name,
            'Dzongkhag' =>$Dzongkhag,
        ]);

        return true;
    }

}

?>