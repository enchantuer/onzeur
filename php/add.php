<?php

function dbAddTrackToPlaylist(PDO $db, int $id_track, int $id_playlist): bool {
    $query = $db->prepare('INSERT INTO playlist_track_ (id_playlist, id_track) VALUES (:id_playlist, :id_track)');
    return $query->execute([':id_playlist' => $id_playlist, ':id_track' => $id_track]);
}

function dbAddPlaylist(PDO $db, string $name): bool {
    $query = $db->prepare('INSERT INTO playlist_ (name) VALUES (:name)');
    return $query->execute([':name' => $name]);
}