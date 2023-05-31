<?php

function dbAddTrackToPlaylist(PDO $db, int $id_track, int $id_playlist): bool {
    $query = $db->prepare('INSERT INTO playlist_track_ (id_playlist, id_track) VALUES (:id_playlist, :id_track)');
    return $query->execute([':id_playlist' => $id_playlist, ':id_track' => $id_track]);
}

function dbAddPlaylist(PDO $db, string $name): bool|int {
    $query = $db->prepare('INSERT INTO playlist_ (name) VALUES (:name) RETURNING id_playlist');
    $query->execute([':name' => $name]);
    return $query->fetchColumn();
}

function dbAddTrackToFavorites(PDO $db, int $id_track, int $id_user): bool {
    $query = $db->prepare('INSERT INTO playlist_track (id_playlist, id_track) VALUES ((SELECT id_playlist_favorite from user_ where id_user = :id_user), :id_track)');
    return $query->execute([':id_user' => $id_user, ':id_track' => $id_track]);
}

