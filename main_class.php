<?php

class Session {

    public function user(){
        session_start();
        $user_name = $_SESSION['user_name_pmcd'];
        $_SESSION['user_name_pmcd'] = $user_name;

        return $user_name;
    }

}

?>