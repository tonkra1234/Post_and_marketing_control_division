<?php 

require './include/header.php';

include './db.php';
include './util.php';
$db = new Database();
$util = new Util();
$number_question = $db->count_read_question();


$Name_of_Premise = $util->testInput($_POST['Name_of_Premise']);
$Department = $util->testInput($_POST['Department']);
$Dzongkhag = $util->testInput($_POST['Dzongkhag']);
$Date_self_inspection = $util->testInput($_POST['Date_self_inspection']);
$Address = $util->testInput($_POST['Address']);
$Name = $util->testInput($_POST['Name']);
$BMHC_No = $util->testInput($_POST['BMHC_No']);
$Email = $util->testInput($_POST['Email']);
$Contact_Number = $util->testInput($_POST['Contact_Number']);

$Array=array();

for ($question=1; $question <= $number_question[0]['total_question']; $question++) { 
    ${'text'.$question} =  $util->testInput($_POST['text'."$question"]);
    ${'select'.$question} =  $util->testInput($_POST['select'."$question"]);
    ${'question'.$question} =  $util->testInput($_POST['question'."$question"]);
    if (${'text'.$question} == NULL) {
        ${'text'.$question} = '';
    }
    $subArray =[];

    array_push($subArray,${'select'.$question});
    array_push($subArray,${'text'.$question});
    array_push($subArray,${'question'.$question});

    array_push($Array,$subArray);
}

$Note = $util->testInput($_POST['Note']);
if (isset($_POST['self_check'])) {
    $self_check = $util->testInput($_POST['self_check']);
}else{
    $self_check = '';
}

$check_list = json_encode($Array);


if ($db->insert($Name_of_Premise,$Department,$Dzongkhag,$Date_self_inspection,$Address,$Name,$BMHC_No,$Email,$Contact_Number,$Note,$self_check,$check_list )){
    
    echo "<script>Swal.fire(
        'New self inspection record successfully!',
        'Please, click button to continue!',
        'success'
      ).then(function() {
        window.location = './home.php';
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