<?php

require_once 'Search.php';
require_once 'Artist.php';
require_once 'php/get.php';

class SearchArtist extends Search {
    protected static string $searchFunction = 'dbGetArtistesByName';
    protected static string $searchElement = 'Artist';
}