<?php

require_once(dirname(__DIR__)."/core/authentication/auth.php");


class LogoutController{

    function index($action, $params, $payload){

        $this->destroySession();

        header("Location: ".ROOTURL."/login/view/");

    }

    function destroySession(){

        session_name("twaproject");
        session_start();

        $_SESSION = array();

        setcookie("twaproject", "", time()-3600, "/");

        session_destroy(); 

    }


}

?>