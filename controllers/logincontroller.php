<?php

require_once(dirname(__DIR__)."/core/authentication/auth.php");

require_once(dirname(__DIR__)."/models/user.php");

class LoginController{

    private $authProvider;

    private $user;

    private $loginMessage;

    function index($action, $params, $payload){
    
        $this->user = new User();

        $this->authProvider = new AuthProvider($this->user);

        if($this->authProvider->isLoggedIn()){

            // If the user is already logged in direct them to a default page
            header("Location: ".ROOTURL."/listings/list/");

        }else{

            if(!empty($payload)){
                // // If the user credentials are valid
                if($this->authProvider->Login($params, $payload)){
                    // If the user is logged in, direct them to a default page
                    header("Location: ".ROOTURL."/listings/list/");
        
                }
                else{

                    $this->loginMessage = "Invalid credentials, please verify your rusername and password and try again.";

                }
            }

            // URL: http://localhost/mvcapp/login/
            
            if(class_exists("LoginView")){

                $loginview = new LoginView($this->loginMessage);

            }

        }
    
    }    

}


?>