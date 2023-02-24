<?php

class Session {

    public function user(){
        session_start();
        $user_name = $_SESSION['user_name_pmcd'];
        $_SESSION['user_name_pmcd'] = $user_name;

        if(!isset($_SESSION['user_name_pmcd'])){
            header('location:./Login/login_form.php');
        }

        $user_type = $_SESSION['user_type'];
        $_SESSION['user_type'] = $user_type;

        return $user_name;
    }

}

?>