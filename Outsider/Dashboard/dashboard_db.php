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

    public function result_year_now_g() {
        
        $sql ="SELECT date_format(date_of_inspection,'%Y') as Year,COUNT(id) as Sum from government_detail2023 group by year(date_of_inspection) order by year(date_of_inspection) ";
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

    public function Year_data_private_now() {
        
        $sql ="SELECT date_format(date_of_inspection,'%Y') as Year,COUNT(id) as Sum from private_detail2023 group by year(date_of_inspection) order by year(date_of_inspection)";
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

    public function result_check_g_h_now() {
        
        $sql ="SELECT * FROM government_detail2023 WHERE NOT `type_of_premise` IN ('Veterinary Hospital', 'Renewable Natural Resources Extension center', 'Livestock Extension Center') AND date_of_inspection BETWEEN '2023-01-01' AND '2023-12-31'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function result_check_g_v_now() {
        
        $sql ="SELECT * FROM government_detail2023 WHERE `type_of_premise` IN ('Veterinary Hospital', 'Renewable Natural Resources Extension center', 'Livestock Extension Center') AND date_of_inspection BETWEEN '2023-01-01' AND '2023-12-31'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function result_check_g_h_2024() {
        
        $sql ="SELECT * FROM government_detail2023 WHERE NOT `type_of_premise` IN ('Veterinary Hospital', 'Renewable Natural Resources Extension center', 'Livestock Extension Center') AND date_of_inspection BETWEEN '2024-01-01' AND '2024-12-31'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function result_check_g_v_2024() {
        
        $sql ="SELECT * FROM government_detail2023 WHERE `type_of_premise` IN ('Veterinary Hospital', 'Renewable Natural Resources Extension center', 'Livestock Extension Center') AND date_of_inspection BETWEEN '2024-01-01' AND '2024-12-31'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function result_check_p_now() {
        
        $sql ="SELECT * FROM private_detail2023 WHERE date_of_inspection BETWEEN '2023-01-01' AND '2023-12-31'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function result_check_p_2024() {
        
        $sql ="SELECT * FROM private_detail2023 WHERE date_of_inspection BETWEEN '2024-01-01' AND '2024-12-31'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function result_financial_2020_g() {
    
        $sql ="SELECT date_format(date_of_inspection,'%Y') as Year,COUNT(id) as Sum from premise_report_detail_grovern WHERE `date_of_inspection` BETWEEN '2020-01-01' AND '2021-06-30' group by year(date_of_inspection) order by year(date_of_inspection) ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function result_financial_2021_g() {
    
        $sql ="SELECT date_format(date_of_inspection,'%Y') as Year,COUNT(id) as Sum from premise_report_detail_grovern WHERE `date_of_inspection` BETWEEN '2021-07-01' AND '2022-06-30' group by year(date_of_inspection) order by year(date_of_inspection) ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function result_financial_2022_g_1() {
    
        $sql ="SELECT date_format(date_of_inspection,'%Y') as Year,COUNT(id) as Sum from premise_report_detail_grovern WHERE `date_of_inspection` BETWEEN '2022-07-01' AND '2022-12-31' group by year(date_of_inspection) order by year(date_of_inspection) ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function result_financial_2022_g_2() {
    
        $sql ="SELECT COUNT(*) as Sum from `government_detail2023` WHERE `date_of_inspection` BETWEEN '2023-01-01' AND '2023-06-30' ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetch();

        return $result;
    }

    public function result_financial_2023_g() {
    
        $sql ="SELECT COUNT(*) as Sum from `government_detail2023` WHERE `date_of_inspection` BETWEEN '2023-07-01' AND '2024-06-30' ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetch();

        return $result;
    }

    public function result_financial_2024_g() {
    
        $sql ="SELECT COUNT(*) as Sum from `government_detail2023` WHERE `date_of_inspection` BETWEEN '2024-07-01' AND '2025-06-30' ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetch();

        return $result;
    }

    public function result_financial_2020_p() {
    
        $sql ="SELECT date_format(date_of_inspection,'%Y') as Year,COUNT(id) as Sum from premise_report_detail_private WHERE `date_of_inspection` BETWEEN '2020-01-01' AND '2021-06-30' group by year(date_of_inspection) order by year(date_of_inspection) ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function result_financial_2021_p() {
    
        $sql ="SELECT date_format(date_of_inspection,'%Y') as Year,COUNT(id) as Sum from premise_report_detail_private WHERE `date_of_inspection` BETWEEN '2021-07-01' AND '2022-06-30' group by year(date_of_inspection) order by year(date_of_inspection) ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function result_financial_2022_p_1() {
    
        $sql ="SELECT date_format(date_of_inspection,'%Y') as Year,COUNT(id) as Sum from premise_report_detail_private WHERE `date_of_inspection` BETWEEN '2022-07-01' AND '2022-12-31' group by year(date_of_inspection) order by year(date_of_inspection) ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function result_financial_2022_p_2() {
    
        $sql ="SELECT COUNT(*) as Sum from `private_detail2023` WHERE `date_of_inspection` BETWEEN '2023-01-01' AND '2023-06-30' ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetch();

        return $result;
    }

    public function result_financial_2023_p() {
    
        $sql ="SELECT COUNT(*) as Sum from `private_detail2023` WHERE `date_of_inspection` BETWEEN '2023-07-01' AND '2024-06-30' ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetch();

        return $result;
    }

    public function result_financial_2024_p() {
    
        $sql ="SELECT COUNT(*) as Sum from `private_detail2023` WHERE `date_of_inspection` BETWEEN '2024-07-01' AND '2025-06-30' ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetch();

        return $result;
    }

    
    
    
}

?>