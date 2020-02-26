<?php
// include database and object files
include_once '../config/database.php';
include_once '../objects/word.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare doctor object
$word = new Word($db);
// set ID property of doctor to be edited
$word->id = isset($_REQUEST['id']) ? $_REQUEST['id'] : die();
// read the details of doctor to be edited
$stmt = $word->readSingle();
$word_arr='';
if($stmt->rowCount() > 0){
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // create array

    $word_arr=array(
        "id" => $row['id'],
        "tr" => $row['tr'],
        "es" => $row['es'],
        "score" => $row['score'],

    );
}
// make it json format
print_r(json_encode($word_arr));
?>