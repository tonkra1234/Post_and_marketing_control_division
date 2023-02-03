<?php

class ConfigVaccine {
    private const DBHOST = "localhost";
    private const DBUSER = "root";
    private const DBPASS = "";
    private const DBNAME = "vaccine_list";
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

class Vaccine extends ConfigVaccine {

    public function fetch_vaccine(){

        $sql= "SELECT count(*) as total_vaccine FROM log_sheet ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results =  $stmt->fetch();

        return $results;
    }

    public function fetch_trash_vaccine(){

        $sql= "SELECT * FROM trash ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();

        return $results;
    }

    public function count_trash_vaccine(){

        $sql= "SELECT count(*) as total_row_trash FROM trash ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetch();

        return $results;
    }

    public function delete_vaccine($id) {
        $sql = "DELETE FROM trash WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
        ]);
        return true;
    }

    public function retrieve_vaccine($id) {
        $sql = "INSERT INTO log_sheet SELECT * FROM trash WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
        ]);
        return true;
    }

    public function fetch_approval_vaccine(){

        $sql= "SELECT * FROM pre_approve ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();

        return $results;
    }

    public function count_approval_vaccine(){

        $sql= "SELECT count(*) as total_row_pre_approve FROM pre_approve ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetch();

        return $results;
    }

    public function approval_vaccine($Application_ID, $Product_Name,$Manufacturer , $Requesting_Agency, 
    $Date_Application, $Lot_Number, $Lot_Size, $Date_Manufacture,
    $Date_Expiry, $Storage_Condition, $Pharmaceutical_Form, $Presentation,
    $Diluent, $Diluent_Number, $SLP_Received, $Labels_Received,
    $Samples_Received, $Reviewer_Assigned, $Deadline_Assessment, $Certificate_Issue_Date,$Remarks) {
        $sql = "INSERT INTO log_sheet(Application_ID,Product_Name,Manufacturer,Requesting_Agency,Date_Application,Lot_Number,Lot_Size,Date_Manufacture,Date_Expiry,Storage_Condition,Pharmaceutical_Form,Presentation,Diluent,Diluent_Number,SLP_Received,Labels_Received,Samples_Received,Reviewer_Assigned,Deadline_Assessment,Certificate_Issue_Date,Remarks) VALUES(:Application_ID,:Product_Name,:Manufacturer,:Requesting_Agency,:Date_Application,:Lot_Number,:Lot_Size,:Date_Manufacture,:Date_Expiry,:Storage_Condition,:Pharmaceutical_Form,:Presentation,:Diluent,:Diluent_Number,:SLP_Received,:Labels_Received,:Samples_Received,:Reviewer_Assigned,:Deadline_Assessment,:Certificate_Issue_Date,:Remarks)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'Application_ID' => $Application_ID,
            'Product_Name' => $Product_Name,
            'Manufacturer' => $Manufacturer,
            'Requesting_Agency' => $Requesting_Agency,
            'Date_Application' => $Date_Application,
            'Lot_Number' => $Lot_Number,
            'Lot_Size' => $Lot_Size,
            'Date_Manufacture' => $Date_Manufacture,
            'Date_Expiry' => $Date_Expiry,
            'Storage_Condition' => $Storage_Condition,
            'Pharmaceutical_Form' => $Pharmaceutical_Form,
            'Presentation' => $Presentation,
            'Diluent' => $Diluent,
            'Diluent_Number' => $Diluent_Number,
            'SLP_Received' => $SLP_Received,
            'Labels_Received' => $Labels_Received,
            'Samples_Received' => $Samples_Received,
            'Reviewer_Assigned' => $Reviewer_Assigned,
            'Deadline_Assessment' => $Deadline_Assessment,
            'Certificate_Issue_Date' => $Certificate_Issue_Date,
            'Remarks' => $Remarks
        ]);

        return true;
    }

    public function reject_vaccine($id) {
        $sql = "DELETE FROM pre_approve WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
        ]);
        return true;
    }


    
}

?>