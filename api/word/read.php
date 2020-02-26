<?php
    ini_set('display_errors',1);
    error_reporting(E_ALL);
    // include database and object files
    include_once '../config/database.php';
    include_once '../objects/word.php';

    // instantiate database and room object
    $database = new Database();
    $db = $database->getConnection();
    $id ='';
    $tr ='';
    $es ='';
    $score ='';

    // initialize object
    $word = new Word($db);

    // query room
    $stmt = $word->read();

    $num = $stmt->rowCount();
    // check if more than 0 record found
    if($num>0){

        // doctors array
        $word_arr=array();
        $word_arr["word"]=array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $word_item=array(
                "id" => $id,
                "tr" => $tr,
                "es" => $es,
                "score" => $score,
            );
            array_push($word_arr["word"], $word_item);
        }

        echo json_encode($word_arr["word"]);
    }
    else{
        echo json_encode(array("message"=>"no item found!"));
    }
