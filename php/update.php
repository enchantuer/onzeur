<?php
function dbUpdateUser(PDO $db, int $userId, string $firstName, string $lastName, string $email, string $birthdate, string $password): bool {
    $query = $db->prepare('UPDATE user_ SET (first_name, name, email, birth_date, password) = (:first, :last, :email, :birth, :password) WHERE id_user = :id');
    $query->execute([':id' => $userId, ':first' => $firstName, ':last' => $lastName, ':email' => $email, ':birth' => $birthdate, ':password' => $password]);
    return $query->rowCount();
}