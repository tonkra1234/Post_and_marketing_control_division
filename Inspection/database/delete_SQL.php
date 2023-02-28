<?php
include '../db.php';

$inspectiondelete = $_POST['inspectiondelete'];
$Id = $_POST['Id'];

$db = new DataBase();

if($inspectiondelete === 'government'){
    if ($db->move_inspection_g($Id)) {
        $db->delete_inspection_g($Id);
    }
}elseif ($inspectiondelete === 'private') {
    if ($db->move_inspection_p($Id)) {
        $db->delete_inspection_p($Id);
    }
}

?>