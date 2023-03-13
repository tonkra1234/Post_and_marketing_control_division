<?php
require "./fpdf/fpdf.php";
require './db.php';
$db = new DataBase();

$id= (isset($_GET['id']))?$_GET['id']:'';

$result = $db->fetch_each_instruction($id);
$header = $db->header_work();

$pdf=new FPDF();
$pdf->SetTitle(html_entity_decode($result['Manufacturer']));
$pdf->AddPage('L');
  
$pdf->SetFont('Arial','B',12);

$image1 = "./image/logo-original-removebg-preview.png";

if($result['Date_Manufacture'] === '0000-00-00' || $result['Date_Manufacture'] === NULL ){
    $mfg_date = 'N/A';
}else{
    $mfg_date = date_format(date_create($result['Date_Manufacture']),'d-M-Y');
}

if($result['Date_Expiry'] === '0000-00-00' || $result['Date_Expiry'] === NULL ){
    $expire_date = 'N/A';
}else{
    $expire_date = date_format(date_create($result['Date_Expiry']),'d-M-Y');
}

// Header
$pdf->cell(30,30,$pdf->Image($image1, $pdf->GetX()+2, $pdf->GetY()+2, 25),1,0);
$pdf->cell(244,15,'Working Instruction for Vaccine Lot Release',1,2,'C');
$pdf->SetFont('Arial','',12);
$pdf->cell(61,7.5,'Document Number',1,0);
$pdf->cell(61,7.5,'Effective Date',1,0);
$pdf->cell(61,7.5,'Review Date',1,0);
$pdf->cell(61,7.5,'Version No.',1,1);
$pdf->SetX(40);
$pdf->cell(61,7.5,$header['Document_Number'],1,0);
$pdf->cell(61,7.5,$header['Effective_Date'],1,0);
$pdf->cell(61,7.5,$header['Review_Date'],1,0);
$pdf->cell(61,7.5,$header['Version_Number'],1,0);

// Information

// Inspection Detail
$pdf->Ln('25');
$pdf->SetFont('Arial','B',12);
$pdf->cell(274,10,'Working instruction Detail',1,2,'C');
$pdf->SetFont('Arial','',12);
$pdf->cell(274,10,'Registration Number: '.html_entity_decode(json_decode($result['RegistrationNo'])[1]),1,1,'L');
$pdf->cell(274,10,'Authorization Number: '.html_entity_decode(json_decode($result['AuthorizationNo'])[1]),1,1,'L');
$pdf->cell(274,10,'Type of vaccine: '.html_entity_decode($result['Type_vaccine']),1,1,'L');
$pdf->cell(274,10,'Manufacturer: '.html_entity_decode($result['Manufacturer']),1,1,'L');
$pdf->cell(274,10,'Batch/Lot no: '.html_entity_decode($result['Batch_no']),1,1,'L');
$pdf->cell(137,10,'Mfg date: '.$mfg_date,1,0,'L');
$pdf->cell(137,10,'Exp date: '.$expire_date,1,1,'L');
$pdf->cell(274,10,'Quantity: '.html_entity_decode($result['Quantity']) ,1,1,'L');
$pdf->cell(274,10,'Vial: '.html_entity_decode($result['Vial']),1,1,'L');


$pdf->Ln();

$pdf->AddPage('L');
$pdf->SetFont('Arial','B',12);

// observation report
$pdf->cell(137,10,'B. Cold chain conditions',0,1,'L');
// header

$pdf->cell(110,7,'Particulars',1,0,'L');
$pdf->cell(20,7,'Details',1,0,'L');
$pdf->Multicell(144,7,'Remarks',1,1,);

$pdf->SetFont('Arial','',12);

$results = json_decode($result['checklistB']);
foreach ($results as $resultB) {
    $pdf->cell(110,7,$resultB[2],1,0,'L');
    $pdf->cell(20,7,$resultB[0],1,0,'L');
    $pdf->Multicell(144,7,html_entity_decode($resultB[1]),1,1,);
}

$pdf->Ln('5');

$pdf->SetFont('Arial','B',12);

// observation report
$pdf->cell(137,10,'C. Documentary Verification',0,1,'L');


$pdf->cell(110,7,'Particulars',1,0,'L');
$pdf->cell(20,7,'Details',1,0,'L');
$pdf->Multicell(144,7,'Remarks',1,1,);

$pdf->SetFont('Arial','',12);

$results = json_decode($result['checklistC']);
foreach ($results as $resultC) {
    $pdf->cell(110,7,$resultC[2],1,0,'L');
    $pdf->cell(20,7,$resultC[0],1,0,'L');
    $pdf->Multicell(144,7,html_entity_decode($resultC[1]),1,1,);
}

// $pdf->AddPage('L');
$pdf->Ln('15');
// Signature
$pdf->cell(137,7,'Lot release conducted by (Name and Signature):',1,0,'L');
$pdf->cell(137,7,'Verify by:',1,1,'L');
$pdf->cell(137,25,'',1,0,'L');
$pdf->cell(137,25,'',1,1,'L');

$pdf->Output('I',html_entity_decode($result['Manufacturer']).'.pdf');


?>