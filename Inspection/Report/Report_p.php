<?php
require "../fpdf/fpdf.php";
require '../db.php';
$db = new DataBase();

$inspection_id= (isset($_GET['inspection_id']))?$_GET['inspection_id']:'';
$header = $db->header_p();

$result = $db->fetch_report2023_p($inspection_id);

$pdf=new FPDF();
$pdf->SetTitle($result['inspection_id']);
$pdf->AddPage('L');
  
$pdf->SetFont('Arial','B',12);

$image1 = "../image/logo-original-removebg-preview.png";

// Header
$pdf->cell(30,30,$pdf->Image($image1, $pdf->GetX()+2, $pdf->GetY()+2, 25),1,0);
$pdf->cell(244,15,'Instant Inspection Report Form',1,2,'C');
$pdf->SetFont('Arial','',12);
$pdf->cell(61,7.5,'Document Number',1,0);
$pdf->cell(61,7.5,'Effective Date',1,0);
$pdf->cell(61,7.5,'Review Date',1,0);
$pdf->cell(61,7.5,'Version No.',1,1);
$pdf->SetX(40);
$pdf->cell(61,7.5,$header['Document_Number'],1,0);
$pdf->cell(61,7.5,$header['Effective_Date'],1,0);
$pdf->cell(61,7.5,$header['Review_Date'],1,0);
$pdf->cell(61,7.5,$header['Version'],1,0);

// Information

// Inspection Detail
$pdf->Ln('25');
$pdf->SetFont('Arial','B',12);
$pdf->cell(274,10,'Inspection Detail',1,2,'C');
$pdf->SetFont('Arial','',12);
$pdf->cell(137,10,'Date of inspection: '.$result['date_of_inspection'],1,0,'L');
$pdf->cell(137,10,'Date of last inspection: '.$result['date_of_last_inspection'],1,1,'L');
$pdf->cell(274,10,'Type of inspection: '.$result['type_of_inspection'],1,2,'L');

// information of pharmacy
$pdf->SetFont('Arial','B',12);
$pdf->cell(274,10,'Information of pharmacy/premise',1,1,'C');
$pdf->SetFont('Arial','',12);
$pdf->cell(137,10,'Name of premise: '.$result['name_of_premise'],1,0,'L');
$pdf->cell(137,10,'Type of premise:'.$result['type_of_premise'],1,1,'L');
$pdf->cell(137,20,'Address of the premise: '.$result['address_of_premise'],1,0,'L');
$pdf->cell(137,10,'Technical Authorization No: '.$result['technical_authorization_no'],1,2,'L');
$pdf->cell(137,10,'Validity: '.$result['validity_premise'] ,1,1,'L');
$pdf->cell(274,10,'Scope of inspection: '.$result['scope_of_inspection'],1,2,'L');

// information of competent person
$pdf->SetFont('Arial','B',12);
$pdf->cell(274,10,'Information of competent person',1,1,'C');
$pdf->SetFont('Arial','',12);
$pdf->cell(137,10,'Name: '.$result['competent_name'] ,1,0,'L');
$pdf->cell(137,10,'Email: '.$result['email_competent'],1,1,'L');
$pdf->cell(137,10,'CP/BMHC Registration No: '.$result['cp_registration_no'],1,0,'L');
$pdf->cell(137,10,'Validity: '.$result['validity_competent'],1,1,'L');
$pdf->cell(137,10,'Contact number: '.$result['conatct_number'],1,0,'L');
$pdf->cell(137,10,'Other contact detail: '.$result['other_contact'],1,0,'L');

$pdf->Ln();

$pdf->AddPage('L');

// observation report
$pdf->cell(137,10,'Observations and their classification (C-Critical M-Major O-Others)*',0,1,'L');
// header
$pdf->SetFont('Arial','B',12);
$pdf->cell(10,7,'S/N',1,0,'C');
$pdf->cell(200,7,'Obeservations',1,0,'C');
$pdf->cell(15,7,'C/M/O',1,0,'C');
$pdf->cell(45,7,'Unit',1,1,'C');

$id = 1;
// details
$pdf->SetFont('Arial','',12);

$check_list = json_decode($result['check_list']);

$Questions = [];

foreach ($check_list as $row){
    if($row[0] === 'No' || $row[0] === 'NA'){
        $No_ans = [];
        array_push($No_ans, $row[2]); // question
        array_push($No_ans, $row[3]); // level
        array_push($No_ans, $row[1]); // unit
        array_push($Questions, $No_ans);
    }
};

if (empty($Questions)) {

    $pdf->cell(10,7,'1',1,0,'C');
    $pdf->cell(200,7,'All complies',1,0,'L');
    $pdf->cell(15,7,"C",1,0,'C');
    $pdf->cell(45,7,'',1,1,'L');
}
else{
    $No = 1;
    foreach ($Questions as $Question) { 
        $pdf->cell(10,7,$No,1,0,'C');
        $pdf->cell(200,7,$Question[0],1,0,'L');
        $pdf->cell(15,7,$Question[1],1,0,'C');
        $pdf->Multicell(45,7,htmlspecialchars_decode($Question[2]),1,1);
        $No++;
    }
}



$pdf->Ln('10');

// Signature
$pdf->cell(137,7,'Inspection conducted by (Name and Signature)',0,1,'L');
$pdf->cell(137,25,'',0,1,'L');
$pdf->cell(137,7,'Verify by In-charge, ',1,0,'L');
$pdf->cell(137,7,'Approved by Chief, ',1,1,'L');
$pdf->cell(137,25,'',1,0,'L');
$pdf->cell(137,25,'',1,1,'L');


$pdf->Output('I',$result['inspection_id'].'.pdf');


?>