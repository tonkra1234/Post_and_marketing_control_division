<?php
session_start();

// session_destroy();
unset($_SESSION["user_name_pmcd"]);

header('location:../Outsider/dashboard.php');

?>