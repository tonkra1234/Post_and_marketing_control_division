<?php


require "./fpdf/multicellTable.php";
require './db.php';
$db = new DataBase();

$id= (isset($_GET['id']))?$_GET['id']:'';

$result = $db->fetch_each_instruction($id);;
$header = $db->header_cer();
$pdf = new PDF_MC_Table();
$pdf->SetTitle('Certification-'.html_entity_decode($result['Manufacturer']));
$pdf->AddPage();
  
$pdf->SetFont('Arial','B',12);

$image1 = "./image/logo-original-removebg-preview.png";

$image ='./image/logo.png';
$image2 = './image/logo2.png';
$image3 = './image/center.png';

// Header

$pdf->cell(20,20,$pdf->Image($image1, $pdf->GetX()+2, $pdf->GetY()+2, 16),1,0);
$pdf->cell(170,10,'Sample format for vaccine lot release certification',1,2,'C');
$pdf->SetFont('Arial','',10);
$pdf->cell(42.5,5,'Document Number',1,0);
$pdf->cell(42.5,5,'Effective Date',1,0);
$pdf->cell(42.5,5,'Review Date',1,0);
$pdf->cell(42.5,5,'Version No.',1,1);
$pdf->SetX(30);
$pdf->cell(42.5,5,$header['Document_Number'],1,0);
$pdf->cell(42.5,5,$header['Effective_Date'],1,0);
$pdf->cell(42.5,5,$header['Review_Date'],1,0);
$pdf->cell(42.5,5,$header['Version_Number'],1,0);

$pdf->Ln(5);

$pdf->cell(50,37,$pdf->Image($image2, $pdf->GetX()+9, $pdf->GetY()+3, 32),0,0);
$pdf->Cell(90,37,$pdf->Image($image3, $pdf->GetX()+5, $pdf->GetY()+5, 80),0,0);
$pdf->cell(50,37,$pdf->Image($image, $pdf->GetX()+9, $pdf->GetY()+1, 32),0,1);

$pdf->Ln(10);
$pdf->cell(190,5,'Regulation No: ',0,1);
$pdf->SetFont('Arial','B',10);
$pdf->cell(190,5,'LOT RELEASE CERTIFICATE',0,1,'C');
$pdf->SetFont('Arial','',10);
$pdf->Ln(5);

$text = 'The following lot (s) of <'.html_entity_decode($result['lot_name']).'> manufactured by <'.html_entity_decode($result['Manufacturer']).'> has met the minimum requirements for lot release. This certificate is issued based on the examination and verification of minimum documents accompanying the vaccine shipment at the time of visit to the consignee/store of the vaccines. Details of documentation and examination results of the certified vaccine are as follows.';
$pdf->WriteText($text);

$pdf->Ln(10);
$pdf->SetFont('Arial','B',10);
$pdf->cell(190,5,'A. Details of Vaccine',0,1);
$pdf->SetFont('Arial','',10);

$mfg_date = date_format(date_create($result['Date_Manufacture']),'d-M-Y');
$expire_date = date_format(date_create($result['Date_Expiry']),'d-M-Y');

$pdf->Ln(5);
$pdf->SetWidths(array(24, 24, 24, 24, 25, 24, 24, 24));
$pdf->SetFont('Arial','B',10);
$pdf->Row(array('Type of vaccine','Lot No.','Mfg. Date','Expiry Date','Manufacturer','Importing Country','Quantity','Dose/vial'));
$pdf->SetFont('Arial','',10);
$pdf->Row(array(html_entity_decode($result['Type_vaccine']),html_entity_decode($result['Batch_no']),$mfg_date,$expire_date,html_entity_decode($result['Manufacturer']),html_entity_decode($result['importing_country']),html_entity_decode($result['Quantity']),html_entity_decode($result['Vial'])));

$pdf->Ln(5);
$pdf->SetFont('Arial','B',10);
$pdf->cell(190,5,'B. Cold Chain Conditions',0,1);
$pdf->SetFont('Arial','',10);

$resultB = json_decode($result['checklistB']) ;

$pdf->Ln(5);
$pdf->SetWidths(array(48, 48, 48, 48));
$pdf->SetFont('Arial','B',10);
$pdf->Row(array('Is there any broken vials in the lots?','Condition of cold chain?','Is there any frozen vial?','Are there labels attached to the shipping boxes?'));
$pdf->SetFont('Arial','',10);
$pdf->Row(array(html_entity_decode($resultB[0][0]),html_entity_decode($resultB[1][0]),html_entity_decode($resultB[2][0]),html_entity_decode($resultB[3][0])));


$pdf->Ln(5);
$pdf->SetFont('Arial','B',10);
$pdf->cell(190,5,'C. Documentary verification',0,1);
$pdf->SetFont('Arial','',10);

$resultB = json_decode($result['checklistC']) ;

$pdf->Ln(5);
$pdf->SetWidths(array(32, 32, 32, 32, 32, 32));
$pdf->SetFont('Arial','B',10);
$pdf->Row(array('Batch Release certified','Summary Lot Protocol','Analytical Report','Invoice','Airway','Packing list'));
$pdf->SetFont('Arial','',10);
$pdf->Row(array(html_entity_decode($resultB[0][0]),html_entity_decode($resultB[1][0]),html_entity_decode($resultB[2][0]),html_entity_decode($resultB[3][0]),html_entity_decode($resultB[4][0]),html_entity_decode($resultB[5][0])));


$Y1 =$pdf->GetY();
$pdf->Ln(249-$Y1);
// Signature
$pdf->SetFont('Arial','B',10);
$pdf->Ln(20);
$pdf->cell(90,7,'Lot release Date : ',0,0,'L');
$pdf->cell(90,7,'Drug controller',0,1,'R');

$pdf->Output('I','Certification-'.html_entity_decode($result['Manufacturer']).'.pdf');


?>