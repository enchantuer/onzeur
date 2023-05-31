<?php

require_once 'Search.php';
require_once 'Artist.php';
require_once '../php/get.php';

class SearchArtist extends Search {
    function find(): false|array {
        $this->results = [];
        $data = dbGetArtistesByName(self::$db, $this->search);
        if (!$data) {
            return false;
        }
        foreach ($data as $artistData) {
            $this->results[] = Artist::fromArray($artistData);
        }
        return $this->results;
    }
}