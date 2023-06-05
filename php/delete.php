<?php

function dbDeleteTrackFromPlaylist(PDO $db, int $id_track, int $id_playlist): bool {
    $query = $db->prepare('DELETE FROM playlist_track_ WHERE id_playlist = :id_playlist AND id_track = :id_track');
    return $query->execute([':id_playlist' => $id_playlist, ':id_track' => $id_track]);
}

function dbDeletePlaylist(PDO $db, int $id): bool {
    $query = $db->prepare('DELETE FROM playlist_ WHERE id_playlist = :id');
    return $query->execute([':id' => $id]);
}

function dbDeleteTrackFromFavorites(PDO $db, int $userId, int $trackId): bool {
    $query = $db->prepare('DELETE FROM playlist_track_ WHERE id_track = :id_track AND id_playlist = (SELECT id_playlist FROM playlist_ WHERE id_user = :id_user AND name = \'Favorites\')');
    return $query->execute([':id_track' => $trackId, ':id_user' => $userId]);
}
