<?php

class Config {
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

class DataBase extends Config {

    public function fetch_table2021_g($initial_page,$limit) {
        
        $sql ="SELECT * FROM premise_report_detail_grovern WHERE DATE(date_of_inspection) BETWEEN '2020-07-01' AND '2022-06-30' LIMIT $initial_page, $limit ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }
    public function fetch_table2021_p($initial_page,$limit) {
        
        $sql ="SELECT * FROM premise_report_detail_private WHERE DATE(date_of_inspection) BETWEEN '2020-07-01' AND '2022-06-30' LIMIT $initial_page, $limit";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function count_inspection_2021($type) {
        
        $sql ="SELECT COUNT(*) as sum FROM $type WHERE DATE(date_of_inspection) BETWEEN '2020-07-01' AND '2022-06-30'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function data_score_g($id) {
        
        $sql ="SELECT * FROM compliance_score_government WHERE `id` = $id ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetch();

        return $result;
    }

    public function Data_2021_g($id) {
        
        $sql ="SELECT * FROM premise_report_detail_grovern WHERE `id` = $id ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetch();

        return $result;
    }


    public function fetch_table2022_g($initial_page,$limit) {
        
        $sql ="SELECT * FROM premise_report_detail_grovern WHERE DATE(date_of_inspection) BETWEEN '2022-07-01' AND '2022-12-12' LIMIT $initial_page, $limit ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }
    public function fetch_table2022_p($initial_page,$limit) {
        
        $sql ="SELECT * FROM premise_report_detail_private WHERE DATE(date_of_inspection) BETWEEN '2022-07-01' AND '2022-12-12' LIMIT $initial_page, $limit";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function count_inspection_2022($type) {
        
        $sql ="SELECT COUNT(*) as sum FROM $type WHERE DATE(date_of_inspection) BETWEEN '2022-07-01' AND '2022-12-12'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function data_score_p($id) {
        
        $sql ="SELECT * FROM compliance_score_private WHERE `id` = $id ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetch();

        return $result;
    }

    public function Data_2021_p($id) {
        
        $sql ="SELECT * FROM premise_report_detail_private WHERE `id` = $id ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetch();

        return $result;
    }

    public function dataTwo_score_g($id) {
        
        $sql ="SELECT * FROM compliance_score_government WHERE `id` = $id ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetch();

        return $result;
    }

    public function Data_2022_g($id) {
        
        $sql ="SELECT * FROM premise_report_detail_grovern WHERE `id` = $id ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetch();

        return $result;
    }
    
    public function Question2022_g() {
        
        $sql ="SELECT * FROM question_government";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function Question_ans2022_g($inspection_id) {
        
        $sql ="SELECT * FROM report_government WHERE inspection_id='$inspection_id'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetch();

        return $result;
    }

    public function Data_2022_p($id) {
        
        $sql ="SELECT * FROM premise_report_detail_private WHERE `id` = $id ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetch();

        return $result;
    }

    public function Question_ans2022_p($inspection_id) {
        
        $sql ="SELECT * FROM report_private WHERE inspection_id='$inspection_id'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetch();

        return $result;
    }

    public function Question2022_p() {
        
        $sql ="SELECT * FROM question_private";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function Match_question_g($matches) {
        
        $sql ="SELECT * FROM question_government WHERE id IN ($matches)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function Question_ans2022_g_report($inspection_id) {
        
        $sql ="SELECT * FROM report_government WHERE inspection_id='$inspection_id'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function Question_ans2022_p_report($inspection_id) {
        
        $sql ="SELECT * FROM report_private WHERE inspection_id='$inspection_id'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function Match_question_p($matches) {
        
        $sql ="SELECT * FROM question_private WHERE id IN ($matches)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }
    
}

?>