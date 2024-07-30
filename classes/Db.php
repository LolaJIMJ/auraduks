
<?php

     require_once "config.php";
    class Db{
       // properties
         private $host = DB_HOST;
         private $dbname = DB_NAME;
         private $user = DB_USER;
         private $pass = DB_PASS;

         //private $connection;

        //method to connect to db
        public function connect(){
            //data source name
            $dsn = "mysql:host=$this->host;dbname=$this->dbname";
            $option = [
                PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION
            ];

            try{
                $conn = new PDO($dsn, $this->user, $this->pass, $option);
                
                return $conn;

              

            }catch(PDOException $e){
                echo "There is an error: " . $e->getMessage();
            }
             
        } 
    }

        //testing
    //    $dbcon1 = new Db;
    //    var_dump($dbcon1->connect());
        
?>
