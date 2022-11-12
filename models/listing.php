<?php

    include(dirname(__DIR__).'/core/database/dbconnectionmanager.php');
    require(dirname(__DIR__)."/logging/autoload.php");
    use Monolog\Logger;
    use Monolog\Handler\StreamHandler;



    class Listing {

        public $id;
        public $name;
        public $addedby;
        public $dateadded;
        public $imageurl;
        

        private $conn;

        function __construct(){

            $connectionManager = new DBConnectionManager();

            $this->conn = $connectionManager->getConnection();

        }

        function list($params){

            if(empty($params[1])){
                $query = "select l.id, l.name, u.username, l.imageurl, l.dateadded from listings l
                inner join users u
                on l.addedby=u.id";
                $statement = $this->conn->prepare($query) ; 
                $statement->execute(); 
            }
            else{
                $query = "select * from listings where id = :id";
                $statement = $this->conn->prepare($query) ; 
                $statement->execute([ 'id' => $params[1] ]);
            }
            return $statement->fetchAll(PDO::FETCH_CLASS);    
        }

        function create($params, $data){

            $log = new Logger('mylog');
            $log->pushHandler(new StreamHandler(dirname(__DIR__)."/logging/mylogfile.log", Logger::INFO));

            if(!empty($data)){

                $query = "insert into listings (name, addedby, dateadded) values (:name, :addedby, :dateadded)";
                $statement = $this->conn->prepare($query);
                
                parse_str($data, $dataArray);

                $statement->execute([ 'name' => $dataArray["name"]
                    ,'addedby' => $dataArray["addedby"] 
                    , 'dateadded' => $dataArray["dateadded"]
                    // , 'imageurl' => $dataArray["imageurl"] 
                    ]);

                // Return the number of rows created    
                return $statement->rowCount();
                
            }
            return 0;

        }
    }

?>