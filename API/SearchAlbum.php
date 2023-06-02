<?php

require_once 'Search.php';
require_once 'Album.php';
require_once 'php/get.php';

class SearchAlbum extends Search {
    protected static string $searchFunction = 'dbGetAlbumsByTitle';
    protected static string $searchElement = 'Album';
}