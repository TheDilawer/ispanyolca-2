<?php

    // get database connection
    include_once '../config/database.php';

    // instantiate doctor object
    include_once '../objects/word.php';

    $database = new Database();
    $db = $database->getConnection();

    $word= new Word($db);

    $word_arr=array();

    // set Type property values

    $word->tr=isset($_REQUEST['tr']) ? $_REQUEST['tr'] : '';
    $word->es=isset($_REQUEST['es']) ? $_REQUEST['es'] : '';
    $word->score=0;

    // create the doctor

        if ($word->create()) {
            $word_arr = array(
                "status" => true,
                "message" => "Basarili!",
                "id" => $word->id,
                "tr" => $word->tr,
                "es" => $word->es,
                "score" => $word->score,
             );
        } else {
            $word_arr = array(
                "status" => false,
                "message" => "Sıkıntı!"
            );
        }

    print_r(json_encode($word_arr));
