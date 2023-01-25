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

$id = $util->testInput($_POST['id']);
$Generic_name= $util->testInput($_POST['Generic_name']);
$Brand_name = $util->testInput($_POST['Brand_name']);
$Batch_No = $util->testInput($_POST['Batch_No']);
$Manufacturer = $util->testInput($_POST['Manufacturer']);
$MAH = $util->testInput($_POST['MAH']);
$Mode_of_registration = $util->testInput($_POST['Mode_of_registration']);
$Class_of_medicines = $util->testInput($_POST['Class_of_medicines']);
$Class_of_recall = $util->testInput($_POST['Class_of_recall']);
$Level_of_Recall = $util->testInput($_POST['Level_of_Recall']);
$Reason_for_recall = $util->testInput($_POST['Reason_for_recall']);
$Date_of_recall = $util->testInput($_POST['Date_of_recall']);

if ($db->edit($id, $Generic_name, $Brand_name ,$Batch_No , $Manufacturer, $MAH, $Mode_of_registration, $Class_of_medicines,$Class_of_recall,$Level_of_Recall,$Reason_for_recall,$Date_of_recall)){
    
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