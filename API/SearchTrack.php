<?php

require_once 'Search.php';
require_once 'Track.php';
require_once '../php/get.php';

class SearchTrack extends Search {
    function find(): false|array {
        $this->results = [];
        $data = dbGetTracksByTitle(self::$db, $this->search);
        if ($data === false) {
            return false;
        }
        foreach ($data as $trackData) {
            $this->results[] = Track::fromArray($trackData);
        }
        return $this->results;
    }
}