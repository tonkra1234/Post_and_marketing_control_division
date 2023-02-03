<?php
include './db.php';

$productId = $_POST['productId'];
$db = new DataBase();

if($db->move_recalled_product($productId)){
    $db->delete_recalled_product($productId);
}
?>