<?php

require_once "DatabaseElement.php";
require_once "Album.php";
require_once "Track.php";

class Artist extends DatabaseElement {
    // Properties
    protected static string $functionGet = 'dbGetArtist';
    public string $name;
    public string $type;
    public int $nbOfAlbums;
    public int $nbOfTracks;
//    public string $imageUrl;

    private function getNumbers(): void {
        $this->nbOfTracks = dbGetNumberOfTrackByArtist(self::$db, $this->id);
        $this->nbOfAlbums = dbGetNumberOfAlbumByArtist(self::$db, $this->id);
    }

    public static function fromArray(array $data, int $page=0): static {
        $artist = new static($data['id_artist'], $page);
//        $album->imageUrl = $data['image'];
        $artist->type = $data['type'];
        $artist->name = $data['name'];
        $artist->getNumbers();
        return $artist;
    }

    public function get(): false|static {
        $data = parent::get();
        if (!$data) {
            return false;
        }
        $this->name = $data['name'];
        $this->type = $data['type'];
//        $this->imageUrl = $data['image'];
        $this->getNumbers();
        return $this;
    }

    public function add() {
        // TODO: Implement add() method.
    }

    public function update() {
        // TODO: Implement update() method.
    }
}