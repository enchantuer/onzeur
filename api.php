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
require_once "API/ErrorAPI.php";

/**
 * @throws ErrorAPI
 */
function checkNotFound($request): void {
    if (count($request) != 1) {
        notFound();
    }
}

/**
 * @throws ErrorAPI
 */
function notFound(): void {
    throw new ErrorAPI('Resource not found', 404);
}

/**
 * @throws ErrorAPI
 */
function checkUserConnection(): void {
    session_start();
    if (!isset($_SESSION['userId'])) {
        throw new ErrorAPI('You must be log in first', 401);
    }
}
/**
 * @throws ErrorAPI
 */
function checkAllowed(int $wantedId): void {
    checkUserConnection();
    if ($wantedId !== intval($_SESSION['userId'])) {
        throw new ErrorAPI('You must be log in as the user first', 401);
    }
}

/**
 * @throws ErrorAPI
 */
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
        if ($request_resource === 'playlist') {
            checkNotFound($request);
            $playlist = new Playlist(array_shift($request));
            checkAllowed($playlist->getUserId());
            return Track::fromPlaylist($playlist->id);
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
            checkUserConnection();
            return Playlist::fromUser($_SESSION['userId']);
        }
        $userId = array_shift($request);
        checkAllowed($userId);
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
            checkUserConnection();
            return User::fromId($_SESSION['userId']);
        }
        checkNotFound($request);
        $userId = array_shift($request);
        checkAllowed($userId);
        return User::fromId($userId);
    }

    elseif ($request_resource == 'favorites') {
        if (count($request) > 0) {
            notFound();
        }
        checkUserConnection();
        return (new User($_SESSION['userId']))->getFavorites();
    }

    elseif ($request_resource == 'history') {
        if (count($request) > 0) {
            notFound();
        }
        checkUserConnection();
        return Track::fromUser($_SESSION['userId']);
    }

    notFound();
}

/**
 * @throws ErrorAPI
 */
function getData($request): string {
    return json_encode(getJSON($request));
}

/**
 * @throws ErrorAPI
 */
function updateData($request) {
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

/**
 * @throws ErrorAPI
 */
function addData($request) {
    $request_resource = array_shift($request);
    checkUserConnection();
    if ($request_resource == 'history') {
        if (count($request) > 0) {
            notFound();
        }
        if (!isset($_POST['id'])) {
            return 'null';
        }
        $user = new User($_SESSION['userId']);
        return json_encode($user->addToHistory(intval($_POST['id'])));
    }

    elseif ($request_resource == 'favorites') {
        if (count($request) > 0) {
            notFound();
        }
        if (!isset($_POST['id'])) {
            return 'null';
        }
        return json_encode((new User($_SESSION['userId']))->addToFavorites($_POST['id']));
    }

    elseif ($request_resource == 'playlist') {
        if (count($request) > 0) {
            checkNotFound($request);
            $request_resource = array_shift($request);
            if ($request_resource != 'track') {
                notFound();
            }
            if (!(isset($_POST['playlistId']) AND isset($_POST['trackId']))) {
                return 'null';
            }
            json_encode((new Playlist(isset($_POST['playlistId'])))->addTrack($_POST['trackId']));
        }
        if (!isset($_POST['name'])) {
            return 'null';
        }
        return json_encode(Playlist::createByUserIdAndName($_SESSION['userId'], $_POST['name']));
    }
    notFound();
}

/**
 * @throws ErrorAPI
 */
function deleteData($request) {
    $request_resource = array_shift($request);
    session_start();
    if (!(isset($_SESSION['userId']))) {
        session_destroy();
        throw new ErrorAPI('You must be log in as the user first', 401);
    }

    if ($request_resource == 'favorites') {
        if (count($request) > 0) {
            notFound();
        }
        if (!isset($_POST['id'])) {
            return null;
        }
        return json_encode((new User($_SESSION['userId']))->removeFromFavorites($_POST['id']));
    }

    elseif ($request_resource == 'playlist') {
        if (count($request) > 0) {
            checkNotFound($request);
            $request_resource = array_shift($request);
            if ($request_resource != 'track') {
                notFound();
            }
            if (!isset($_POST['id'])) {
                return null;
            }
            $playlist = new Playlist($_POST['id']);
            checkAllowed($playlist->getUserId());
            json_encode($playlist->removeTrack($_GET['id']));
        }
        if (!isset($_POST['id'])) {
            return null;
        }
        $playlist = new Playlist($_POST['id']);
        checkAllowed($playlist->getUserId());
        return json_encode($playlist->delete());
    }
    notFound();
}

/**
 * @throws ErrorAPI
 */
function getResponse() {
    if (!isset($_SERVER['PATH_INFO'])) {
        notFound();
    }
    DatabaseElement::connect();
    $request = substr($_SERVER['PATH_INFO'], 1);
    $request = explode('/', $request);
    $request_method = $_SERVER['REQUEST_METHOD'];

    if ($request_method == 'GET') {
        return getData($request);
    }
    if ($request_method == 'POST') {
        return addData($request);
    }
    if ($request_method == 'PUT') {
        return updateData($request);
    }
    if ($request_method == 'DELETE') {
        return deleteData($request);
    }
    notFound();
}

try {
    echo getResponse();
} catch (ErrorAPI $e) {
    $e->fetchError();
}