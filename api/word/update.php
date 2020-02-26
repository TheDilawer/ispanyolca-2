<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// get database connection
include_once '../config/database.php';

// instantiate type object
include_once '../objects/word.php';

$database = new Database();
$db = $database->getConnection();

$word = new Word($db);

// set doctor property values
$word->tr = isset($_REQUEST['tr']) ? $_REQUEST['tr'] : '';
$word->es =  isset($_REQUEST['es']) ? $_REQUEST['es'] : '';
$word->id=isset($_REQUEST['id']) ? $_REQUEST['id'] : '';



// create the doctor
if($word->update()){
    $type_arr=array(
        "id"=>$word->id,

        "tr"=>$word->tr,
        "es"=>$word->es,
        "status" => true,
        "message" => "Basari ile guncellendi!"
    );
}
else{
    $type_arr=array(
        "status" => false,
        "message" => "Güncellenirken bir hata oluştu!"
    );
}
print_r(json_encode($type_arr));
?>