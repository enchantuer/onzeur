<?php
require_once 'database.php';
require_once 'get.php';
function checkConnection() : void {
    session_start();
    $db = dbConnect();
    if (!$db OR !isset($_SESSION['userId']) OR !dbGetUser($db, $_SESSION['userId'])) {
        header("Location: " . "/onzeur/src/disconnect.php");
        exit();
    }
}