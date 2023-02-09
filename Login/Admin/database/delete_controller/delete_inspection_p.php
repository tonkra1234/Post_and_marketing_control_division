<?php
include '../db_inspection.php';

$db = new Inspection();

$id = $_POST['inspectionId'];
$db->delete_question_p($id);
?>