<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add</title>

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

include '../../../util.php';
include '../db_inspection.php';

$db = new Inspection();
$util = new Util();

$type = $util->testInput($_POST['type']);
$Facility_name = $util->testInput($_POST['Facility_name']);
$Dzongkhag = $util->testInput($_POST['Dzongkhag']);

if ($type === 'government_human'){
    if($db->insert_government_facility($Facility_name,$Dzongkhag,'government_premise_human')){
        echo "<script>Swal.fire(
            'New facility have been added',
            'Please, click button to continue!',
            'success'
          ).then(function() {
            window.location = '../../facility_g_h.php';
          });
          </script>";
    }else{
      echo "<script>Swal.fire(
          'Warning there are some problems',
          'Please, click button to back to home page!',
        );
      </script>";
  }
}
elseif ($type === 'government_veterinary') {
    if($db->insert_government_facility($Facility_name,$Dzongkhag,'government_premise_verterinary')){
        echo "<script>Swal.fire(
            'New facility have been added',
            'Please, click button to continue!',
            'success'
          ).then(function() {
            window.location = '../../facility_g_v.php';
          });
          </>";
    }else{
      echo "<script>Swal.fire(
          'Warning there are some problems',
          'Please, click button to back to home page!',
        );
      </script>";
  }
}

?>

</body>

</html>