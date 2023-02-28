<?php 
require './Dashboard/dashboard_db.php';
$db = new Dashboard();

$Month_data = $db->result_month();

$Year_data = $db->result_year();

$Year_data_private = $db->Year_data_private();

$Human_premises_govern = $db->Human_premises_govern();

$Human_premises_private = $db->Human_premises_private();

$Human_premises_veterinary = $db->Human_premises_veterinary();

$Year_data_g_now = $db->result_year_now_g();

$Year_data_p_now = $db->Year_data_private_now();

require './Dashboard/array_score.php';


$g_2020 = ($db->result_financial_2020_g())[0]['Sum']+($db->result_financial_2020_g())[1]['Sum'];
$g_2021 = ($db->count_financial_veterinary_2021())['sum']+($db->count_financial_human_2021())['sum'];
$g_2022 = ($db->result_financial_2022_g_2())['Sum'];
$g_2023 = ($db->result_financial_2023_g())['Sum'];
$g_2024 = ($db->result_financial_2024_g())['Sum'];

$p_2020 = ($db->result_financial_2020_p())[0]['Sum']+($db->result_financial_2020_p())[1]['Sum'];
$p_2021 = ($db->result_financial_2021_p())[0]['Sum']+($db->result_financial_2021_p())[1]['Sum'];
$p_2022 = ($db->result_financial_2022_p_2())['Sum'];
$p_2023 = ($db->result_financial_2023_p())['Sum'];
$p_2024 = ($db->result_financial_2024_p())['Sum'];

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

foreach ($Year_data_g_now as $row) {
    array_push($Each_year,$row["Year"]);
    array_push($sum_year,$row["Sum"]);
};

foreach ($Year_data_private as $row) {
    array_push($Each_year_private,$row["Year"]);
    array_push($sum_year_private,$row["Sum"]);
};

foreach ($Year_data_p_now  as $row) {
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