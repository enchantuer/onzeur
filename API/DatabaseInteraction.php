<?php

require_once dirname(__DIR__).'/php/database.php';

abstract class DatabaseInteraction {
    protected static PDO $db;

    protected int $offset;

    public function __construct(int $page=0) {
        $this->offset = $page * 20;
    }

    public static function connect(): false|PDO {
        if (!isset(self::$db)) {
            self::$db = dbConnect();
        }
        return self::$db;
    }
}