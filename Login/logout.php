<?php
session_start();

session_destroy();
unset($_SESSION["user_name_pmcd"]);

header('location:login_form.php');

?>