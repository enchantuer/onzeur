<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);


require_once "../php/database.php";

function getData() {
    $db = db_connect();
    $request = substr($_SERVER['PATH_INFO'], 1);
    $request = explode('/', $request);
    $request_resource = array_shift($request);
    $request_method = $_SERVER['REQUEST_METHOD'];

    if ($request_resource == 'artist') {
        if ($request_method == 'GET') {
            $artist = array_shift($request);

        }
    }


//    if ($request_method == 'PUT') {
//        parse_str(file_get_contents('php://input'), $_PUT);
//        return db_modify_tweet($conn, $request[0], $_PUT['login'], $_PUT['text']);
//    }
}

echo json_encode(getData());