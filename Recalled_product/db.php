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

        $sql_count ="SELECT COUNT(*) As total_records FROM `recalled_list`";
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

        $sql ="SELECT * FROM `recalled_list` ORDER BY id DESC LIMIT $offset, $total_records_per_page ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();
        return [$result, $page_no,$total_no_of_pages,$total_records,$total_records_per_page];
    }


    public function insert($Generic_name, $Brand_name ,$Batch_No , $Manufacturer, $MAH, $Mode_of_registration, $Class_of_medicines,$Class_of_recall,$Level_of_Recall,$Reason_for_recall,$Date_of_recall) {
        $sql = "INSERT INTO recalled_list (Brand_name,Batch_No,MAH,Generic_name,Manufacturer,Class_of_medicines,Mode_of_registration,Class_of_recall,Level_of_Recall,Reason_for_recall,Date_of_recall) 
        VALUES(:Brand_name,:Batch_No,:MAH,:Generic_name,:Manufacturer,:Class_of_medicines,:Mode_of_registration,:Class_of_recall,:Level_of_Recall,:Reason_for_recall,:Date_of_recall)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'Generic_name' => $Generic_name,
            'Brand_name' => $Brand_name,
            'Batch_No' => $Batch_No,
            'Manufacturer' => $Manufacturer,
            'MAH' => $MAH,
            'Mode_of_registration' => $Mode_of_registration,
            'Class_of_medicines' => $Class_of_medicines,
            'Class_of_recall' => $Class_of_recall,
            'Level_of_Recall' => $Level_of_Recall,
            'Reason_for_recall' => $Reason_for_recall,
            'Date_of_recall' => $Date_of_recall
        ]);
        return true;
    }

    public function edit($id, $Generic_name, $Brand_name ,$Batch_No , $Manufacturer, $MAH, $Mode_of_registration, $Class_of_medicines,$Class_of_recall,$Level_of_Recall,$Reason_for_recall,$Date_of_recall) {
        $sql = "UPDATE recalled_list SET Generic_name=:Generic_name, Brand_name=:Brand_name, Batch_No=:Batch_No, Manufacturer=:Manufacturer, MAH=:MAH, Mode_of_registration=:Mode_of_registration, Class_of_medicines=:Class_of_medicines, Class_of_recall=:Class_of_recall, Level_of_Recall=:Level_of_Recall, Reason_for_recall=:Reason_for_recall, Date_of_recall=:Date_of_recall WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
            'Generic_name' => $Generic_name,
            'Brand_name' => $Brand_name,
            'Batch_No' => $Batch_No,
            'Manufacturer' => $Manufacturer,
            'MAH' => $MAH,
            'Mode_of_registration' => $Mode_of_registration,
            'Class_of_medicines' => $Class_of_medicines,
            'Class_of_recall' => $Class_of_recall,
            'Level_of_Recall' => $Level_of_Recall,
            'Reason_for_recall' => $Reason_for_recall,
            'Date_of_recall' => $Date_of_recall
        ]);
        return true;
    }

    public function read_one($id) {
        
        $sql ="SELECT * FROM `recalled_list` WHERE id = :id ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id'=>$id]);
        $result= $stmt->fetch();

        return $result;
    }

    
}

?>