<?php

require_once './include/config.php';

class DataBase extends Config {

    public function paginator(){

        // variable to store number of rows per page
        $total_records_per_page = 10;   

        // update the active page number
        if (isset($_GET['page_no']) && $_GET['page_no']!="") {
            $page_no = $_GET['page_no'];
        } else {
            $page_no = 1;
        }

        // get the initial page number
        $offset = ($page_no-1) * $total_records_per_page;

        $sql_count ="SELECT COUNT(*) As total_records FROM `inspection_detail`";
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

        $sql ="SELECT * FROM `inspection_detail` ORDER BY id DESC LIMIT $offset, $total_records_per_page ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();
        return [$result, $page_no,$total_no_of_pages,$total_records,$total_records_per_page];
    }

    public function read_question() {
        
        $sql ="SELECT * FROM `inspect_question` ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function read_detail($id) {
        
        $sql ="SELECT * FROM `inspection_detail` WHERE id = :id  ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id'=> $id]);
        $result= $stmt->fetch();

        return $result;
    }

    public function count_read_question() {
        
        $sql ="SELECT count(*) as total_question FROM `inspect_question` ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function edit($id, $Name_of_Premise,$Department,$Dzongkhag,$Date_self_inspection,$Address,$Name,$BMHC_No,$Email,$Contact_Number,$Note,$self_check,$check_list) {
        $sql = "UPDATE inspection_detail SET Name_of_Premise=:Name_of_Premise, Department=:Department, Dzongkhag=:Dzongkhag, Date_self_inspection=:Date_self_inspection, Address=:Address, Name=:Name, BMHC_No=:BMHC_No, Email=:Email, Contact_Number=:Contact_Number, Note=:Note, self_check=:self_check,check_list=:check_list WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
            'Name_of_Premise' => $Name_of_Premise,
            'Department' => $Department,
            'Dzongkhag' => $Dzongkhag,
            'Date_self_inspection' => $Date_self_inspection,
            'Address' => $Address,
            'Name' => $Name,
            'BMHC_No' => $BMHC_No,
            'Email' => $Email,
            'Contact_Number' => $Contact_Number,
            'Note' => $Note,
            'self_check' => $self_check,
            'check_list' => $check_list
        ]);
        return true;
    }

}

?>