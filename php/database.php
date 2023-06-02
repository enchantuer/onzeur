<?php
require_once 'constants.php';
function dbConnect() {
    try  {
        $db = new PDO('pgsql:host='.DB_SERVER.';port='.DB_PORT.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }
    catch (PDOException $exception)  {
        error_log('Connection error: '.$exception->getMessage());
        return false;
    }
    return $db;
}

function dbVerifyPassword(PDO $conn, string $email, string $password) : bool  {
    $statement = $conn->prepare("SELECT id_user, password FROM user_ WHERE email=:email");
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $bool = $statement->execute();
    if (!$bool) {
        return false;
    }
    $result = $statement->fetch();
    $valid_password = password_verify($password, $result['password']);

    if (!$valid_password) {
        return false;
    }
    return $result['id_user'];
}