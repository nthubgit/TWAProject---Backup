<?php

   // namespace controllers\User;
    // We need to acces both User Model and View
    require(dirname(__DIR__)."/models/user.php");

    require(dirname(__DIR__)."/core/authentication/auth.php");

    // Controller class
    class UsersController {

        private $data;

        private $authProvider;

        function index($action, $params, $payload){
            $user = new User();
        
            $this->authProvider = new AuthProvider($user);

            if($this->authProvider->isLoggedIn()){

                $this->data = $user->$action($params, $payload);

                // Determine which secure View to load.
                if($action == "list"){

                    if(class_exists("UsersView")){ 
                        $userview = new UsersView($this->data);
                    }
                
                }
                //not allowing login/register if loggedin, redirecting to home
                else if ($action == "create" || $action == "login"){
                    header("Location: ".ROOTURL."/views/");
                }  

            }

            //allow login and register without authen
            else if ($action == "create"){
                $this->data = $user->$action($params, $payload);
                
                if(class_exists("CreateUsers"))
                    $userview = new CreateUsers($this->data);
            
            }
            //default to login
            else{
                header("Location: ".ROOTURL."/login/view/");
            }
        }
    }

?>