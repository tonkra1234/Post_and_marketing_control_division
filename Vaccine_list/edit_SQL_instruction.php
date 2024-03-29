<?php 

require './include/header.php';

include './db.php';
include './util.php';

$db = new Database();
$util = new Util();

$number_checklistb = count($db->ChecklistB());
$number_checklistc = count($db->ChecklistC());
// Certification

$id = $util->testInput($_POST['id']);
$AuthorizationNo = $util->testInput($_POST['AuthorizationNo']);
$AuthorizationNoCheck = $util->testInput($_POST['AuthorizationNoCheck']);
$RegistrationNoCheck = $util->testInput($_POST['RegistrationNoCheck']);
$RegistrationNo = $util->testInput($_POST['RegistrationNo']);

$RegistrationNoList = [$RegistrationNoCheck,$RegistrationNo];
$AuthorizationNoList = [$AuthorizationNoCheck,$AuthorizationNo];

$importing_country = $util->testInput($_POST['importing_country']);
$Lot_name = $util->testInput($_POST['Lot_name']);
$Manufacturer = $util->testInput($_POST['Manufacturer']);
$Type_vaccine = $util->testInput($_POST['Type_vaccine']);
$Batch_no = $util->testInput($_POST['Batch_no']);
if(empty($_POST['Date_Manufacture'])){
    $Date_Manufacture = '0000-00-00';
}else{
    $Date_Manufacture = $_POST['Date_Manufacture'];
}
if(empty($_POST['Date_Expiry'])){
    $Date_Expiry = '0000-00-00';
}else{
    $Date_Expiry = $_POST['Date_Expiry'];
}
$Quantity = $util->testInput($_POST['Quantity']);
$Vial = $util->testInput($_POST['Vial']);

// Public 
$Application_number = $util->testInput($_POST['Application_number']);
$Requesting_Agency = $util->testInput($_POST['Requesting_Agency']);
$Storage_Condition = $util->testInput($_POST['Storage_Condition']);

if(empty($_POST['Date_Application'])){
    $Date_Application = '0000-00-00';
}else{
    $Date_Application = $util->testInput($_POST['Date_Application']);
}
if(empty($_POST['Certificate_Issue_Date'])){
    $Certificate_Issue_Date = '0000-00-00';
}else{
    $Certificate_Issue_Date = $_POST['Certificate_Issue_Date'];
}
$Pharmaceutical_Form = $util->testInput($_POST['Pharmaceutical_Form']);
$Diluent = $util->testInput($_POST['Diluent']);
$Diluent_Number = $util->testInput($_POST['Diluent_Number']);
$SLP_Received = $util->testInput($_POST['SLP_Received']);
$Labels_Received = $util->testInput($_POST['Labels_Received']);
$Samples_Received = $util->testInput($_POST['Samples_Received']);
$Reviewer_Assigned = $util->testInput($_POST['Reviewer_Assigned']);

if(empty($_POST['Deadline_Assessment'])){
    $Deadline_Assessment = '0000-00-00';
}else{
    $Deadline_Assessment = $util->testInput($_POST['Deadline_Assessment']);
}
$Remark = $util->testInput($_POST['Remark']);

$checklistB = array();
$checklistC = array();

for ($question=1; $question <= $number_checklistb; $question++) { 
    
    ${'textB'.$question} =  $util->testInput($_POST['textB'."$question"]);
    ${'selectB'.$question} =  $_POST['selectB'."$question"];
    ${'particularsB'.$question} =  $_POST['particularsB'."$question"];
    if (${'textB'.$question} == NULL) {
        ${'textB'.$question} = '';
    }
    $subArrayB =[];

    array_push($subArrayB,${'selectB'.$question});
    array_push($subArrayB,${'textB'.$question});
    array_push($subArrayB,${'particularsB'.$question});

    array_push($checklistB,$subArrayB);
}

for ($question=1; $question <= $number_checklistc; $question++) { 
    
    ${'textC'.$question} =  $util->testInput($_POST['textC'."$question"]);
    ${'selectC'.$question} =  $_POST['selectC'."$question"];
    ${'particularsC'.$question} =  $_POST['particularsC'."$question"];
    if (${'textC'.$question} == NULL) {
        ${'textC'.$question} = '';
    }
    $subArrayC =[];

    array_push($subArrayC,${'selectC'.$question});
    array_push($subArrayC,${'textC'.$question});
    array_push($subArrayC,${'particularsC'.$question});

    array_push($checklistC,$subArrayC);
}


$RegistrationNoEncode = json_encode($RegistrationNoList);
$AuthorizationNoEncode = json_encode($AuthorizationNoList);
$checklistBEncode = json_encode($checklistB);
$checklistCEncode = json_encode($checklistC);

$show_status = $util->testInput($_POST['show_status']);


// if ($db->edit_instruction($show_status,$importing_country,$Lot_name,$id,$Manufacturer,$Type_vaccine,$Batch_no,$Date_Manufacture,$Date_Expiry,$Quantity,$Vial,$RegistrationNoEncode,$AuthorizationNoEncode,$checklistBEncode,$checklistCEncode)){
    
//     echo "<script>Swal.fire(
//         'Edit successfully!',
//         'Please, click button to continue!',
//         'success'
//       ).then(function() {
//         window.location = './list_instruction.php';
//       });
//       </script>";

// }else{
//     echo "<script>Swal.fire(
//         'Warning there are some problems',
//         'Please, click button to back to home page!',
//       );
//     </>";
// }
if ($db->edit_vaccine($show_status,$id,$Remark,$Deadline_Assessment,$Reviewer_Assigned,$Samples_Received,$Labels_Received,$SLP_Received,$Diluent_Number,$Diluent,$Pharmaceutical_Form,$Certificate_Issue_Date,$Date_Application,$Storage_Condition,$Requesting_Agency,$Application_number,$importing_country,$Lot_name,$Manufacturer,$Type_vaccine,$Batch_no,$Date_Manufacture,$Date_Expiry,$Quantity,$Vial,$RegistrationNoEncode,$AuthorizationNoEncode,$checklistBEncode,$checklistCEncode)){
    
    echo "<script>Swal.fire(
        'Edit successfully!',
        'Please, click button to continue!',
        'success'
        ).then(function() {
        window.location = './list_instruction.php';
        });
        </script>";
    
}else{
        echo "<script>Swal.fire(
            'Warning there are some problems',
            'Please, click button to back to home page!',
          );
        </>";
}



require './include/footer.php';

?>