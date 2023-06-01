<?php

function dbAddTrackToPlaylist(PDO $db, int $id_track, int $id_playlist): bool {
    $query = $db->prepare('INSERT INTO playlist_track_ (id_playlist, id_track) VALUES (:id_playlist, :id_track)');
    return $query->execute([':id_playlist' => $id_playlist, ':id_track' => $id_track]);
}

function dbAddPlaylist(PDO $db, string $name, int $id_user): bool|int {
    $query = $db->prepare('INSERT INTO playlist_ (name,id_user) VALUES (:name, :id_user) RETURNING id_playlist');
    $query->execute([':name' => $name, ':id_user' => $id_user]);
    return $query->fetchColumn();
}

function dbAddTrackToFavorites(PDO $db, int $id_track, int $id_user): bool {
    $query = $db->prepare('INSERT INTO playlist_track (id_playlist, id_track) VALUES ((SELECT id_playlist_favorite from user_ where id_user = :id_user), :id_track)');
    return $query->execute([':id_user' => $id_user, ':id_track' => $id_track]);
}

function dbAddUser(PDO $db, string $first_name, string $name, string $birth_date, string $email, string $password): bool {
    $db->beginTransaction();
    
    $query = $db->prepare('INSERT INTO user_ (first_name, name, birth_date, email, password) VALUES (:first_name, :name, :birth_date, :email, :password) RETURNING id_user');
    $hash = crypt($password, '$5$rounds=5000$gnsltinfgwlqpazm$');
    $success = $query->execute([':first_name' => $first_name, ':name' => $name, ':birth_date' => $birth_date, ':email' => $email, ':password' => $hash]);
    if(!$success) {
        $db->rollBack();
        return false;
    }
    $user_id = $query->fetchColumn();
    $favorite_playlist = dbAddPlaylist($db, 'Favorites', $user_id);
    if(!$favorite_playlist) {
        $db->rollBack();
        return false;
    }
    $query = $db->prepare('UPDATE user_ SET id_playlist_favorite = :id_playlist_favorite WHERE id_user = :id_user');
    $success = $query->execute([':id_playlist_favorite' => $favorite_playlist, ':id_user' => $user_id]);
    if(!$success) {
        $db->rollBack();
        return false;
    }
    $db->commit();
    return true;
}