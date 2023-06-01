<?php

function dbGetArtistes(PDO $db, int $offset=0): false|array {
    $query = $db->prepare('SELECT * FROM artist_ ORDER BY id_artist LIMIT 20 OFFSET :offset');
    $query->execute([':offset' => $offset]);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function dbGetArtist(PDO $db, int $id): false|array {
    $query = $db->prepare('SELECT * FROM artist_ NATURAL JOIN artist_type_ WHERE id_artist = :id');
    $query->execute([':id' => $id]);
    return $query->fetch(PDO::FETCH_ASSOC);
}

function dbGetAlbums(PDO $db, int $offset=0): false|array {
    $query = $db->prepare('SELECT * FROM album_ ORDER BY id_album LIMIT 20 OFFSET :offset');
    $query->execute([':offset' => $offset]);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function dbGetAlbum(PDO $db, int $id): false|array {
    $query = $db->prepare('SELECT * FROM album_ NATURAL JOIN music_type_ WHERE id_album = :id');
    $query->execute([':id' => $id]);
    return $query->fetch(PDO::FETCH_ASSOC);
}

 function dbGetTracks(PDO $db, int $offset=0): false|array {
    $query = $db->prepare('SELECT * FROM track_ ORDER BY id_track LIMIT 20 OFFSET :offset');
    $query->execute([':offset' => $offset]);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function dbGetTrack(PDO $db, int $id): false|array {
    $query = $db->prepare('SELECT * FROM track_ WHERE id_track = :id');
    $query->execute([':id' => $id]);
    return $query->fetch(PDO::FETCH_ASSOC);
}

function dbGetTracksByAlbum(PDO $db, int $id, int $offset=0): false|array {
    $query = $db->prepare('SELECT * FROM track_ WHERE id_album = :id ORDER BY id_track LIMIT 20 OFFSET :offset');
    $query->execute([':id' => $id, ':offset' => $offset]);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function dbGetTracksByArtist(PDO $db, int $id, int $offset=0): false|array {
    $query = $db->prepare('SELECT * FROM track_ WHERE id_artist = :id');
    $query->execute([':id' => $id, ':offset' => $offset]);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function dbGetAlbumsByArtist(PDO $db, int $id, int $offset=0): false|array {
    $query = $db->prepare('SELECT * FROM album_ NATURAL JOIN music_type_ WHERE id_artist = :id ORDER BY id_album LIMIT 20 OFFSET :offset');
    $query->execute([':id' => $id, ':offset' => $offset]);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function dbGetTracksByTitle(PDO $db, string $title, int $offset=0): false|array {
    $query = $db->prepare('SELECT * FROM track_ WHERE LOWER(title) LIKE :title ORDER BY title LIMIT 20 OFFSET :offset');
    $query->execute([':title' => "%$title%", ':offset' => $offset]);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function dbGetAlbumsByTitle(PDO $db, string $title, int $offset=0): false|array {
    $query = $db->prepare('SELECT * FROM album_ NATURAL JOIN music_type_ WHERE LOWER(title) LIKE :title ORDER BY title LIMIT 20 OFFSET :offset');
    $query->execute([':title' => "%$title%", ':offset' => $offset]);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function dbGetArtistesByName(PDO $db, string $name, int $offset=0): false|array {
    $query = $db->prepare('SELECT * FROM artist_ NATURAL JOIN artist_type_ WHERE LOWER(name) LIKE :name ORDER BY name LIMIT 20 OFFSET :offset');
    $query->execute([':name' => "%$name%", ':offset' => $offset]);
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