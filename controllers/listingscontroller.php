<?php

require(dirname(__DIR__)."/models/listing.php");
require(dirname(__DIR__)."/core/authentication/auth.php");

class ListingsController{

    private $data;

    private $authProvider;

    function index($action, $params, $payload) {
        $listing = new Listing();

        $this->authProvider = new AuthProvider($listing);
        
        if($this->authProvider->isLoggedIn()){
            $this->data = $listing->$action($params, $payload);

            if($action == "list"){

                if(class_exists("ListingsView")){ 
                    $listingview = new ListingsView($this->data);
                }
            }
            else if ($action == "create"){
                    
                if(class_exists("ListingsCreate"))
                    $listingcreate = new ListingsCreate($this->data);
            }
    }

        else{
            header("Location: ".ROOTURL."/login/view/");
        }
    }      
}


?>