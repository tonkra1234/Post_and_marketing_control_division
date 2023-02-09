<?php
include '../db_inspection.php';

$inspectionId = $_POST['inspectionId'];
$db = new Inspection();

$inspectionback = $_POST['inspectionback'];

if ($inspectionback === 'retrieve_g') {
    if ($db->retrieve_inspection_g($inspectionId)) {
        $db->delete_inspection_g($inspectionId);
    }
}
elseif($inspectionback === 'retrieve_p'){
    if ($db->retrieve_inspection_p($inspectionId)) {
        $db->delete_inspection_p($inspectionId);
    }
}


?>