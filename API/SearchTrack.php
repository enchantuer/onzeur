<?php

require_once 'Search.php';
require_once 'Track.php';

class SearchTrack extends Search {
    protected static string $searchFunction = 'dbGetTracksByTitle';
    protected static string $searchElement = 'Track';
}