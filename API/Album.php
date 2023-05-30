<?php

require_once "Artist.php";
require_once "Track.php";

class Album {
    // Properties
    public Artist $artist;
    public string $title;
    public int $releaseDate;
    public string $imageUrl;
    public string $type;
    public array $tracks;

    // Constructors

    /**
     * @param Artist $artist
     * @param string $title
     * @param int    $releaseDate
     * @param string $image_url
     * @param string $type
     * @param array  $tracks
     */
    function __constructor(Artist $artist, string $title, int $releaseDate, string $image_url, string $type, array $tracks) {

    }

    // Getters
    /**
     * @return string
     */
    public function getType(): string {
        return $this->type;
    }
    /**
     * @return array
     */
    public function getTracks(): array {
        return $this->tracks;
    }
    /**
     * @return string
     */
    public function getImageUrl(): string {
        return $this->imageUrl;
    }
    /**
     * @return Artist
     */
    public function getArtist(): Artist {
        return $this->artist;
    }
    /**
     * @return int
     */
    public function getReleaseDate(): int {
        return $this->releaseDate;
    }
    /**
     * @return string
     */
    public function getTitle(): string {
        return $this->title;
    }
    // Setters
    /**
     * @param string $type
     */
    public function setType(string $type): void {
        $this->type = $type;
    }
    /**
     * @param array $tracks
     */
    public function setTracks(array $tracks): void {
        $this->tracks = $tracks;
    }
    /**
     * @param string $imageUrl
     */
    public function setImageUrl(string $imageUrl): void {
        $this->imageUrl = $imageUrl;
    }
    /**
     * @param Artist $artist
     */
    public function setArtist(Artist $artist): void {
        $this->artist = $artist;
    }
    /**
     * @param int $releaseDate
     */
    public function setReleaseDate(int $releaseDate): void {
        $this->releaseDate = $releaseDate;
    }
    /**
     * @param string $title
     */
    public function setTitle(string $title): void {
        $this->title = $title;
    }
}