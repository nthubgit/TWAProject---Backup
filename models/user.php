<?php

    // What is the difference between include and require?
    // include will not break the code if the file doesn't exist
    // require the code in this fille will not execute if the required file doesn't exist
    
    // __DIR__ gives the path to the current directory: htdocs/mvcapp/models
    // dirname gives the path to the parent directory of the parameter
    //// dirname(__DIR__): htdocs/mvcapp
    
    require_once(dirname(__DIR__)."/core/database/dbconnectionmanager.php");

    class User {

        public $id;
        public $username;
        public $password;
        public $email;
        public $picture;

        private $conn;

        function __construct(){

            $connectionManager = new DBConnectionManager();

            $this->conn = $connectionManager->getConnection();

        }
        
        // Functions that support the CRUD functionality
        function list($params, $data){

            if(empty($params[1])){
                $query = "select * from users";
                $statement = $this->conn->prepare($query); 
                $statement->execute(); 
            }
            else{
            
                require_once(dirname(__DIR__)."/core/authentication/auth.php");
                $query = "select * from users where id = :id";
                $statement = $this->conn->prepare($query) ; 
                $statement->execute([ 'id' => $params[1] ]);

            }
			
			return $statement->fetchAll(PDO::FETCH_CLASS);           

        }

        function create($params, $data){

            if(!empty($data)){

                $query = "insert into users (username, password, email) values (:username, :password, :email)";
                $statement = $this->conn->prepare($query);
                
                parse_str($data, $dataArray);

                try {
                    $statement->execute([ 'username' => $dataArray["username"]
                    ,'password' => $dataArray["password"] 
                    , 'email' => $dataArray["email"] 
                    ]);
                } catch (Exception $e) {
                    echo 'Caught exception: ',  $e->getMessage(), "\n";
                }

                // Return the number of rows created    
                return $statement->rowCount();
                
            }

            return 0;

        }

        // Function getUserbyCredentials used for login
        // if there no match then the login is incorrect
        function getUserbyCredentials($params = null, $data){

            $query = "select username, password, id from users where username = :username and password = :password";

            $statement = $this->conn->prepare($query);           

            parse_str($data, $dataArray);

            $statement->execute([ 'username' => $dataArray["username"]
              ,'password' => $dataArray["password"] 
            //   ,'id' => $dataArray["id"] 
            ]);
			
			return $statement->fetchAll(PDO::FETCH_CLASS);           

        }   

        function getUserbyID($id){

            return "unimplemented";
    
        }        

    }// class User

    
    // // Test that the connection to the database works
    //  $user = new User();
    
    //  $result = $user->getAllUsers();

    // var_dump($result);

    // echo "</br>";
    // // $result is an array of associative arrays, 
    // // each associative array is a user record
    // // echo the username of the first user?:
   //  echo($result[0]["username"]);
     


    // With fetchAll(PDO::FETCH_CLASS)
    // the parameter FETCH_CLASS makes the result as an aray of user objects
    // we can do:
    //  $user = $result[0];
    //  echo $user->username;

    // // Yes the below is possible:
    // // $assoc["test"]["v1"] = 100;
    // // var_dump($assoc);
?>