<?php 
require './Dashboard/dashboard_db.php';
$db = new Dashboard();
require './Dashboard/array_score.php';

$Month_data = $db->result_month();

$Year_data = $db->result_year();

$Year_data_private = $db->Year_data_private();

$Human_premises_govern = $db->Human_premises_govern();

$Human_premises_private = $db->Human_premises_private();

$Human_premises_veterinary = $db->Human_premises_veterinary();


$Dzongkhag_govern = [];
$Sum_dzongkhag_govern = [];

$Dzongkhag_private = [];
$Sum_dzongkhag_private = [];

$Dzongkhag_veterinary = [];
$Sum_dzongkhag_veterinary = [];

$Each_year = [];
$sum_year = [];

$Each_year_private = [];
$sum_year_private = [];

foreach ($Year_data as $row) {
    array_push($Each_year,$row["Year"]);
    array_push($sum_year,$row["Sum"]);
};

foreach ($Year_data_private as $row) {
    array_push($Each_year_private,$row["Year"]);
    array_push($sum_year_private,$row["Sum"]);
};

foreach ($Human_premises_private as $row) {
    array_push($Dzongkhag_private,$row["Dzongkhag"]);
    array_push($Sum_dzongkhag_private,$row["sum"]);
};


foreach ($Human_premises_govern as $row) {
    array_push($Dzongkhag_govern,$row["Dzongkhag"]);
    array_push($Sum_dzongkhag_govern,$row["sum"]);
};

foreach ($Human_premises_veterinary as $row) {
    array_push($Dzongkhag_veterinary,$row["Dzongkhag"]);
    array_push($Sum_dzongkhag_veterinary,$row["sum"]);
};


?>