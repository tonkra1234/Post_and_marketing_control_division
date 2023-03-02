<?php
require "./fpdf/fpdf.php";
require './db.php';
$db = new DataBase();

$id= (isset($_GET['id']))?$_GET['id']:'';

$result = $db->fetch_each_instruction($id);;

$pdf=new FPDF();
$pdf->SetTitle($result['Manufacturer']);
$pdf->AddPage('L');
  
$pdf->SetFont('Arial','B',12);

$image1 = "./image/logo-original-removebg-preview.png";

// Header
$pdf->cell(30,30,$pdf->Image($image1, $pdf->GetX()+2, $pdf->GetY()+2, 25),1,0);
$pdf->cell(244,15,'Working Instruction for Vaccine Lot Release',1,2,'C');
$pdf->SetFont('Arial','',12);
$pdf->cell(61,7.5,'Document Number',1,0);
$pdf->cell(61,7.5,'Effective Date',1,0);
$pdf->cell(61,7.5,'Review Date',1,0);
$pdf->cell(61,7.5,'Version No.',1,1);
$pdf->SetX(40);
$pdf->cell(61,7.5,'DRA-WI-D2_14_01',1,0);
$pdf->cell(61,7.5,'27-09-2022',1,0);
$pdf->cell(61,7.5,'27-09-2024',1,0);
$pdf->cell(61,7.5,'03',1,0);

// Information

// Inspection Detail
$pdf->Ln('25');
$pdf->SetFont('Arial','B',12);
$pdf->cell(274,10,'Working instruction Detail',1,2,'C');
$pdf->SetFont('Arial','',12);
$pdf->cell(274,10,'Registration Number: '.json_decode($result['RegistrationNo'])[1],1,1,'L');
$pdf->cell(274,10,'Authorization Number: '.json_decode($result['AuthorizationNo'])[1],1,1,'L');
$pdf->cell(274,10,'Type of vaccine: '.$result['Type_vaccine'],1,1,'L');
$pdf->cell(274,10,'Manufacturer: '.$result['Manufacturer'],1,1,'L');
$pdf->cell(274,10,'Batch/Lot no:'.$result['Batch_no'],1,1,'L');
$pdf->cell(137,10,'Mfg date: '.$result['Date_Manufacture'],1,0,'L');
$pdf->cell(137,10,'Exp date: '.$result['Date_Expiry'],1,1,'L');
$pdf->cell(274,10,'Quantity: '.$result['Quantity'] ,1,1,'L');
$pdf->cell(274,10,'Vial: '.$result['Vial'],1,1,'L');


$pdf->Ln();

$pdf->AddPage('L');

// observation report
$pdf->cell(137,10,'B. Cold chain conditions',0,1,'L');
// header
$pdf->SetFont('Arial','B',12);

$pdf->cell(110,7,'Particulars',1,0,'L');
$pdf->cell(20,7,'Details',1,0,'L');
$pdf->Multicell(144,7,'Remarks',1,1,);

$pdf->SetFont('Arial','',12);

$results = json_decode($result['checklistB']);
foreach ($results as $resultB) {
    $pdf->cell(110,7,$resultB[2],1,0,'L');
    $pdf->cell(20,7,$resultB[0],1,0,'L');
    $pdf->Multicell(144,7,$resultB[1],1,1,);
}

$pdf->Ln('5');

// observation report
$pdf->cell(137,10,'C. Documentary Verification',0,1,'L');
// header
$pdf->SetFont('Arial','B',12);

$pdf->cell(110,7,'Particulars',1,0,'L');
$pdf->cell(20,7,'Details',1,0,'L');
$pdf->Multicell(144,7,'Remarks',1,1,);

$pdf->SetFont('Arial','',12);

$results = json_decode($result['checklistC']);
foreach ($results as $resultC) {
    $pdf->cell(110,7,$resultC[2],1,0,'L');
    $pdf->cell(20,7,$resultC[0],1,0,'L');
    $pdf->Multicell(144,7,$resultC[1],1,1,);
}

// $pdf->AddPage('L');
$pdf->Ln('15');
// Signature
$pdf->cell(137,7,'Lot release conducted by (Name and Signature):',1,0,'L');
$pdf->cell(137,7,'Verify by:',1,1,'L');
$pdf->cell(137,25,'',1,0,'L');
$pdf->cell(137,25,'',1,1,'L');

$pdf->Output('I',$result['Manufacturer'].'.pdf');


?>