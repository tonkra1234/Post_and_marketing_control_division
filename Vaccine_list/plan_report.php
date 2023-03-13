<?php
require "./fpdf/fpdf.php";
require './db.php';
$db = new DataBase();

$id= (isset($_GET['id']))?$_GET['id']:'';

$result = $db->fetch_each_plan($id);

$pdf=new FPDF();
$pdf->SetTitle(html_entity_decode($result['Manufacturer']));
$pdf->AddPage();
  
$pdf->SetFont('Arial','B',12);

$image1 = "./image/logo-original-removebg-preview.png";


// Header
$pdf->cell(20,20,$pdf->Image($image1, $pdf->GetX()+2, $pdf->GetY()+2, 16),1,0);
$pdf->cell(170,10,'Lot Release Plan Form',1,2,'C');
$pdf->SetFont('Arial','',10);
$pdf->cell(42.5,5,'Document Number',1,0);
$pdf->cell(42.5,5,'Effective Date',1,0);
$pdf->cell(42.5,5,'Review Date',1,0);
$pdf->cell(42.5,5,'Version No.',1,1);
$pdf->SetX(30);
$pdf->cell(42.5,5,'DRA-F-D2-14-02',1,0);
$pdf->cell(42.5,5,'27-09-2022',1,0);
$pdf->cell(42.5,5,'27-09-2024',1,0);
$pdf->cell(42.5,5,'00',1,0);

// Information

// Inspection Detail
$pdf->Ln('25');
$pdf->SetFont('Arial','',12);
$pdf->cell(80,8,'Name & Address of Premises',1,0,'L');
$pdf->Multicell(110,8,html_entity_decode($result['Premises_name']),1,1);
$pdf->cell(80,8,'Proposed Date of Lot Release',1,0,'L');
$pdf->Multicell(110,8,html_entity_decode(date_format(date_create($result['Proposed_Date']),'d-M-Y')),1,1);
$pdf->cell(80,8,'Name of Vaccine',1,0,'L');
$pdf->Multicell(110,8,html_entity_decode($result['Name_Vaccine']),1,1);
$pdf->cell(80,8,'Type of Vaccine',1,0,'L');
$pdf->Multicell(110,8,html_entity_decode($result['Type_vaccine']),1,1);
$pdf->cell(80,8,'Manufacturer',1,0,'L');
$pdf->Multicell(110,8,html_entity_decode($result['Manufacturer']),1,1);
$pdf->cell(80,8,'Estimated Cost (if duty travel is entailed)',1,0);
$pdf->Multicell(110,8,html_entity_decode($result['Estimated_Cost']),1,1);

$pdf->Ln(15);
$pdf->cell(90,8,'Name of the proposed official(s) for lot release',1,0,'L');
$pdf->Multicell(100,8,html_entity_decode($result['Proposed_official']),1,1);

$pdf->Ln(25);
// Signature
$pdf->SetFont('Arial','B',12);
$pdf->cell(63,7,'Prepared By:',1,0,'L');
$pdf->cell(63,7,'Reviewed By:',1,0,'L');
$pdf->cell(63,7,'Approved By:',1,1,'L');
$pdf->SetFont('Arial','',12);
$pdf->cell(63,25,'',1,0,'L');
$pdf->cell(63,25,'',1,0,'L');
$pdf->cell(63,25,'',1,1,'L');

$pdf->Output('I',html_entity_decode($result['Manufacturer']).'.pdf');


?>