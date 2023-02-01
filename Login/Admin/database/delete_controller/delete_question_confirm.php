<?php
include '../db_self_inspection.php';

$id = $_GET['id'];
$db = new SelfInspection();

if($db->delete_question($id)){
    header('Location:../../self_inspection.php');
}
?>