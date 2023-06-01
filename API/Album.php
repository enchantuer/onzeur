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
    public int $nbOfTrack;

    private function getNumbers(): void {
        $this->nbOfTrack = dbGetNumberOfTrackByAlbum(self::$db, $this->id);
    }

    public static function fromArtist(int|Album $element): false|array {
        return self::fromElement($element, 'dbGetAlbumsByArtist');
    }

    public static function fromArray(array $data): static {
        $album = new static($data['id_album']);
        $album->artistId = $data['id_artist'];
        $album->title = $data['title'];
        $album->imageUrl = $data['image'];
        $album->type = $data['type'];
        $album->getNumbers();
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
        return $this;
    }

    public function add() {
        // TODO: Implement add() method.
    }

    public function update() {
        // TODO: Implement update() method.
    }
}