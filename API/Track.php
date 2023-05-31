<?php

require_once "Artist.php";
require_once "Album.php";

class Track {
    // Properties
    public int $artistId;
    public int $albumId;
    public string $title;
    public int $duration;
}