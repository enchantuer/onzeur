<?php

require_once "DatabaseElement.php";


require_once "php/get.php";

class Track extends DatabaseElement {
    // Properties
    protected static string $functionGet = 'dbGetTrack';
    public int $artistId;
    public int $albumId;
    public string $title;
    public int $duration;
    public string $url;
    public string|null $image;
    public string|null $albumName;
    public string|null $artistName;

    public static function fromArray(array $data, int $page=0): static {
        $track = new static($data['id_track'], $page);
        $track->artistId = $data['id_artist'];
        $track->albumId = $data['id_album'];
        $track->title = $data['title'];
        $track->duration = $data['duration'];
        $track->url = $data['url'];
        $track->artistName = $data['artist_name'] ?? null;
        $track->albumName = $data['album_name'] ?? null;
        $image = dbGetAlbumCover(self::$db, $track->albumId);
        $track->image = $image ?? null;
        return $track;
    }

    public static function fromAlbum(int|Album $element, int $page=0): false|array {
        return self::fromElement($element, 'dbGetTracksByAlbum', $page);
    }
    public static function fromArtist(int|Album $element, int $page=0): false|array {
        return self::fromElement($element, 'dbGetTracksByArtist', $page);
    }

    public function get(): false|static {
        $data = parent::get();
        if (!$data) {
            return false;
        }
        $this->artistId = $data['id_artist'];
        $this->albumId = $data['id_album'];
        $this->title = $data['title'];
        $this->duration = $data['duration'];
        $this->url = $data['url'];
        $this->artistName = $data['artist_name'] ?? null;
        $this->albumName = $data['album_name'] ?? null;
        $image = dbGetAlbumCover(self::$db, $this->albumId);
        $this->image = $image ?? null;
        return $this;
    }

    function add(): void {
        // TODO: Implement void() method.
    }

    public function update() {
        // TODO: Implement update() method.
    }
}