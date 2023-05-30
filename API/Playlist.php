<?php

require_once "Track.php";
require_once "../php/User.php";

class Playlist {
    public string $name;
    public array $tracks;
    public User $owner;
}