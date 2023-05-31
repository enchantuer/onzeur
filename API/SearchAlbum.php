<?php

require_once 'Search.php';
require_once 'Album.php';
require_once '../php/get.php';

class SearchAlbum extends Search {

    function find(): false|array {
        $this->results = [];
        $data = dbGetAlbumsByTitle(self::$db, $this->search);
        if ($data === false) {
            return false;
        }
        foreach ($data as $albumData) {
            $this->results[] = Album::fromArray($albumData);
        }
        return $this->results;
    }
}