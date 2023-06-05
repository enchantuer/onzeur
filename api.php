<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);


require_once "php/database.php";
require_once "API/Playlist.php";
require_once "API/Track.php";
require_once "API/Album.php";
require_once "API/Artist.php";
require_once "API/SearchTrack.php";
require_once "API/SearchAlbum.php";
require_once "API/SearchArtist.php";
require_once "API/User.php";

function checkNotFound($request): void {
    if (count($request) != 1) {
        notFound();
    }
}
function notFound(): void {
    http_response_code(404);
    echo 'Resource not found';
    exit();
}

// TODO : Add an admin exception
function checkUserConnection(int $wantedId): void {
    session_start();
    if (!(isset($_SESSION['userId']) AND isAllowedUser($wantedId))) {
        http_response_code(401);
        echo 'You must be log in as the user first';
        exit();
    }
}
// TODO : Add an admin exception
function isAllowedUser(int $wantedId): bool {
    if ($wantedId !== intval($_SESSION['userId'])) {
        return false;
    }
    return true;
}

function getJSON($request) {
    $request_resource = array_shift($request);
    $page = $_GET['page'] ?? 0;

    if ($request_resource == 'track') {
        if (count($request) == 0) {
            $searchWord = $_GET['title'] ?? '';
            $search = new SearchTrack($searchWord, $page);
            return $search->find();
        }
        $request_resource = array_shift($request);
        if ($request_resource === 'album') {
            checkNotFound($request);
            return Track::fromAlbum(array_shift($request), $page);
        }
        if ($request_resource === 'artist') {
            checkNotFound($request);
            return Track::fromArtist(array_shift($request), $page);
        }
        if (count($request) > 0 or !intval($request_resource)) {
            notFound();
        }
        return Track::fromId(intval($request_resource));
    }

    elseif ($request_resource == 'album') {
        if (count($request) == 0) {
            $searchWord = $_GET['title'] ?? '';
            $search = new SearchAlbum($searchWord, $page);
            return $search->find();
        }
        $request_resource = array_shift($request);
        if ($request_resource === 'artist') {
            checkNotFound($request);
            return Album::fromArtist(array_shift($request), $page);
        }
        if (count($request) > 0 or !intval($request_resource)) {
            notFound();
        }
        return Album::fromId(intval($request_resource));
    }

    elseif ($request_resource == 'artist') {
        if (count($request) == 0) {
            $searchWord = $_GET['name'] ?? '';
            $search = new SearchArtist($searchWord, $page);
            return $search->find();
        }
        $artistId = array_shift($request);
        if (count($request) > 0 or !intval($artistId)) {
            notFound();
        }
        return Artist::fromId($artistId);
    }

    elseif ($request_resource == 'playlist') {
        if (count($request) == 0) {
            notFound();
        }
        $userId = array_shift($request);
        checkUserConnection($userId);
        if (count($request) == 0) {
            return Playlist::fromUser($userId);
        }
        $playlistId = array_shift($request);

        if (count($request) > 0 or !intval($playlistId)) {
            notFound();
        }
        return Playlist::fromIds($userId, $playlistId);
    }

    elseif ($request_resource == 'user') {
        if (count($request) == 0) {
            session_start();
            if (!(isset($_SESSION['userId']))) {
                session_destroy();
                http_response_code(401);
                echo 'You must be log in as the user first';
                exit();
            }
            return User::fromId($_SESSION['userId']);
        }
        checkNotFound($request);
        $userId = array_shift($request);
        checkUserConnection($userId);
        return User::fromId($userId);
    }

    notFound();
}

function getData($request): string {
    return json_encode(getJSON($request));
}

function addData($request) {
    parse_str(file_get_contents('php://input'), $_PUT);
    $request_resource = array_shift($request);
    if ($request_resource == 'user') {
        if (count($request) > 0) {
            notFound();
        }
        session_start();
        $_PUT['userId'] = $_SESSION['userId'];
        $result = (User::fromPUT($_PUT))->update();
        if (is_a($result, 'ErrorAPI')) {
            $result->fetchError();
        }
        return json_encode($result);
    }
    notFound();
}

function getResponse() {
    if (!isset($_SERVER['PATH_INFO'])) {
        return null;
    }
    DatabaseElement::connect();
    $request = substr($_SERVER['PATH_INFO'], 1);
    $request = explode('/', $request);
    $request_method = $_SERVER['REQUEST_METHOD'];

    if ($request_method == 'GET') {
        return getData($request);
    }
    if ($request_method == 'PUT') {
        return addData($request);
//        return db_modify_tweet($conn, $request[0], $_PUT['login'], $_PUT['text']);
    }
    return null;
}

echo getResponse();
//getResponse();