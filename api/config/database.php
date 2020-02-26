<?php
class Database{

    // specify your own database credentials
    private $host = "94.73.148.90";
    private $db_name = "u5635028_dict";
    private $username = "u5635028_dict";
    private $password = "e3r4t5E3R4T5";
    public $conn;

    // get the database connection
    public function getConnection(){

        $this->conn = null;

        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>