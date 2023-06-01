<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);


require_once "../php/database.php";
require_once "Track.php";
require_once "Album.php";
require_once "Artist.php";
require_once "SearchTrack.php";
require_once "SearchAlbum.php";
require_once "SearchArtist.php";

function getData() {
    if (!isset($_SERVER['PATH_INFO'])) {
        return null;
    }
    DatabaseElement::connect();
    $request = substr($_SERVER['PATH_INFO'], 1);
    $request = explode('/', $request);
    $request_resource = array_shift($request);
    $request_method = $_SERVER['REQUEST_METHOD'];

    if ($request_resource == 'track') {
        if ($request_method == 'GET') {
            if (count($request) == 0) {
                $searchWord = $_GET['title'] ?? '';
                $search = new SearchTrack($searchWord);
                return $search->find();
            } else {
                $trackId = array_shift($request);
                return Track::fromId($trackId);
            }
        }
    }
    elseif ($request_resource == 'album') {
        if ($request_method == 'GET') {
            if (count($request) == 0) {
                $searchWord = $_GET['title'] ?? '';
                $search = new SearchAlbum($searchWord);
                return $search->find();
            } else {
                $albumId = array_shift($request);
                return Album::fromId($albumId);
            }
        }
    }
    elseif ($request_resource == 'artist') {
        if ($request_method == 'GET') {
            if (count($request) == 0) {
                $searchWord = $_GET['name'] ?? '';
                $search = new SearchArtist($searchWord);
                return $search->find();
            } else {
                $artistId = array_shift($request);
                return Artist::fromId($artistId);
            }
        }
    }
//    if ($request_method == 'PUT') {
//        parse_str(file_get_contents('php://input'), $_PUT);
//        return db_modify_tweet($conn, $request[0], $_PUT['login'], $_PUT['text']);
//    }
    return null;
}

echo json_encode(getData());