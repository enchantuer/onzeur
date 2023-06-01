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
    $query = $db->prepare('SELECT * FROM album_ NATURAL JOIN music_type_ WHERE id_artist = :id');
    $query->execute([':id' => $id]);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function dbGetTracksByTitle(PDO $db, string $title): false|array {
    $query = $db->prepare('SELECT * FROM track_ WHERE LOWER(title) LIKE :title');
    $query->execute([':title' => "%$title%"]);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function dbGetAlbumsByTitle(PDO $db, string $title): false|array {
    $query = $db->prepare('SELECT * FROM album_ NATURAL JOIN music_type_ WHERE LOWER(title) LIKE :title');
    $query->execute([':title' => "%$title%"]);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function dbGetArtistesByName(PDO $db, string $name): false|array {
    $query = $db->prepare('SELECT * FROM artist_ NATURAL JOIN artist_type_ WHERE LOWER(name) LIKE :name');
    $query->execute([':name' => "%$name%"]);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function dbGetNumberOfTrackByAlbum(PDO $db, int $id): false|int {
    $query = $db->prepare('SELECT count(*) FROM track_ WHERE id_album = :id');
    $query->execute([':id' => $id]);
    return $query->fetchColumn();
}

function dbGetNumberOfTrackByArtist(PDO $db, int $id): false|int {
    $query = $db->prepare('SELECT count(*) FROM album_ WHERE id_artist = :id');
    $query->execute([':id' => $id]);
    return $query->fetchColumn();
}

function dbGetNumberOfAlbumByArtist(PDO $db, int $id): false|int {
    $query = $db->prepare('SELECT count(*) FROM album_ WHERE id_album = :id');
    $query->execute([':id' => $id]);
    return $query->fetchColumn();
}