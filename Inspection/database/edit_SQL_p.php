<?php 

require '../include/header.php';

include '../db.php';
include '../util.php';
$db = new Database();
$util = new Util();
$number_question = $util->testInput($_POST['count_question']);

$id = $util->testInput($_POST['id']);
$inspec_id = $util->testInput($_POST['Inspec_id']);
$division = $util->testInput($_POST['division']);
$today_date = $util->testInput($_POST['today']);
$last_date = $util->testInput($_POST['last_date']);
$type_inspect = $util->testInput($_POST['type_inspect']);
$dzongkhag = $util->testInput($_POST['dzongkhag']);
$Pname = $util->testInput($_POST['Pname']);
$type_premise = $util->testInput($_POST['type_premise']);
$address = $util->testInput($_POST['address']);
$inspec_scope = $util->testInput($_POST['inspec_scope']);
$premise_number = $util->testInput($_POST['premise_number']);
$premise_valid = $util->testInput($_POST['premise_valid']);
$name = $util->testInput($_POST['name']);
$email = $util->testInput($_POST['email']);
$registration_Number = $util->testInput($_POST['registration_Number']);
$person_valid = $util->testInput($_POST['person_valid']);
$contact = $util->testInput($_POST['contact']);
$contact_detail = $util->testInput($_POST['contact_detail']);


$Array=array();

for ($question=1; $question <= $number_question; $question++) { 
    ${'text'.$question} =  $util->testInput($_POST['text'."$question"]);
    ${'select'.$question} =  $_POST['select'."$question"];
    ${'question'.$question} =  $_POST['question'."$question"];
    ${'level'.$question} =  $_POST['level'."$question"];
    if (${'text'.$question} == NULL) {
        ${'text'.$question} = '';
    }
    $subArray =[];

    array_push($subArray,${'select'.$question});
    array_push($subArray,${'text'.$question});
    array_push($subArray,${'question'.$question});
    array_push($subArray,${'level'.$question});

    array_push($Array,$subArray);
}

$check_list = json_encode($Array);


if ($db->edit_p($id, $division, $today_date, $last_date, $type_inspect, $dzongkhag, $Pname, $type_premise, $address, 
$premise_number, $premise_valid, $inspec_scope, $name, $email, $registration_Number, $person_valid, $contact, $contact_detail, $check_list )){
    
        echo "<script>Swal.fire(
        'Private inspection edit successfully!',
        'Please, click button to continue!',
        'success'
      ).then(function() {
        window.location = '../home.php';
      });
      </script>";

}else{
    echo "<script>Swal.fire(
        'Warning there are some problems',
        'Please, click button to back to home page!',
      );
    </>";
}



require '../include/footer.php';

?>