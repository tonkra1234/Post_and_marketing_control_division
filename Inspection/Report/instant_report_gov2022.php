<?php
require "../fpdf/fpdf.php";
require '../db.php';
$db = new DataBase();

$inspection_id= (isset($_GET['inspection_id']))?$_GET['inspection_id']:'';
$id= (isset($_GET['id']))?$_GET['id']:'';

$data = $db->Data_2022_g($id);

$result_check = $db->Question_ans2022_g_report($inspection_id);

$pdf=new FPDF();
$pdf->AddPage('L');
  
$pdf->SetFont('Arial','',12);

$image1 = "../image/logo-original-removebg-preview.png";

// Header
$pdf->cell(30,30,$pdf->Image($image1, $pdf->GetX()+2, $pdf->GetY()+2, 25),1,0);
$pdf->cell(244,15,'Instant Inspection Report Form',1,2,'C');
$pdf->cell(61,7.5,'Document Number',1,0);
$pdf->cell(61,7.5,'Effective Date',1,0);
$pdf->cell(61,7.5,'Review Date',1,0);
$pdf->cell(61,7.5,'Version No.',1,1);
$pdf->SetX(40);
$pdf->cell(61,7.5,'DRA-F-D2-01-02',1,0);
$pdf->cell(61,7.5,'27-09-2022',1,0);
$pdf->cell(61,7.5,'27-09-2024',1,0);
$pdf->cell(61,7.5,'06',1,0);

// Information

// Inspection Detail
$pdf->Ln('25');
$pdf->SetFont('Arial','B',12);
$pdf->cell(274,10,'Inspection Detail',1,2,'C');
$pdf->SetFont('Arial','',12);
$pdf->cell(137,10,'Date of inspection: '.$data['date_of_inspection'],1,0,'L');
$pdf->cell(137,10,'Date of last inspection: '.$data['date_of__last_inspection'],1,1,'L');
$pdf->cell(274,10,'Type of inspection: '.$data['type_of_inspection'],1,2,'L');

// information of pharmacy
$pdf->SetFont('Arial','B',12);
$pdf->cell(274,10,'Information of pharmacy/premise',1,1,'C');
$pdf->SetFont('Arial','',12);
$pdf->cell(137,10,'Name of premise: '.$data['name_of_premise'],1,0,'L');
$pdf->cell(137,10,'Type of premise:'.$data['type_of_premise'],1,1,'L');
$pdf->cell(137,20,'Address of the premise: '.$data['address_of_premise'],1,0,'L');
$pdf->cell(137,10,'Technical Authorization No: '.$data['technical_authorization_no'],1,2,'L');
$pdf->cell(137,10,'Validity: '.$data['validity_premise'] ,1,1,'L');
$pdf->cell(274,10,'Scope of inspection: '.$data['scope_of_inspection'],1,2,'L');

// information of competent person
$pdf->SetFont('Arial','B',12);
$pdf->cell(274,10,'Information of competent person',1,1,'C');
$pdf->SetFont('Arial','',12);
$pdf->cell(137,10,'Name: '.$data['competent_name'] ,1,0,'L');
$pdf->cell(137,10,'Email: '.$data['email_competent'],1,1,'L');
$pdf->cell(137,10,'CP/BMHC Registration No: '.$data['cp_registration_no'],1,0,'L');
$pdf->cell(137,10,'Validity: '.$data['validity_competent'],1,1,'L');
$pdf->cell(137,10,'Contact number: '.$data['conatct_number'],1,0,'L');
$pdf->cell(137,10,'Other contact detail: '.$data['other_conatct'],1,0,'L');

$pdf->Ln();

$pdf->AddPage('L');

// observation report
$pdf->cell(137,10,'Observations and their classification (C-Critical M-Major O-Others)*',0,1,'L');
// header
$pdf->SetFont('Arial','B',12);
$pdf->cell(10,7,'S/N',1,0,'C');
$pdf->cell(245,7,'Obeservations',1,0,'C');
$pdf->cell(15,7,'C/M/O',1,1,'C');

$id = 1;
// details
$pdf->SetFont('Arial','',12);


$Arr =[];
$answer =[];
$level =[];

foreach ($result_check as $row){
    for ($i=1; $i < 44; $i++) { 
        if($row['question'.$i.'_ask'] === 'No'){
            array_push($Arr, $i);
        }
    }
};

if (empty($Arr)) {

    $pdf->cell(10,7,'1',1,0,'C');
    $pdf->cell(245,7,'All complies',1,0,'L');
    $pdf->cell(15,7,"C",1,1,'C');
}
else{
    $matches = implode(',', $Arr);
    $result_ans = $db->Match_question_g($matches);

    if(count($result_ans) > 0) {
        foreach($result_ans as $row) {
            array_push($answer, $row['question']);
            array_push($level, $row['level']);
        }  
    }


    for ($i=0; $i < count($answer) ; $i++) { 

        $pdf->cell(10,7,$i+1,1,0,'C');
        $pdf->cell(245,7,$answer[$i],1,0,'L');
        $pdf->cell(15,7,$level[$i],1,1,'C');
    }
}





$pdf->Ln('40');

// Signature
$pdf->cell(200,7,'Signature of CP with date',0,0,'L');
$pdf->cell(70,7,'Signature of Inspector with date',0,0,'L');

$pdf->Output();


?>