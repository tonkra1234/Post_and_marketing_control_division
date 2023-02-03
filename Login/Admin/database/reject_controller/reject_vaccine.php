<?php
include '../db_vaccine.php';

$vaccineId = $_POST['vaccineId'];
$db = new Vaccine();

$db->reject_vaccine($vaccineId);

?>