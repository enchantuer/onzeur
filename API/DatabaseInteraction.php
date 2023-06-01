<?php

require_once '../php/database.php';

abstract class DatabaseInteraction {
    protected static PDO $db;

    public static function connect(): false|PDO {
        if (!isset(self::$db)) {
            self::$db = dbConnect();
        }
        return self::$db;
    }
}