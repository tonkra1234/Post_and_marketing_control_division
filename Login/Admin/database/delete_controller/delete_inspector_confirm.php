<?php
include '../db_GMP.php';

$id = $_GET['id'];
$db = new GmpInspection();

if($db->delete_inspectors($id)){
    header('Location:../../gmp_inspection.php');
}
?>