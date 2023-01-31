<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>update</title>

  <!-- Jquery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"
    integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- Sweetalert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
  <?php
include './db.php';
include './util.php';

$db = new Database();
$util = new Util();

$number_question = $db->count_read_question();

$id = $util->testInput($_POST['id']);
$Name_of_Premise = $util->testInput($_POST['Name_of_Premise']);
$Department = $util->testInput($_POST['Department']);
$Dzongkhag = $util->testInput($_POST['Dzongkhag']);
$Date_self_inspection = $util->testInput($_POST['Date_self_inspection']);
$Address = $util->testInput($_POST['Address']);
$Name = $util->testInput($_POST['Name']);
$BMHC_No = $util->testInput($_POST['BMHC_No']);
$Email = $util->testInput($_POST['Email']);
$Contact_Number = $util->testInput($_POST['Contact_Number']);
$type_of_premises = $util->testInput($_POST['type_of_premises']);

$Array=array();

for ($question=1; $question <= $number_question[0]['total_question']; $question++) { 
    ${'text'.$question} =  $util->testInput($_POST['text'."$question"]);
    ${'select'.$question} =  $util->testInput($_POST['select'."$question"]);
    ${'question'.$question} =  $util->testInput($_POST['question'."$question"]);
    ${'level'.$question} =  $util->testInput($_POST['level'."$question"]);
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

$Note = $util->testInput($_POST['Note']);
if (isset($_POST['self_check'])) {
    $self_check = $util->testInput($_POST['self_check']);
}else{
    $self_check = '';
}

$check_list = json_encode($Array);

if ($db->edit($id, $Name_of_Premise,$Department,$Dzongkhag,$Date_self_inspection,$Address,$Name,$BMHC_No,$Email,$Contact_Number,$Note,$self_check,$check_list,$type_of_premises )){
    
    echo "<script>Swal.fire(
        'Updating record successfully!',
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

?>

</body>

</html>