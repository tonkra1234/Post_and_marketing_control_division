<?php
include '../db_GMP.php';

$id = $_POST['inspectorId'];
$fileName = $_POST['fileName'];

$db = new GmpInspection();

$db->delete_inspectors($id);
$targetDir = "../../image/Officer_image/";

if ($fileName !== null || $fileName !== '') {
    
    $deleteTargetPath = $targetDir . $fileName;
    try {
        unlink($deleteTargetPath); // delete old image
    }
    catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
}
?>