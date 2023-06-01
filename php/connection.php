<?php
require_once "constants.php";
function check_connection() : void {
    session_start();
    if ($_SESSION['id_user'] !== true) {
        header("Location: " . ROOT . "/src/disconnect.php");
        die();
    }
}