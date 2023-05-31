<?php

function dbDeleteTrackFromPlaylist(PDO $db, int $id_track, int $id_playlist): bool {
    $query = $db->prepare('DELETE FROM playlist_track_ WHERE id_playlist = :id_playlist AND id_track = :id_track');
    return $query->execute([':id_playlist' => $id_playlist, ':id_track' => $id_track]);
}

function dbDeletePlaylist(PDO $db, int $id): bool {
    $query = $db->prepare('DELETE FROM playlist_ WHERE id_playlist = :id');
    return $query->execute([':id' => $id]);
}