<?php
include '../db_users.php';

$userId = $_POST['Id'];
$new_password = md5($_POST['new_password']);

$db = new DataBase();
if($db->change_password($new_password,$userId)){
    echo "<script>
            alert('Password is already changed');
            window.location.href='../../view_users.php';
            </script>";
}

?>