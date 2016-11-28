<?php

// error display
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

require_once __DIR__."/../php/Log.php";
require_once __DIR__."/../php/DataBase.php";

// routing
if($_SERVER['REQUEST_METHOD']=="POST"
    && parse_url($_SERVER["REQUEST_URI"])["path"]=="/api.php/action"){

    // get data from request
    $log = new Log();
    $log->setA($_POST["a"]);
    $log->setB($_POST["b"]);
    $log->setAction($_POST["action"]);
    $log->setAgent($_SERVER['HTTP_USER_AGENT']);

    // connect to db and save data
    $db = new DataBase();
    $db->save($log);
    
    // send response
    header('Content-type: application/json');
    echo json_encode([
        "a"=>$log->getA(),
        "b"=>$log->getB(),
        "c"=>$log->getC(),
        "action"=>$log->getAction()
    ]);
}