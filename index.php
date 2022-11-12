<?php

    // This value can be defined in a configuration file then read from the code
    $config = simplexml_load_file('./core/database/config.xml');

    define('ROOTURL', $config->rooturl);

// All the cannonical URLs will be rewritten to be pointing to this index file
// in this index file we determine the controller that is being requested based on the resource e.g., users
// then we will dynamically load the required controller

// How do we load a class dynamically (since we don't know the name of the controller in advance)?
// instead of using the controller name variable and concatenating it with a path in a require function call
// instead of doing require('.../controllers/'.$controllername.'.php') for each controller
// we will use a method called spl_autoload_register that will load a class when that class is used in the code

    spl_autoload_register(// We are passing a function as parameter, this function will be called when class_exists is called
        function ($class_name) {

            // If the file name do not match the class names
            // for example the class names are capitalized e.g., UsersController
            // while the filename is all lowercase. this doesn't work on Linux/MAC
            // Then we could split the class name by the keyword Controller, View or other ...
            // and then make the first part e.g., Users start with a lower case
            // this way we can check for a filename with a lower case e.g., usercontroller
            // instead of UsersController.
            
            // Get the first part of the class name e.g., UsersController we get Users
            $resource = explode("Controller", $class_name);

            // lcfirst($resource[0]) e.g., lcfirst(Users) -> users with lower case 'u'
            if(file_exists(__DIR__.'/controllers/' .lcfirst($resource[0]).'controller'. '.php')){
            
                include(__DIR__.'/controllers/'.$class_name.'.php'); 

            }

            // The same as above can be done for the view

            else if (file_exists(__DIR__.'/views/' .$class_name. '.php')){
                include(__DIR__.'/views/'.$class_name.'.php'); 
            }

        }
    );


// How do we determine which controller to load?
// 1- implement rewrite rules
// 2- get the controller name from the URL e.g., index.php?users where users would be the controller name


    // Note that the $_GET array is populated even if the HTTP request method is POST or other methods.
    
    $paramsArray = array();
    $controllername = "";

    if(isset($_GET["params"]))
        // Transform the URL parameters from a string into an array
        $paramsArray = explode("=", $_GET["params"]);
    
    // htmlentities transforms the input by the user either from the URL or in a form's text field into
    // just character symbols, to prevent malicious code injection.
    $controllername = ucfirst(htmlentities($paramsArray[0]))."Controller";

    if(file_exists(__DIR__.'/controllers/' .$controllername. '.php')){

        if(class_exists($controllername)){

            $controllername = new $controllername();

            // Pass to the controller the request info and data

            // How do we get the body/payload of the HTTP post request?

            $payload =  file_get_contents('php://input');

            try {
            $controllername->index($_GET["action"], $paramsArray, $payload );
            } catch(Exception $e) {
                header("Location: /twaproject/404.php");
            }
        }       
    }

    else { //404 redirect
        header("Location: /twaproject/404.php");
    }


?>