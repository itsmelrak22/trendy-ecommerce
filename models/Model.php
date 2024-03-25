<?php

// require_once  '../vendor/autoload.php';

class Model 
{
    // > local

    protected $table;
    protected $host = "";
    protected $database = "";
    protected $username = "";
    protected $password = "";
    protected $servername = "";

    // > Actual
    // protected $table;
    // protected $host = "localhost";
    // protected $database = "db_hor";
    // protected $username = "root";
    // protected $password = "admin";

    protected $pdo;
    protected $stmt;
    protected $qry;

    public function __construct(){

        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
        $dotenv->load();

        $this->host =  $_ENV['DB_HOST'];
        $this->database =  $_ENV['DB_DATABASE'];
        $this->username =  $_ENV['DB_USERNAME'];
        $this->password =  $_ENV['DB_PASSWORD'];
        $this->servername =  $_ENV['DB_SERVERNAME'];
        $this->connect();


        // $this->connectActual();
    }

    public function connectActual(){
        
        try {
            $this->pdo = new PDO("mysql:host=$this->servername;dbname=u916113351_ecomm_store", "u916113351_root", "Trendydresshopsystem@2024");
            
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public function connect(){
        try {
            $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->database};charset=utf8","{$this->username}","{$this->password}");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function setTable($table){
        $this->table = $table;
        return $this ; //> for method chaining.
    }

    public function setQuery($qry){

        // The SQL query with a placeholder for the product name
        // $qry = "SELECT * FROM products WHERE name = :productName";

        // The parameter array with the actual product name you are searching for
        // $params = [':productName' => 'Widget'];

        $this->qry = $qry;
        $this->stmt = $this->pdo->query($this->qry);
        return $this;
    }

    public function getAll(){
        try {
            return $this->stmt->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getFirst(){
        try {
            $data =  $this->stmt->fetch();
            return (object) $data; // convert to object
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    // Queries
    public function all(){
        $this->qry = "SELECT * FROM $this->table WHERE deleted_at IS NULL";
        $this->stmt = $this->pdo->query($this->qry);
        $data =  $this->getAll();
        return $data;
    }

    public function find($primaryKey){
        $data = $this->setQuery("SELECT * FROM $this->table WHERE id = $primaryKey")->getFirst();
        return  $data; 
    }

    public function getLastInsertedId(){
        $data = $this->setQuery("SELECT LAST_INSERT_ID() as id")->getFirst();
        return (int) $data->id;
    }

    public function beginTransaction(){
        try {
            $this->pdo->beginTransaction();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function commit(){
        try {
            $this->pdo->commit();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function rollback(){
        try {
            $this->pdo->rollBack();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function delete($id){
        try {
            //code...
            $today = new \DateTime;
            $today =  $today->format('Y-m-d H:i:s');
            $data = $this->setQuery("UPDATE $this->table SET `deleted_at` = '$today' WHERE id = $id");
        } catch (\Exception $e) {
            //throw $th;
            echo $e->getMessage();
            exit();
        }

        print_r($data);
    }


    public function save($param){
        try {
            // Get the keys from the $param array
            $keys = array_keys($param);
    
            // Create a string of the keys for the SQL query
            $columns = implode(', ', $keys);
    
            // Create a string of placeholder names for the SQL query
            $placeholders = ':' . implode(', :', $keys);
    
            // SQL query
            $sql = "INSERT INTO $this->table ($columns) VALUES ($placeholders)";

            // echo "$sql";
            // echo print_r($param);
    
            // Prepare statement
            $this->stmt = $this->pdo->prepare($sql);
    
            // Loop through each item in the $param array
            foreach ($param as $key => $value) {
                // If the value is a DateTime object, format it to a string
                if ($value instanceof \DateTime) {
                    $value = $value->format('Y-m-d H:i:s');
                }
    
                // Bind the value to the placeholder in the SQL query
                $this->stmt->bindValue(':'.$key, $value);
            }
    
            // Execute statement
            $this->stmt->execute();

            return true;
        } catch (\Exception $e) {
            // Handle exception
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    

    public function update($param, $id){
        try {
            // $param = [
            //     "name" => "Male",
            //     "updated_at" => new \DateTime,
            //     "updated_by" => 1,
            // ];
    
            // Get the keys from the $param array
            $keys = array_keys($param);
    
            // Create a string of the keys for the SQL query
            $set = '';
            foreach ($keys as $key) {
                $set .= "$key = :$key, ";
            }
            $set = rtrim($set, ', ');
    
            // SQL query
            $sql = "UPDATE $this->table SET $set WHERE id = :id";
    
            
            // Prepare statement
            $this->stmt = $this->pdo->prepare($sql);
    
            // Bind the ID to the placeholder in the SQL query
            $this->stmt->bindValue(':id', $id);
    
            // Loop through each item in the $param array
            foreach ($param as $key => $value) {
                // If the value is a DateTime object, format it to a string
                if ($value instanceof \DateTime) {
                    $value = $value->format('Y-m-d H:i:s');
                }
    
                // Bind the value to the placeholder in the SQL query
                $this->stmt->bindValue(':'.$key, $value);
            }
            // print_r($this->stmt);
            // print_r($param);
            // print_r($id);
            // exit();
            // Execute statement
            $this->stmt->execute();
            return true;

        } catch (\Exception $e) {
            // Handle exception
            echo "Error: " . $e->getMessage();
            return false;

        }
    }

    
}
