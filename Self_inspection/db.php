<?php

require_once './include/config.php';

class DataBase extends Config {

    public function read_question() {
        
        $sql ="SELECT * FROM `inspect_question` ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function count_read_question() {
        
        $sql ="SELECT count(*) as total_question FROM `inspect_question` ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }

    public function insert($Name_of_Premise,$Department,$Dzongkhag,$Date_self_inspection,$Address,$Name,$BMHC_No,$Email,$Contact_Number,$Note,$self_check,$check_list,$type_of_premises,$Category_of_premises) {
        $sql = "INSERT INTO inspection_detail (Name_of_Premise,Department,Date_self_inspection,Dzongkhag,Name,Address,BMHC_No,Email,Contact_Number,Note,self_check,check_list,type_of_premises,Category_of_premises) 
        VALUES(:Name_of_Premise,:Department,:Date_self_inspection,:Dzongkhag,:Name,:Address,:BMHC_No,:Email,:Contact_Number,:Note,:self_check,:check_list,:type_of_premises,:Category_of_premises)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
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
            'check_list' => $check_list,
            'type_of_premises' => $type_of_premises,
            'Category_of_premises'=> $Category_of_premises,
        ]);
        return true;
    }
    
}

?>