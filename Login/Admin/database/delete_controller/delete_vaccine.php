<?php
include '../db_vaccine.php';

$vaccineId = $_POST['vaccineId'];
$db = new Vaccine();

$vaccinedelete = $_POST['vaccinedelete'];

if ($vaccinedelete === 'delete') {
    $db->delete_vaccine($vaccineId);
}
elseif($vaccinedelete === 'retrieve'){
    $db->retrieve_vaccine($vaccineId);
    $db->delete_vaccine($vaccineId);
}


?>
