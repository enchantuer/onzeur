<?php

require_once "Album.php";
require_once "Track.php";

class Artist {
    // Properties
    public string $name;
    public string $type;
    public array $albums;
    public array $tracks;
    public string $imageUrl;
    // Constructor

    /**
     * @param string $name
     * @param string $type
     * @param array  $albums
     * @param array  $tracks
     * @param string $image_url
     */
    function __constructor(string $name, string $type, array $albums, array $tracks, string $image_url) {

    }
    // Getters
    /**
     * @return array
     */
    public function getAlbums(): array {
        return $this->albums;
    }
    /**
     * @return string
     */
    public function getImageUrl(): string {
        return $this->imageUrl;
    }
    /**
     * @return string
     */
    public function getName(): string {
        return $this->name;
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
    public function getType(): string {
        return $this->type;
    }
    // Setters
    /**
     * @param array $albums
     */
    public function setAlbums(array $albums): void {
        $this->albums = $albums;
    }
    /**
     * @param string $imageUrl
     */
    public function setImageUrl(string $imageUrl): void {
        $this->imageUrl = $imageUrl;
    }
    /**
     * @param string $name
     */
    public function setName(string $name): void {
        $this->name = $name;
    }
    /**
     * @param array $tracks
     */
    public function setTracks(array $tracks): void {
        $this->tracks = $tracks;
    }
    /**
     * @param string $type
     */
    public function setType(string $type): void {
        $this->type = $type;
    }
}