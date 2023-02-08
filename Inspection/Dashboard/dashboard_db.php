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

class Dashboard extends Config {

    public function result_dzongkhag($type, $number,$Dzongkhag) {
        
        $sql ="SELECT * FROM $type WHERE Dzongkhag = '$Dzongkhag[$number]' ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function result_month() {
        
        $sql ="SELECT date_format(date_of_inspection,'%M') as Month,date_format(date_of_inspection,'%Y') as Year, date_format(date_of_inspection,'%M-%Y') as Monthyear, COUNT(id) as sum from premise_report_detail_grovern group by year(date_of_inspection),month(date_of_inspection) order by year(date_of_inspection),month(date_of_inspection) ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function result_year() {
        
        $sql ="SELECT date_format(date_of_inspection,'%Y') as Year,COUNT(id) as Sum from premise_report_detail_grovern group by year(date_of_inspection) order by year(date_of_inspection) ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function Year_data_private() {
        
        $sql ="SELECT date_format(date_of_inspection,'%Y') as Year,COUNT(id) as Sum from premise_report_detail_private group by year(date_of_inspection) order by year(date_of_inspection)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function Human_premises_govern() {
        
        $sql ="SELECT Dzongkhag,COUNT(id) as sum from government_premise_human group by Dzongkhag order by Dzongkhag";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function Human_premises_private() {
        
        $sql ="SELECT Dzongkhag,COUNT(id) as sum from private_premise_human group by Dzongkhag order by Dzongkhag";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function Human_premises_veterinary() {
        
        $sql ="SELECT Dzongkhag,COUNT(id) as sum from government_premise_verterinary group by Dzongkhag order by Dzongkhag";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function result_check() {
        
        $sql ="SELECT * FROM report_government";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function result_count_array() {
        
        $sql ="SELECT count(*) as sum FROM report_government";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function result_check_pri() {
        
        $sql ="SELECT * FROM report_private";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function result_count_array_pri() {
        
        $sql ="SELECT count(*) as sum FROM report_private";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }
    
    
}

?>