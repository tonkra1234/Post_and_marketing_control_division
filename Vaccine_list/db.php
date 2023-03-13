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

    // public function insert_instruction($importing_country,$Lot_name,$Manufacturer,$Type_vaccine,$Batch_no,$Date_Manufacture,$Date_Expiry,$Quantity,$Vial,$RegistrationNoEncode,$AuthorizationNoEncode,$checklistBEncode,$checklistCEncode) {
    //     $sql = "INSERT INTO work_instruction_list (RegistrationNo,AuthorizationNo,Type_vaccine,Batch_no,Date_Manufacture,Date_Expiry,Manufacturer,Quantity,Vial,checklistB,checklistC,importing_country,lot_name,show_status) 
    //     VALUES(:RegistrationNoEncode,:AuthorizationNoEncode,:Type_vaccine,:Batch_no,:Date_Manufacture,:Date_Expiry,:Manufacturer,:Quantity,:Vial,:checklistBEncode,:checklistCEncode,:importing_country,:Lot_name,'Unverified')";
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->execute([
    //         'RegistrationNoEncode' => $RegistrationNoEncode,
    //         'AuthorizationNoEncode' => $AuthorizationNoEncode,
    //         'importing_country' => $importing_country,
    //         'Lot_name' => $Lot_name,
    //         'Type_vaccine' => $Type_vaccine,
    //         'Batch_no' => $Batch_no,
    //         'Date_Manufacture' => $Date_Manufacture,
    //         'Date_Expiry' => $Date_Expiry,
    //         'Manufacturer' => $Manufacturer,
    //         'Quantity' => $Quantity,
    //         'Vial' => $Vial,
    //         'checklistBEncode' => $checklistBEncode,
    //         'checklistCEncode' => $checklistCEncode,
    //     ]);
    //     return true;
    // }

    public function insert_vaccine($Remark,$Deadline_Assessment,$Reviewer_Assigned,$Samples_Received,$Labels_Received,$SLP_Received,$Diluent_Number,$Diluent,$Pharmaceutical_Form,$Certificate_Issue_Date,$Date_Application,$Storage_Condition,$Requesting_Agency,$Application_number,$importing_country,$Lot_name,$Manufacturer,$Type_vaccine,$Batch_no,$Date_Manufacture,$Date_Expiry,$Quantity,$Vial,$RegistrationNoEncode,$AuthorizationNoEncode,$checklistBEncode,$checklistCEncode) {
        $sql = "INSERT INTO vaccine_list(Application_number,RegistrationNo,AuthorizationNo,Type_vaccine,Batch_no,Date_Manufacture,Date_Expiry,Manufacturer,Quantity,Vial,checklistB,checklistC,importing_country,lot_name,Requesting_Agency,Storage_Condition,Date_Application,Certificate_Issue_Date,Pharmaceutical_Form,Diluent,Diluent_Number,SLP_Received,Labels_Received,Samples_Received,Reviewer_Assigned,Deadline_Assessment,Remark,show_status) 
        VALUES(:Application_number,:RegistrationNoEncode,:AuthorizationNoEncode,:Type_vaccine,:Batch_no,:Date_Manufacture,:Date_Expiry,:Manufacturer,:Quantity,:Vial,:checklistBEncode,:checklistCEncode,:importing_country,:Lot_name,:Requesting_Agency,:Storage_Condition,:Date_Application,:Certificate_Issue_Date,:Pharmaceutical_Form,:Diluent,:Diluent_Number,:SLP_Received,:Labels_Received,:Samples_Received,:Reviewer_Assigned,:Deadline_Assessment,:Remark,'Unverified')";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'RegistrationNoEncode' => $RegistrationNoEncode,
            'AuthorizationNoEncode' => $AuthorizationNoEncode,
            'importing_country' => $importing_country,
            'Lot_name' => $Lot_name,
            'Type_vaccine' => $Type_vaccine,
            'Batch_no' => $Batch_no,
            'Date_Manufacture' => $Date_Manufacture,
            'Date_Expiry' => $Date_Expiry,
            'Manufacturer' => $Manufacturer,
            'Quantity' => $Quantity,
            'Vial' => $Vial,
            'checklistBEncode' => $checklistBEncode,
            'checklistCEncode' => $checklistCEncode,
            'Application_number' => $Application_number,
            'Requesting_Agency' => $Requesting_Agency,
            'Storage_Condition' => $Storage_Condition,
            'Date_Application' => $Date_Application,
            'Certificate_Issue_Date' => $Certificate_Issue_Date,
            'Pharmaceutical_Form' => $Pharmaceutical_Form,
            'Diluent' => $Diluent,
            'Diluent_Number' => $Diluent_Number,
            'SLP_Received' => $SLP_Received,
            'Labels_Received' => $Labels_Received,
            'Samples_Received' => $Samples_Received,
            'Reviewer_Assigned' => $Reviewer_Assigned,
            'Deadline_Assessment' => $Deadline_Assessment,
            'Remark' => $Remark,
        ]);
        return true;
    }

    // public function fetch_instruction($offset,$total_records_per_page) {

    //     $sql ="SELECT * FROM `work_instruction_list` LIMIT $offset,$total_records_per_page ";
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->execute();
    //     $result= $stmt->fetchAll();

    //     return $result;
    // }

    // public function fetch_each_instruction($id) {

    //     $sql ="SELECT * FROM `work_instruction_list` WHERE id = :id ";
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->execute([
    //         'id' => $id,
    //     ]);
    //     $result= $stmt->fetch();

    //     return $result;
    // }

    public function fetch_instruction($offset,$total_records_per_page) {

        $sql ="SELECT * FROM `vaccine_list` LIMIT $offset,$total_records_per_page ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function fetch_instruction_search($offset,$total_records_per_page,$search_key) {

        $sql ="SELECT * FROM `vaccine_list` WHERE CONCAT(Application_number,lot_name,Requesting_Agency,importing_country,Manufacturer) LIKE '%$search_key%' LIMIT $offset,$total_records_per_page ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function fetch_instruction_public($offset,$total_records_per_page) {

        $sql ="SELECT * FROM `vaccine_list` WHERE show_status = 'Verified' LIMIT $offset,$total_records_per_page ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function fetch_instruction_search_public($offset,$total_records_per_page,$search_key) {

        $sql ="SELECT * FROM `vaccine_list` WHERE CONCAT(Application_number,lot_name,Requesting_Agency,importing_country,Manufacturer) LIKE '%$search_key%' AND show_status = 'Verified' LIMIT $offset,$total_records_per_page ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function fetch_each_instruction($id) {

        $sql ="SELECT * FROM `vaccine_list` WHERE id = :id ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
        ]);
        $result= $stmt->fetch();

        return $result;
    }

    // public function edit_instruction($show_status,$importing_country,$Lot_name,$id,$Manufacturer,$Type_vaccine,$Batch_no,$Date_Manufacture,$Date_Expiry,$Quantity,$Vial,$RegistrationNoEncode,$AuthorizationNoEncode,$checklistBEncode,$checklistCEncode) {

    //     $sql = "UPDATE work_instruction_list SET RegistrationNo=:RegistrationNoEncode, AuthorizationNo=:AuthorizationNoEncode, Type_vaccine=:Type_vaccine, Batch_no=:Batch_no, Date_Manufacture=:Date_Manufacture, Date_Expiry=:Date_Expiry, Manufacturer=:Manufacturer, Quantity=:Quantity, Vial=:Vial, checklistB=:checklistBEncode, checklistC=:checklistCEncode, importing_country=:importing_country,lot_name =:Lot_name,show_status=:show_status WHERE id=:id";
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->execute([
    //         'id' => $id,
    //         'RegistrationNoEncode' => $RegistrationNoEncode,
    //         'AuthorizationNoEncode' => $AuthorizationNoEncode,
    //         'show_status' => $show_status,
    //         'importing_country' => $importing_country,
    //         'Lot_name' => $Lot_name,
    //         'Type_vaccine' => $Type_vaccine,
    //         'Batch_no' => $Batch_no,
    //         'Date_Manufacture' => $Date_Manufacture,
    //         'Date_Expiry' => $Date_Expiry,
    //         'Manufacturer' => $Manufacturer,
    //         'Quantity' => $Quantity,
    //         'Vial' => $Vial,
    //         'checklistBEncode' => $checklistBEncode,
    //         'checklistCEncode' => $checklistCEncode,
    //     ]);
        
    //     return true;
         
    // }

    public function edit_vaccine($show_status,$id,$Remark,$Deadline_Assessment,$Reviewer_Assigned,$Samples_Received,$Labels_Received,$SLP_Received,$Diluent_Number,$Diluent,$Pharmaceutical_Form,$Certificate_Issue_Date,$Date_Application,$Storage_Condition,$Requesting_Agency,$Application_number,$importing_country,$Lot_name,$Manufacturer,$Type_vaccine,$Batch_no,$Date_Manufacture,$Date_Expiry,$Quantity,$Vial,$RegistrationNoEncode,$AuthorizationNoEncode,$checklistBEncode,$checklistCEncode) {

        $sql = "UPDATE vaccine_list SET RegistrationNo=:RegistrationNoEncode, AuthorizationNo=:AuthorizationNoEncode, Type_vaccine=:Type_vaccine, Batch_no=:Batch_no, Date_Manufacture=:Date_Manufacture, Date_Expiry=:Date_Expiry, Manufacturer=:Manufacturer, Quantity=:Quantity, Vial=:Vial, checklistB=:checklistBEncode, checklistC=:checklistCEncode, importing_country=:importing_country,lot_name =:Lot_name,show_status=:show_status,Remark=:Remark,Deadline_Assessment=:Deadline_Assessment,Reviewer_Assigned=:Reviewer_Assigned,Samples_Received=:Samples_Received,Labels_Received=:Labels_Received,SLP_Received=:SLP_Received,Diluent_Number=:Diluent_Number,Diluent=:Diluent,Pharmaceutical_Form=:Pharmaceutical_Form,Certificate_Issue_Date=:Certificate_Issue_Date,Date_Application=:Date_Application,Storage_Condition=:Storage_Condition,Requesting_Agency=:Requesting_Agency,Application_number=:Application_number WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
            'Application_number' => $Application_number,
            'RegistrationNoEncode' => $RegistrationNoEncode,
            'AuthorizationNoEncode' => $AuthorizationNoEncode,
            'show_status' => $show_status,
            'importing_country' => $importing_country,
            'Lot_name' => $Lot_name,
            'Type_vaccine' => $Type_vaccine,
            'Batch_no' => $Batch_no,
            'Date_Manufacture' => $Date_Manufacture,
            'Date_Expiry' => $Date_Expiry,
            'Manufacturer' => $Manufacturer,
            'Quantity' => $Quantity,
            'Vial' => $Vial,
            'checklistBEncode' => $checklistBEncode,
            'checklistCEncode' => $checklistCEncode,
            'Requesting_Agency' => $Requesting_Agency,
            'Storage_Condition' => $Storage_Condition,
            'Date_Application' => $Date_Application,
            'Certificate_Issue_Date' => $Certificate_Issue_Date,
            'Pharmaceutical_Form' => $Pharmaceutical_Form,
            'Diluent' => $Diluent,
            'Diluent_Number' => $Diluent_Number,
            'SLP_Received' => $SLP_Received,
            'Labels_Received' => $Labels_Received,
            'Samples_Received' => $Samples_Received,
            'Reviewer_Assigned' => $Reviewer_Assigned,
            'Deadline_Assessment' => $Deadline_Assessment,
            'Remark' => $Remark,
        ]);
        
        return true;
         
    }

    public function header_work() {
        
        $sql ="SELECT * FROM `working_instruction_header` ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetch();

        return $result;
    }

    public function header_cer() {
        
        $sql ="SELECT * FROM `certification_header` ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetch();

        return $result;
    }

    public function insert_plan($Premises_name,$Manufacturer,$Type_vaccine,$Proposed_Date,$Name_Vaccine,$Estimated_Cost,$Proposed_official) {
        $sql = "INSERT INTO plan_form_list (Premises_name,Manufacturer,Type_vaccine,Proposed_Date,Name_Vaccine,Estimated_Cost,Proposed_official) 
        VALUES(:Premises_name,:Manufacturer,:Type_vaccine,:Proposed_Date,:Name_Vaccine,:Estimated_Cost,:Proposed_official)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'Premises_name' => $Premises_name,
            'Proposed_Date' => $Proposed_Date,
            'Name_Vaccine' => $Name_Vaccine,
            'Estimated_Cost' => $Estimated_Cost,
            'Type_vaccine' => $Type_vaccine,
            'Proposed_official' => $Proposed_official,
            'Manufacturer' => $Manufacturer,
        ]);
        return true;
    }

    public function fetch_plan($offset,$total_records_per_page) {

        $sql ="SELECT * FROM `plan_form_list` LIMIT $offset,$total_records_per_page  ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function count_work_instruction() {
        
        $sql ="SELECT COUNT(*) as sum FROM vaccine_list ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetch();

        return $result;
    }

    public function count_work_instruction_search($search_key) {
        
        $sql ="SELECT COUNT(*) as sum FROM vaccine_list WHERE CONCAT(Application_number,lot_name,Requesting_Agency,importing_country,Manufacturer) LIKE '%$search_key%' ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetch();

        return $result;
    }

    public function count_work_instruction_public() {
        
        $sql ="SELECT COUNT(*) as sum FROM vaccine_list WHERE show_status = 'Verified' ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetch();

        return $result;
    }

    public function count_work_instruction_search_public($search_key) {
        
        $sql ="SELECT COUNT(*) as sum FROM vaccine_list WHERE CONCAT(Application_number,lot_name,Requesting_Agency,importing_country,Manufacturer) LIKE '%$search_key%' AND show_status = 'Verified' ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetch();

        return $result;
    }

    public function count_plan_form() {
        
        $sql ="SELECT COUNT(*) as sum FROM plan_form_list ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetch();

        return $result;
    }

    public function fetch_each_plan($id) {

        $sql ="SELECT * FROM `plan_form_list` WHERE id = :id ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
        ]);
        $result= $stmt->fetch();

        return $result;
    }

    public function edit_plan($id,$Premises_name,$Manufacturer,$Type_vaccine,$Proposed_Date,$Name_Vaccine,$Estimated_Cost,$Proposed_official) {

        $sql = "UPDATE plan_form_list SET Premises_name=:Premises_name,Manufacturer=:Manufacturer,Type_vaccine=:Type_vaccine,Proposed_Date=:Proposed_Date,Name_Vaccine=:Name_Vaccine,Estimated_Cost=:Estimated_Cost,Proposed_official=:Proposed_official WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
            'Premises_name' => $Premises_name,
            'Proposed_Date' => $Proposed_Date,
            'Name_Vaccine' => $Name_Vaccine,
            'Estimated_Cost' => $Estimated_Cost,
            'Type_vaccine' => $Type_vaccine,
            'Proposed_official' => $Proposed_official,
            'Manufacturer' => $Manufacturer,
        ]);
        
        return true;
         
    }
}

?>