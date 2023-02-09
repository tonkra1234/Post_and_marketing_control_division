<?php
include '../db.php';

$inspectiondelete = $_POST['inspectiondelete'];
$inspectionId = $_POST['inspectionId'];
$db = new DataBase();

if($inspectiondelete === 'government'){
    if ($db->move_inspection_g($inspectionId)) {
        $db->delete_inspection_g($inspectionId);
    }
}elseif ($inspectiondelete === 'private') {
    if ($db->move_inspection_p($inspectionId)) {
        $db->delete_inspection_p($inspectionId);
    }
}
?>