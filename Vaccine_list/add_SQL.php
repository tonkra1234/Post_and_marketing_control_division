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

$Name_Manufacturer = $util->testInput($_POST['Name_Manufacturer']);
$Application_ID = $util->testInput($_POST['Application_ID']);
$Product_Name = $util->testInput($_POST['Product_Name']);
$Manufacturer = $util->testInput($_POST['Manufacturer']);
$Requesting_Agency = $util->testInput($_POST['Requesting_Agency']);
$Date_Application = $util->testInput($_POST['Date_Application']);
$Lot_Number = $util->testInput($_POST['Lot_Number']);
$Lot_Size = $util->testInput($_POST['Lot_Size']);
$Date_Manufacture = $util->testInput($_POST['Date_Manufacture']);
$Date_Expiry = $util->testInput($_POST['Date_Expiry']);
$Storage_Condition = $util->testInput($_POST['Storage_Condition']);
$Pharmaceutical_Form = $util->testInput($_POST['Pharmaceutical_Form']);
$Presentation = $util->testInput($_POST['Presentation']);
$Diluent = $util->testInput($_POST['Diluent']);
$Diluent_Number = $util->testInput($_POST['Diluent_Number']);
$SLP_Received = $util->testInput($_POST['SLP_Received']);
$Labels_Recieved = $util->testInput($_POST['Labels_Recieved']);
$Samples_Recieved = $util->testInput($_POST['Samples_Recieved']);
$Reviewer_Assigned = $util->testInput($_POST['Reviewer_Assigned']);
$Deadline_Assessment = $util->testInput($_POST['Deadline_Assessment']);
$Certificate_Issue_Date = $util->testInput($_POST['Certificate_Issue_Date']);
$Remarks = $util->testInput($_POST['Remarks']);


if ($db->insert($Application_ID, $Product_Name,$Manufacturer , $Requesting_Agency, 
                $Date_Application, $Lot_Number, $Lot_Size, $Date_Manufacture,
                $Date_Expiry, $Storage_Condition, $Pharmaceutical_Form, $Presentation,
                $Diluent, $Diluent_Number, $SLP_Received, $Labels_Recieved,
                $Samples_Recieved, $Reviewer_Assigned, $Deadline_Assessment, $Certificate_Issue_Date,$Remarks)){
    
    echo "<script>Swal.fire(
        'New Manufacturer record successfully!',
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
