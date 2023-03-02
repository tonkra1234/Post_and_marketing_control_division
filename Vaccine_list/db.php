<?php

require_once './include/config.php';

class DataBase extends Config {

    public function paginator(){

        // variable to store number of rows per page
        $total_records_per_page = 15;   

        // update the active page number
        if (isset($_GET['page_no']) && $_GET['page_no']!="") {
            $page_no = $_GET['page_no'];
        } else {
            $page_no = 1;
        }

        // get the initial page number
        $offset = ($page_no-1) * $total_records_per_page;

        $sql_count ="SELECT COUNT(*) As total_records FROM `log_sheet`";
        $stmt = $this->conn->prepare($sql_count);
        $stmt->execute();
        $result_count= $stmt->fetch();

        $total_records = $result_count['total_records'];
        $total_no_of_pages = ceil($total_records / $total_records_per_page);
        return [$offset, $total_records_per_page,$total_records,$page_no,$total_no_of_pages];
    }

    public function read() {
        
        $paginators=$this->paginator();
        $offset = $paginators[0];
        $total_records_per_page = $paginators[1];
        $total_records = $paginators[2];
        $page_no = $paginators[3];
        $total_no_of_pages = $paginators[4];

        $sql ="SELECT * FROM `log_sheet` ORDER BY id DESC LIMIT $offset, $total_records_per_page ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();
        return [$result, $page_no,$total_no_of_pages,$total_records,$total_records_per_page];
    }

    public function insert($Application_ID, $Product_Name,$Manufacturer , $Requesting_Agency, 
                            $Date_Application, $Lot_Number, $Lot_Size, $Date_Manufacture,
                            $Date_Expiry, $Storage_Condition, $Pharmaceutical_Form, $Presentation,
                            $Diluent, $Diluent_Number, $SLP_Received, $Labels_Received,
                            $Samples_Received, $Reviewer_Assigned, $Deadline_Assessment, $Certificate_Issue_Date,$Remarks) {
        $sql = "INSERT INTO log_sheet (Application_ID,Product_Name,Manufacturer,Requesting_Agency,Date_Application,Lot_Number,Lot_Size,Date_Manufacture,Date_Expiry,Storage_Condition,Pharmaceutical_Form,Presentation,Diluent,Diluent_Number,SLP_Received,Labels_Received,Samples_Received,Reviewer_Assigned,Deadline_Assessment,Certificate_Issue_Date,Remarks) 
        VALUES(:Application_ID,:Product_Name,:Manufacturer,:Requesting_Agency,:Date_Application,:Lot_Number,:Lot_Size,:Date_Manufacture,:Date_Expiry,:Storage_Condition,:Pharmaceutical_Form,:Presentation,:Diluent,:Diluent_Number,:SLP_Received,:Labels_Received,:Samples_Received,:Reviewer_Assigned,:Deadline_Assessment,:Certificate_Issue_Date,:Remarks)";
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

    public function edit($id,$Application_ID, $Product_Name,$Manufacturer , $Requesting_Agency, 
    $Date_Application, $Lot_Number, $Lot_Size, $Date_Manufacture,
    $Date_Expiry, $Storage_Condition, $Pharmaceutical_Form, $Presentation,
    $Diluent, $Diluent_Number, $SLP_Received, $Labels_Received,
    $Samples_Received, $Reviewer_Assigned, $Deadline_Assessment, $Certificate_Issue_Date,$Remarks) {

        $sql = "UPDATE log_sheet SET Application_ID=:Application_ID, Product_Name=:Product_Name, Manufacturer=:Manufacturer, Requesting_Agency=:Requesting_Agency, Date_Application=:Date_Application, Lot_Number=:Lot_Number, Lot_Size=:Lot_Size, Date_Manufacture=:Date_Manufacture, Date_Expiry=:Date_Expiry, Storage_Condition=:Storage_Condition, Pharmaceutical_Form=:Pharmaceutical_Form, Presentation=:Presentation, Diluent=:Diluent, Diluent_Number=:Diluent_Number, SLP_Received=:SLP_Received, Labels_Received=:Labels_Received, Samples_Received=:Samples_Received, Reviewer_Assigned=:Reviewer_Assigned, Deadline_Assessment=:Deadline_Assessment, Certificate_Issue_Date=:Certificate_Issue_Date, Remarks=:Remarks WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
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

    public function delete_vaccine($id) {
        $sql = "DELETE FROM log_sheet WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
        ]);
        return true;
    }

    public function move_vaccine($id) {
        $sql = "INSERT INTO trash SELECT * FROM log_sheet WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
        ]);
        return true;
    }

    public function ChecklistB() {

        $sql ="SELECT * FROM `checklistb`  ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function ChecklistC() {

        $sql ="SELECT * FROM `checklistc`  ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();
        
        return $result;
    }

    public function insert_instruction($Manufacturer,$Type_vaccine,$Batch_no,$Date_Manufacture,$Date_Expiry,$Quantity,$Vial,$RegistrationNoEncode,$AuthorizationNoEncode,$checklistBEncode,$checklistCEncode) {
        $sql = "INSERT INTO work_instruction_list (RegistrationNo,AuthorizationNo,Type_vaccine,Batch_no,Date_Manufacture,Date_Expiry,Manufacturer,Quantity,Vial,checklistB,checklistC) 
        VALUES(:RegistrationNoEncode,:AuthorizationNoEncode,:Type_vaccine,:Batch_no,:Date_Manufacture,:Date_Expiry,:Manufacturer,:Quantity,:Vial,:checklistBEncode,:checklistCEncode)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'RegistrationNoEncode' => $RegistrationNoEncode,
            'AuthorizationNoEncode' => $AuthorizationNoEncode,
            'Type_vaccine' => $Type_vaccine,
            'Batch_no' => $Batch_no,
            'Date_Manufacture' => $Date_Manufacture,
            'Date_Expiry' => $Date_Expiry,
            'Manufacturer' => $Manufacturer,
            'Quantity' => $Quantity,
            'Vial' => $Vial,
            'checklistBEncode' => $checklistBEncode,
            'checklistCEncode' => $checklistCEncode,
        ]);
        return true;
    }

    public function fetch_instruction() {

        $sql ="SELECT * FROM `work_instruction_list`  ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function fetch_each_instruction($id) {

        $sql ="SELECT * FROM `work_instruction_list` WHERE id = :id ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
        ]);
        $result= $stmt->fetch();

        return $result;
    }

    public function edit_instruction($id,$Manufacturer,$Type_vaccine,$Batch_no,$Date_Manufacture,$Date_Expiry,$Quantity,$Vial,$RegistrationNoEncode,$AuthorizationNoEncode,$checklistBEncode,$checklistCEncode) {

        $sql = "UPDATE work_instruction_list SET RegistrationNo=:RegistrationNoEncode, AuthorizationNo=:AuthorizationNoEncode, Type_vaccine=:Type_vaccine, Batch_no=:Batch_no, Date_Manufacture=:Date_Manufacture, Date_Expiry=:Date_Expiry, Manufacturer=:Manufacturer, Quantity=:Quantity, Vial=:Vial, checklistB=:checklistBEncode, checklistC=:checklistCEncode WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
            'RegistrationNoEncode' => $RegistrationNoEncode,
            'AuthorizationNoEncode' => $AuthorizationNoEncode,
            'Type_vaccine' => $Type_vaccine,
            'Batch_no' => $Batch_no,
            'Date_Manufacture' => $Date_Manufacture,
            'Date_Expiry' => $Date_Expiry,
            'Manufacturer' => $Manufacturer,
            'Quantity' => $Quantity,
            'Vial' => $Vial,
            'checklistBEncode' => $checklistBEncode,
            'checklistCEncode' => $checklistCEncode,
        ]);
        
        return true;
         
    }

}

?>