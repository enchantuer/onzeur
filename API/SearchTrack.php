<?php

require_once 'Search.php';
require_once 'Track.php';
require_once 'php/get.php';

class SearchTrack extends Search {
    protected static string $searchFunction = 'dbGetTracksByTitle';
    protected static string $searchElement = 'Track';
}