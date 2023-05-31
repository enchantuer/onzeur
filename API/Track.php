<?php

require_once "DatabaseElement.php";


require_once "../php/get.php";

class Track extends DatabaseElement {
    // Properties
    public int $artistId;
    public int $albumId;
    public string $title;
    public int $duration;

//    public function __construct(int $id=null) {
//        $this->id = $id;
//    }

    public static function fromArray(array $data): static {
        $track = new static($data['id_track']);
        $track->artistId = $data['id_artist'];
        $track->albumId = $data['id_album'];
        $track->title = $data['title'];
        $track->duration = $data['duration'];
        return $track;
    }

    public function get(): false|static {
        $data = dbGetTrack(self::$db, $this->id);
        if (!$data) {
            return false;
        }
        $this->artistId = $data['id_artist'];
        $this->albumId = $data['id_album'];
        $this->title = $data['title'];
        $this->duration = $data['duration'];
        return $this;
    }

    function add(): void {
        // TODO: Implement void() method.
    }

    public function update() {
        // TODO: Implement update() method.
    }
}