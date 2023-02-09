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

    
}

?>