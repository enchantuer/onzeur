<?php

require_once "DatabaseElement.php";
require_once "Artist.php";
require_once "Track.php";

class Album extends DatabaseElement {
    // Properties
    protected static string $functionGet = 'dbGetAlbum';
    public int $artistId;
    public string $title;
    public string $releaseDate;
    public string $imageUrl;
    public string $type;
    public int $nbOfTracks;

    public string|null $artistName;

    private function getNumbers(): void {
        $this->nbOfTracks = dbGetNumberOfTrackByAlbum(self::$db, $this->id);
    }

    public static function fromArtist(int|Album $element, int $page=0): false|array {
        return self::fromElement($element, 'dbGetAlbumsByArtist', $page);
    }

    public static function fromArray(array $data, int $page=0): static {
        $album = new static($data['id_album'], $page);
        $album->artistId = $data['id_artist'];
        $album->title = $data['title'];
        $album->imageUrl = $data['image'];
        $album->type = $data['type'];
        $album->getNumbers();
        $album->artistName = $data['artist_name'] ?? null;
        return $album;
    }

    public function get(): false|static {
        $data = parent::get();
        if (!$data) {
            return false;
        }
        $this->getNumbers();
        $this->title = $data['title'];
        $this->type = $data['type'];
        $this->imageUrl = $data['image'];
        $this->releaseDate = $data['release_date'];
        $this->artistId = $data['id_artist'];
        $this->artistName = $data['artist_name'] ?? null;
        return $this;
    }

    public function add() {
        // TODO: Implement add() method.
    }

    public function update() {
        // TODO: Implement update() method.
    }
}