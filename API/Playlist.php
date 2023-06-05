<?php

require_once "Track.php";
require_once "User.php";
require_once "DatabaseElement.php";

class Playlist extends DatabaseElement {
    protected static string $functionGet = 'dbGetPlaylistByUserAndId';
    public string $name;
    public int $userId;
    public string $creationDate;

    public static function fromArray(array $data, int $page=0): static {
        $playlist = new static($data['id_playlist'], $page);
        $playlist->name = $data['name'];
        $playlist->userId = $data['id_user'];
        $playlist->creationDate = $data['creation_date'];
        return $playlist;
    }

    public static function fromUser(int|User $element, int $page=0): false|array {
        return self::fromElement($element, 'dbGetPlaylistByUser', $page);
    }

    public static function fromIds(int $userId, int $playlistId): false|static {
        $element = new static($playlistId);
        $element->userId = $userId;
        $bool = $element->get();
        if (!$bool) {
            return false;
        }
        return $element;
    }

    public function get(): false|static {
        $data = (static::$functionGet)(self::$db, $this->userId, $this->id, $this->offset);
        if (!$data) {
            return false;
        }
        $this->name = $data['name'];
        $this->userId = $data['id_user'];
        $this->creationDate = $data['creation_date'];
        return $this;
    }

    public function add() {
        return dbAddPlaylist(self::$db, $this->name, $this->userId);
    }

    public function delete() {
        return dbDeletePlaylist(self::$db, $this->id);
    }

    public function update() {
        // TODO: Implement update() method.
    }

    public function addTrack(int $trackId) {
        return dbAddTrackToPlaylist(self::$db, $trackId, $this->id);
    }

    public function removeTrack(int $trackId) {
        return dbDeleteTrackFromPlaylist(self::$db, $trackId, $this->id);
    }

}