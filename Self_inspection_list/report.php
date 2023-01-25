<?php

require './FPDF/multicellTable.php';

require './db.php';

$id= (isset($_GET['id']))?$_GET['id']:'';

$db = new Database();

$detail = $db->read_detail($id);

// $pdf=new FPDF();
$pdf = new PDF_MC_Table();
$pdf->AddPage('');
  
$pdf->SetFont('Arial','B',13);

$image1 = "./image/Report_logo.png";

// Header
$pdf->cell(20,20,$pdf->Image($image1, $pdf->GetX()+2, $pdf->GetY()+2, 16),1,0);
$pdf->cell(170,10,'Self Inspection Form',1,2,'C');
$pdf->SetFont('Arial','',11);
$pdf->cell(42.5,5,'Document Number',1,0);
$pdf->cell(42.5,5,'Effective Date',1,0);
$pdf->cell(42.5,5,'Review Date',1,0);
$pdf->cell(42.5,5,'Version No.',1,1);
$pdf->SetX(30);
$pdf->cell(42.5,5,'DRA-F-D2-08-02',1,0);
$pdf->cell(42.5,5,'27-09-2022',1,0);
$pdf->cell(42.5,5,'27-09-2024',1,0);
$pdf->cell(42.5,5,'00',1,0);

// Information

// Premises Detail
$pdf->Ln('15');
$pdf->SetFont('Arial','B',12);
$pdf->cell(190,10,'Information about the Premise',1,2,'C');

$pdf->cell(60,10,'  Name of Premise ',1,0,'L');
$pdf->SetFont('Arial','',12);
$pdf->cell(130,10,'  '.$detail['Name_of_Premise'],1,1,'L');
$pdf->SetFont('Arial','B',12);
$pdf->cell(60,10,'  Department/Unit/Section ',1,0,'L');
$pdf->SetFont('Arial','',12);
$pdf->cell(130,10,'  '.$detail['Department'],1,1,'L');
$pdf->SetFont('Arial','B',12);
$pdf->cell(60,10,'  Dzongkhag ',1,0,'L');
$pdf->SetFont('Arial','',12);
$pdf->cell(130,10,'  '.$detail['Dzongkhag'],1,1,'L');
$pdf->SetFont('Arial','B',12);
$pdf->cell(60,10,'  Date of self-inspection ',1,0,'L');
$pdf->SetFont('Arial','',12);
$pdf->cell(130,10,'  '.$detail['Date_self_inspection'],1,1,'L');
$pdf->SetFont('Arial','B',12);
$pdf->cell(60,10,'  Address ',1,0,'L');
$pdf->SetFont('Arial','',12);
$pdf->cell(130,10,'  '.$detail['Address'],1,1,'L');
$pdf->Ln('10');

// information of inspectors
$pdf->SetFont('Arial','B',12);
$pdf->cell(190,10,'Details of the In-charge',1,1,'C');

$pdf->cell(60,10,'  Name ',1,0,'L');
$pdf->SetFont('Arial','',12);
$pdf->cell(130,10,'  '.$detail['Name'],1,1,'L');

$pdf->SetFont('Arial','B',12);
$pdf->cell(60,10,'  BMHC No ',1,0,'L');
$pdf->SetFont('Arial','',12);
$pdf->cell(130,10,'  '.$detail['BMHC_No'],1,1,'L');

$pdf->SetFont('Arial','B',12);
$pdf->cell(60,10,'  Email ID ',1,0,'L');
$pdf->SetFont('Arial','',12);
$pdf->cell(130,10,'  '.$detail['Email'],1,1,'L');

$pdf->SetFont('Arial','B',12);
$pdf->cell(60,10,'  Contact Number',1,0,'L');
$pdf->SetFont('Arial','',12);
$pdf->cell(130,10,'  '.$detail['Contact_Number'],1,1,'L');


$pdf->AddPage('');
$pdf->SetFont('Arial','B',15);
// Checklist
$pdf->cell(190,10,'Inspection checklist',0,1,'L');
$pdf->Ln('5');
$pdf->SetFont('Arial','B',12);
// header
$pdf->cell(10,7,'S/N',1,0,'C');
$pdf->cell(140,7,'DESCRIPTION',1,0,'C');
$pdf->cell(20,7,'Check',1,0,'C');
$pdf->cell(20,7,'Remarks',1,1,'C');

// details
$pdf->SetFont('Arial','',12);

$results = json_decode($detail['check_list']) ;
$no =1;
$pdf->SetWidths(array(10, 140, 20, 20));
foreach ($results as $details) {
    $pdf->Row(array($no,html_entity_decode($details[2]),$details[0], html_entity_decode($details[1])));
    $no++;
}


$pdf->Ln('10');
$pdf->cell(7,5,'',0,0);
$pdf->cell(7,5,'',1,0);
$pdf->cell(5,5,'',0,0);
$pdf->Multicell(171,5,'This self inspection report is submitted based on the true findings observed during self inspection by the undersigned.',0,1);
$pdf->Ln('40');
// Signature
$pdf->cell(120,7,'Signature of CP with date',0,0,'L');
$pdf->cell(70,7,'Signature of Inspector with date',0,0,'L');

$filename = $detail['Name_of_Premise'].'.pdf';
$pdf->Output('',$filename);


?>