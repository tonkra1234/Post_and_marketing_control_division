<?php
include './db.php';

$vaccineId = $_POST['vaccineId'];
$db = new DataBase();

if($db->move_vaccine($vaccineId)){
    $db->delete_vaccine($vaccineId);
}
?>