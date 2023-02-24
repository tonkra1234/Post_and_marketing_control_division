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
        
        $sql ="SELECT * FROM premise_report_detail_grovern WHERE DATE(date_of_inspection) BETWEEN '2020-07-01' AND '2021-06-30' ORDER BY date_of_inspection DESC LIMIT $initial_page, $limit ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }
    public function fetch_table2021_p($initial_page,$limit) {
        
        $sql ="SELECT * FROM premise_report_detail_private WHERE DATE(date_of_inspection) BETWEEN '2020-07-01' AND '2021-06-30' ORDER BY date_of_inspection DESC LIMIT $initial_page, $limit";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function count_inspection_2021($type) {
        
        $sql ="SELECT COUNT(*) as sum FROM $type WHERE DATE(date_of_inspection) BETWEEN '2020-07-01' AND '2021-06-30'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function data_score_g($inspection_id) {
        
        $sql ="SELECT * FROM compliance_score_government WHERE `inspection_id` = '$inspection_id' ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetch();

        return $result;
    }

    public function Data_2021_g($inspection_id) {
        
        $sql ="SELECT * FROM premise_report_detail_grovern WHERE `inspection_id` = '$inspection_id' ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetch();

        return $result;
    }


    public function fetch_table2022_g($initial_page,$limit) {
        
        $sql ="SELECT * FROM premise_report_detail_grovern WHERE DATE(date_of_inspection) BETWEEN '2021-07-01' AND '2022-06-30' ORDER BY date_of_inspection DESC  LIMIT $initial_page, $limit ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function fetch_table2022_p($initial_page,$limit) {
        
        $sql ="SELECT * FROM premise_report_detail_private WHERE DATE(date_of_inspection) BETWEEN '2021-07-01' AND '2022-06-30' ORDER BY date_of_inspection DESC LIMIT $initial_page, $limit";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function count_inspection_2022($type) {
        
        $sql ="SELECT COUNT(*) as sum FROM $type WHERE DATE(date_of_inspection) BETWEEN '2021-07-01' AND '2022-06-30'";
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

    public function Question2023_p() {
        
        $sql ="SELECT * FROM question_p2023";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function Question2023_pCount() {
        
        $sql ="SELECT count(*) as number FROM question_p2023";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetch();

        return $result;
    }

    public function Question2023_g() {
        
        $sql ="SELECT * FROM question_g2023";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function Question2023_gCount() {
        
        $sql ="SELECT count(*) as number FROM question_g2023";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetch();

        return $result;
    }

    public function insert_g($inspec_id, $division, $today_date, $last_date, $type_inspect, $dzongkhag, $Pname, $type_premise, $address, 
    $premise_number, $premise_valid, $inspec_scope, $name, $email, $registration_Number, $person_valid, $contact, $contact_detail, $check_list,$GPS_position,$inspector_name) {
        $sql = "INSERT INTO government_detail2023 (inspection_id,division,date_of_inspection,date_of_last_inspection,type_of_inspection,dzongkhag,name_of_premise,type_of_premise,address_of_premise,scope_of_inspection,technical_authorization_no,validity_premise,competent_name,email_competent,cp_registration_no,validity_competent,conatct_number,other_contact,check_list,GPS_position,inspector_name,verify) 
        VALUES(:inspec_id,:division,:today_date,:last_date,:type_inspect,:dzongkhag,:Pname,:type_premise,:address,:inspec_scope,:premise_number,:premise_valid,:name,:email,:registration_Number,:person_valid,:contact,:contact_detail,:check_list,:GPS_position,:inspector_name,:verify)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'inspec_id' => $inspec_id,
            'division' => $division,
            'today_date' => $today_date,
            'last_date' => $last_date,
            'type_inspect' => $type_inspect,
            'Pname' => $Pname,
            'dzongkhag' => $dzongkhag,
            'type_premise' => $type_premise,
            'address' => $address,
            'premise_number' => $premise_number,
            'inspec_scope' => $inspec_scope,
            'premise_valid' => $premise_valid,
            'name' => $name,
            'email' => $email,
            'registration_Number' => $registration_Number,
            'person_valid' => $person_valid,
            'contact' => $contact,
            'contact_detail' => $contact_detail,
            'check_list' => $check_list,
            'GPS_position' => $GPS_position,
            'inspector_name' => $inspector_name,
            'verify' => 'Non-verified',
        ]);
        return true;
    }

    public function insert_p($inspec_id, $division, $today_date, $last_date, $type_inspect, $dzongkhag, $Pname, $type_premise, $address, 
    $premise_number, $premise_valid, $inspec_scope, $name, $email, $registration_Number, $person_valid, $contact, $contact_detail, $check_list,$GPS_position,$inspector_name) {
        $sql = "INSERT INTO private_detail2023 (inspection_id,division,date_of_inspection,date_of_last_inspection,type_of_inspection,dzongkhag,name_of_premise,type_of_premise,address_of_premise,scope_of_inspection,technical_authorization_no,validity_premise,competent_name,email_competent,cp_registration_no,validity_competent,conatct_number,other_contact,check_list,GPS_position,inspector_name,verify) 
        VALUES(:inspec_id,:division,:today_date,:last_date,:type_inspect,:dzongkhag,:Pname,:type_premise,:address,:inspec_scope,:premise_number,:premise_valid,:name,:email,:registration_Number,:person_valid,:contact,:contact_detail,:check_list,:GPS_position,:inspector_name,:verify)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'inspec_id' => $inspec_id,
            'division' => $division,
            'today_date' => $today_date,
            'last_date' => $last_date,
            'type_inspect' => $type_inspect,
            'Pname' => $Pname,
            'dzongkhag' => $dzongkhag,
            'type_premise' => $type_premise,
            'address' => $address,
            'premise_number' => $premise_number,
            'inspec_scope' => $inspec_scope,
            'premise_valid' => $premise_valid,
            'name' => $name,
            'email' => $email,
            'registration_Number' => $registration_Number,
            'person_valid' => $person_valid,
            'contact' => $contact,
            'contact_detail' => $contact_detail,
            'check_list' => $check_list,
            'GPS_position' => $GPS_position,
            'inspector_name' => $inspector_name,
            'verify' => 'Non-verified',
        ]);
        return true;
    }

    public function report2023_gNumber() {
        
        $sql ="SELECT AUTO_INCREMENT as next_id FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'inspection_check' AND TABLE_NAME = 'government_detail2023'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetch();

        return $result;
    }

    public function report2023_pNumber() {
        
        $sql ="SELECT AUTO_INCREMENT as next_id FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'inspection_check' AND TABLE_NAME = 'private_detail2023'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetch();

        return $result;
    }
    

    public function fetch_table2023_g($initial_page,$limit) {
        
        $sql ="SELECT * FROM government_detail2023 WHERE `date_of_inspection` BETWEEN '2022-07-01' AND '2023-06-30' ORDER BY `date_of_inspection` DESC LIMIT $initial_page, $limit ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }
    
    public function fetch_table2023_p($initial_page,$limit) {
        
        $sql ="SELECT * FROM private_detail2023 WHERE `date_of_inspection` BETWEEN '2022-07-01' AND '2023-06-30' ORDER BY `date_of_inspection` DESC LIMIT $initial_page, $limit";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function count_inspection_2023($type) {
        
        $sql ="SELECT COUNT(*) as sum FROM $type WHERE `date_of_inspection` BETWEEN '2022-07-01' AND '2023-06-30' ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetch();

        return $result;
    }

    public function fetch_report2023_g($inspection_id) {
    
        $sql ="SELECT * FROM government_detail2023 WHERE `inspection_id` = :inspection_id ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'inspection_id' => $inspection_id,
        ]);
        $result= $stmt->fetch();

        return $result;
    }
    
    public function fetch_report2023_p($inspection_id) {
        
        $sql ="SELECT * FROM private_detail2023 WHERE inspection_id = :inspection_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'inspection_id' => $inspection_id,
        ]);
        $result= $stmt->fetch();

        return $result;
    }

    public function delete_inspection_g($inspection_id) {
        $sql = "DELETE FROM government_detail2023 WHERE inspection_id=:inspection_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'inspection_id' => $inspection_id,
        ]);
        return true;
    }

    public function move_inspection_g($inspection_id) {
        $sql = "INSERT INTO trash_g SELECT * FROM government_detail2023 WHERE inspection_id=:inspection_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'inspection_id' => $inspection_id,
        ]);
        return true;
    }

    public function delete_inspection_p($inspection_id) {
        $sql = "DELETE FROM private_detail2023 WHERE inspection_id=:inspection_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'inspection_id' => $inspection_id,
        ]);
        return true;
    }

    public function move_inspection_p($inspection_id) {
        $sql = "INSERT INTO trash_p SELECT * FROM private_detail2023 WHERE inspection_id=:inspection_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'inspection_id' => $inspection_id,
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

    public function fetch_each_data_g($inspection_id) {
        
        $sql ="SELECT * FROM `government_detail2023` WHERE `inspection_id` = :inspection_id ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'inspection_id' => $inspection_id,
        ]);
        $result= $stmt->fetch();

        return $result;
    }

    public function fetch_each_data_p($inspection_id) {
        
        $sql ="SELECT * FROM `private_detail2023` WHERE `inspection_id` = :inspection_id ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'inspection_id' => $inspection_id,
        ]);
        $result= $stmt->fetch();

        return $result;
    }


    public function edit_g($id, $division, $today_date, $last_date, $type_inspect, $dzongkhag, $Pname, $type_premise, $address, 
    $premise_number, $premise_valid, $inspec_scope, $name, $email, $registration_Number, $person_valid, $contact, $contact_detail, $check_list,$inspector_name,$verify) {
        $sql = "UPDATE government_detail2023 SET division = :division,date_of_inspection = :today_date,date_of_last_inspection = :last_date,type_of_inspection = :type_inspect,dzongkhag =:dzongkhag,name_of_premise = :Pname,type_of_premise =:type_premise,address_of_premise =:address,scope_of_inspection =:inspec_scope,technical_authorization_no =:premise_number,validity_premise = :premise_valid,competent_name=:name,email_competent=:email,cp_registration_no=:registration_Number,validity_competent=:person_valid,conatct_number=:contact ,other_contact=:contact_detail,check_list=:check_list, inspector_name=:inspector_name,verify=:verify WHERE `id` = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
            'division' => $division,
            'today_date' => $today_date,
            'last_date' => $last_date,
            'type_inspect' => $type_inspect,
            'Pname' => $Pname,
            'dzongkhag' => $dzongkhag,
            'type_premise' => $type_premise,
            'address' => $address,
            'premise_number' => $premise_number,
            'inspec_scope' => $inspec_scope,
            'premise_valid' => $premise_valid,
            'name' => $name,
            'email' => $email,
            'registration_Number' => $registration_Number,
            'person_valid' => $person_valid,
            'contact' => $contact,
            'contact_detail' => $contact_detail,
            'check_list' => $check_list,
            'inspector_name' => $inspector_name,
            'verify' => $verify,
        ]);
        return true;
    }

    public function edit_p($id, $division, $today_date, $last_date, $type_inspect, $dzongkhag, $Pname, $type_premise, $address, 
    $premise_number, $premise_valid, $inspec_scope, $name, $email, $registration_Number, $person_valid, $contact, $contact_detail, $check_list,$inspector_name,$verify) {
        $sql = "UPDATE private_detail2023 SET division = :division,date_of_inspection = :today_date,date_of_last_inspection = :last_date,type_of_inspection = :type_inspect,dzongkhag =:dzongkhag,name_of_premise = :Pname,type_of_premise =:type_premise,address_of_premise =:address,scope_of_inspection =:inspec_scope,technical_authorization_no =:premise_number,validity_premise = :premise_valid,competent_name=:name,email_competent=:email,cp_registration_no=:registration_Number,validity_competent=:person_valid,conatct_number=:contact ,other_contact=:contact_detail,check_list=:check_list,inspector_name=:inspector_name,verify=:verify WHERE `id` = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
            'division' => $division,
            'today_date' => $today_date,
            'last_date' => $last_date,
            'type_inspect' => $type_inspect,
            'Pname' => $Pname,
            'dzongkhag' => $dzongkhag,
            'type_premise' => $type_premise,
            'address' => $address,
            'premise_number' => $premise_number,
            'inspec_scope' => $inspec_scope,
            'premise_valid' => $premise_valid,
            'name' => $name,
            'email' => $email,
            'registration_Number' => $registration_Number,
            'person_valid' => $person_valid,
            'contact' => $contact,
            'contact_detail' => $contact_detail,
            'check_list' => $check_list,
            'inspector_name' => $inspector_name,
            'verify' => $verify,
        ]);
        return true;
    }
    public function fetch_datalist($dzongkhag,$type) {
        
        $sql ="SELECT Facility_name FROM $type WHERE Dzongkhag=:dzongkhag ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'dzongkhag' => $dzongkhag,
        ]);
        $result= $stmt->fetchAll();

        return $result;
    }

    public function fetch_table2024_g($initial_page,$limit) {
        
        $sql ="SELECT * FROM government_detail2023 WHERE `date_of_inspection` BETWEEN '2023-07-01' AND '2024-06-30' ORDER BY `date_of_inspection` DESC LIMIT $initial_page, $limit ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }
    
    public function fetch_table2024_p($initial_page,$limit) {
        
        $sql ="SELECT * FROM private_detail2023 WHERE `date_of_inspection` BETWEEN '2023-07-01' AND '2024-06-30' ORDER BY `date_of_inspection` DESC LIMIT $initial_page, $limit";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function count_inspection_2024($type) {
        
        $sql ="SELECT COUNT(*) as sum FROM $type WHERE `date_of_inspection` BETWEEN '2023-07-01' AND '2024-06-30' ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetch();

        return $result;
    }

    public function fetch_table2025_g($initial_page,$limit) {
        
        $sql ="SELECT * FROM government_detail2023 WHERE `date_of_inspection` BETWEEN '2024-07-01' AND '2025-06-30' ORDER BY `date_of_inspection` DESC LIMIT $initial_page, $limit ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }
    
    public function fetch_table2025_p($initial_page,$limit) {
        
        $sql ="SELECT * FROM private_detail2023 WHERE `date_of_inspection` BETWEEN '2024-07-01' AND '2025-06-30' ORDER BY `date_of_inspection` DESC LIMIT $initial_page, $limit";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function count_inspection_2025($type) {
        
        $sql ="SELECT COUNT(*) as sum FROM $type WHERE `date_of_inspection` BETWEEN '2024-07-01' AND '2025-06-30' ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetch();

        return $result;
    }

}

?>