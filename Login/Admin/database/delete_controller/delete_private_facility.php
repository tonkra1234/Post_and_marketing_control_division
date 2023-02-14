<?php
include '../db_inspection.php';

$db = new Inspection();

$id = $_POST['facilityId'];

$db->delete_private_facility($id);
?>