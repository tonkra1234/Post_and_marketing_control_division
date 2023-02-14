<?php
include '../db_inspection.php';

$db = new Inspection();

$id = $_POST['facilityId'];
$type = $_POST['type'];

$db->delete_government_facility($id,$type);
?>