<?php

// get database connection
include_once '../config/database.php';

// instantiate type object
include_once '../objects/type.php';

$database = new Database();
$db = $database->getConnection();

$type = new Type($db);

// set doctor property values
$type->id =isset($_REQUEST['id'])? $_REQUEST['id']:'';

// remove the doctor
if($type->delete()){
    $type_arr=array(
        "status" => true,
        "message" => "Basari ile silindi!"
    );
}
else{
    $type_arr=array(
        "status" => false,
        "message" => "Oda tipi silinemiyor!"
    );
}
print_r(json_encode($type_arr));
?>
