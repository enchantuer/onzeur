<?php

require_once "DatabaseElement.php";


require_once "../php/get.php";

class Track extends DatabaseElement {
    // Properties
    protected static string $functionGet = 'dbGetTrack';
    public int $artistId;
    public int $albumId;
    public string $title;
    public int $duration;
    public string $url;

    public static function fromArray(array $data): static {
        $track = new static($data['id_track']);
        $track->artistId = $data['id_artist'];
        $track->albumId = $data['id_album'];
        $track->title = $data['title'];
        $track->duration = $data['duration'];
        $track->url = $data['url'];
        return $track;
    }

    public static function fromAlbum(int|Album $element): false|array {
        return self::fromElement($element, 'dbGetTracksByAlbum');
    }
    public static function fromArtist(int|Album $element): false|array {
        return self::fromElement($element, 'dbGetTracksByArtist');
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
        return $this;
    }

    function add(): void {
        // TODO: Implement void() method.
    }

    public function update() {
        // TODO: Implement update() method.
    }
}