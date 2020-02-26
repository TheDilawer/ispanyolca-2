<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class Word
{
    private $conn;
    private $table_name="dict_words";

    public $id;
    public $tr;
    public $es;
    public $score;


    public function __construct($db)
    {
        $this->conn=$db;
    }

    function create(){
        $query='INSERT INTO '.$this->table_name.' (tr , es , score) values (:tr, :es , :score) ';
        $stmt=$this->conn->prepare($query);

        //$this->name=htmlspecialchars(strip_tags($this->name));
        $stmt->bindParam(":tr", $this->tr);
        $stmt->bindParam(":es", $this->es);
        $stmt->bindParam(":score", $this->score);
        if($stmt->execute()){

            $this->id = $this->conn->lastInsertId();
            return true;
        }

        return false;


    }

    function read(){

        $query='SELECT * FROM '.$this->table_name.' ORDER BY tr ';

        $stmt=$this->conn->prepare($query);

        $stmt->execute();

        return $stmt;

    }

    function read_single(){

        $query='SELECT * FROM '.$this->table_name.' WHERE id='.$this->id.' ';

        //prepare query
        $stmt=$this->conn->prepare($query);

        //execute
        $stmt->execute();

        return $stmt;

    }

    function update(){
    $query='UPDATE
                    '. $this->table_name .'
                SET  tr="'.$this->tr.'", es="'.$this->es.'"
                 WHERE
                    id='.$this->id.' ';
        $stmt=$this->conn->prepare($query);

        $stmt->execute();

        return $stmt;

    }
    function delete(){}


}