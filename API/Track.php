<?php

require_once "Artist.php";
require_once "Album.php";

class Track {
    // Properties
    public Artist $artist;
    public Album $album;
    public string $title;
    public int $duration;
}