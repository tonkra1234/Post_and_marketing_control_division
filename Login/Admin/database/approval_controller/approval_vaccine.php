<?php
include '../db_vaccine.php';

$vaccineId = $_POST['vaccineId'];
$db = new Vaccine();

$Application_ID = $_POST['Application_ID'];
$Product_Name = $_POST['Product_Name'];
$Manufacturer = $_POST['Manufacturer'];
$Requesting_Agency = $_POST['Requesting_Agency'];
$Date_Application = $_POST['Date_Application'];
$Lot_Number = $_POST['Lot_Number'];
$Lot_Size = $_POST['Lot_Size'];
$Date_Manufacture = $_POST['Date_Manufacture'];
$Date_Expiry = $_POST['Date_Expiry'];
$Storage_Condition = $_POST['Storage_Condition'];
$Pharmaceutical_Form = $_POST['Pharmaceutical_Form'];
$Presentation = $_POST['Presentation'];
$Diluent = $_POST['Diluent'];
$Diluent_Number = $_POST['Diluent_Number'];
$SLP_Received = $_POST['SLP_Received'];
$Labels_Received = $_POST['Labels_Received'];
$Samples_Received = $_POST['Samples_Received'];
$Reviewer_Assigned = $_POST['Reviewer_Assigned'];
$Deadline_Assessment = $_POST['Deadline_Assessment'];
$Certificate_Issue_Date = $_POST['Certificate_Issue_Date'];
$Remarks = $_POST['Remarks'];

$db->approval_vaccine($Application_ID, $Product_Name,$Manufacturer , $Requesting_Agency, 
    $Date_Application, $Lot_Number, $Lot_Size, $Date_Manufacture,
    $Date_Expiry, $Storage_Condition, $Pharmaceutical_Form, $Presentation,
    $Diluent, $Diluent_Number, $SLP_Received, $Labels_Received,
    $Samples_Received, $Reviewer_Assigned, $Deadline_Assessment, $Certificate_Issue_Date,$Remarks);

$db->reject_vaccine($vaccineId);

?>