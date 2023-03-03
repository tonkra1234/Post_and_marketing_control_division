<?php 

require './include/header.php';

include './db.php';
include './util.php';

$db = new Database();
$util = new Util();

$number_checklistb = count($db->ChecklistB());
$number_checklistc = count($db->ChecklistC());

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
$Date_Manufacture = $util->testInput($_POST['Date_Manufacture']);
$Date_Expiry = $util->testInput($_POST['Date_Expiry']);
$Quantity = $util->testInput($_POST['Quantity']);
$Vial = $util->testInput($_POST['Vial']);

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


if ($db->insert_instruction($importing_country,$Lot_name,$Manufacturer,$Type_vaccine,$Batch_no,$Date_Manufacture,$Date_Expiry,$Quantity,$Vial,$RegistrationNoEncode,$AuthorizationNoEncode,$checklistBEncode,$checklistCEncode)){
    
    echo "<script>Swal.fire(
        'New working instruction record successfully!',
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