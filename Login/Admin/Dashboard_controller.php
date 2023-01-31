<?php
require './database/db_users.php';
require './database/db_self_inspection.php';
require './database/db_GMP.php';
require './database/db_recalled.php';
require './database/db_vaccine.php';

$db_users = new DataBase();
$results_users = $db_users->fetch_users();

$db_self_inspection = new SelfInspection();
$results_self_inspection = $db_self_inspection->fetch_self_inspection();
$number_self_inspection = $db_self_inspection->count_self_inspection();
$number_self_inspection_human = $db_self_inspection->count_self_inspection_human();
$number_self_inspection_veterinary = $db_self_inspection->count_self_inspection_veterinary();

$db_gmp = new GmpInspection();
$result_gmp = $db_gmp->fetch_gmp_inspection();
$number_gmp_inspection = $db_gmp->count_gmp_inspection();
$number_inspectors = $db_gmp->count_inspectors();

$db_vaccine = new Vaccine();
$results_vaccine = $db_vaccine->fetch_vaccine();

$db_recalled = new RecalledProducts();
$results_recalled = $db_recalled->fetch_recalled_products();


?>