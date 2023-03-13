<?php 

require './include/header.php';

include './db.php';
include './util.php';

$db = new Database();
$util = new Util();


$Premises_name = $util->testInput($_POST['Premises_name']);
$Manufacturer = $util->testInput($_POST['Manufacturer']);
$Type_vaccine = $util->testInput($_POST['Type_vaccine']);
$Proposed_Date = $util->testInput($_POST['Proposed_Date']);
$Name_Vaccine = $util->testInput($_POST['Name_Vaccine']);
$Estimated_Cost = $util->testInput($_POST['Estimated_Cost']);
$Proposed_official = $util->testInput($_POST['Proposed_official']);



if ($db->insert_plan($Premises_name,$Manufacturer,$Type_vaccine,$Proposed_Date,$Name_Vaccine,$Estimated_Cost,$Proposed_official)){
    
    echo "<script>Swal.fire(
        'New plan record successfully!',
        'Please, click button to continue!',
        'success'
      ).then(function() {
        window.location = './list_plan.php';
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