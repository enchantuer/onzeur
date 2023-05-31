<?php

function dbGetArtistes(PDO $db): false|array {
    $query = $db->prepare('SELECT * FROM artist_');
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function dbGetArtist(PDO $db, int $id): false|array {
    $query = $db->prepare('SELECT * FROM artist_ NATURAL JOIN artist_type_ WHERE id_artist = :id');
    $query->execute([':id' => $id]);
    return $query->fetch(PDO::FETCH_ASSOC);
}

function dbGetAlbums(PDO $db): false|array {
    $query = $db->prepare('SELECT * FROM album_');
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function dbGetAlbum(PDO $db, int $id): false|array {
    $query = $db->prepare('SELECT * FROM album_ NATURAL JOIN music_type_ WHERE id_album = :id');
    $query->execute([':id' => $id]);
    return $query->fetch(PDO::FETCH_ASSOC);
}

 function dbGetTracks(PDO $db): false|array {
    $query = $db->prepare('SELECT * FROM track_');
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function dbGetTrack(PDO $db, int $id): false|array {
    $query = $db->prepare('SELECT * FROM track_ WHERE id_track = :id');
    $query->execute([':id' => $id]);
    return $query->fetch(PDO::FETCH_ASSOC);
}

function dbGetTracksByAlbum(PDO $db, int $id): false|array {
    $query = $db->prepare('SELECT * FROM track_ WHERE id_album = :id');
    $query->execute([':id' => $id]);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function dbGetTracksByArtist(PDO $db, int $id): false|array {
    $query = $db->prepare('SELECT * FROM track_ WHERE id_artist = :id');
    $query->execute([':id' => $id]);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function dbGetAlbumsByArtist(PDO $db, int $id): false|array {
    $query = $db->prepare('SELECT * FROM album_ WHERE id_artist = :id');
    $query->execute([':id' => $id]);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

