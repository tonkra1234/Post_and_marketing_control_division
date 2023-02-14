<?php

class ConfigSelf {
    private const DBHOST = "localhost";
    private const DBUSER = "root";
    private const DBPASS = "";
    private const DBNAME = "self_inspection";
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

    public function header() {
        $sql ="SELECT * FROM `header_report` ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetch();

        return $result;
    }

    public function edit_header_self_report($id,$Document_Number,$Effective_Date,$Review_Date,$Version) {
        $sql = "UPDATE `header_report` SET Document_Number=:Document_Number, Effective_Date=:Effective_Date,Review_Date=:Review_Date,`Version`=:Version WHERE id=:id";
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
 
}

?>
