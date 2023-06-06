<?php

require_once 'Search.php';
require_once 'Artist.php';

class SearchArtist extends Search {
    protected static string $searchFunction = 'dbGetArtistesByName';
    protected static string $searchElement = 'Artist';
}