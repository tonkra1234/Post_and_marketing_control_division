<?php
include './db.php';

$id = $_GET['id'];
$db = new DataBase();

if($db->move_recalled_product($id)){
    $db->delete_recalled_product($id);
    header('Location:./home.php');
}
?>