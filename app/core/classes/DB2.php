<?php
declare(strict_types=1);

namespace app\core\classes;
use app\core\App;

final class DB2
{
    private static ?\PDO $dbInstance = null;

    private function __construct()
    {
        $conn = new \PDO("mysql:host=====" . App::$config["DB_HOST"] . ";dbname=" .App::$config["DB_NAME"], App::$config["DB_USER"],App::$config["DB_PASS"]);
        $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        self::$dbInstance = $conn;
    }

    public static function instance(): \PDO
    {
        if (self::$dbInstance == null) {
            new self();
        }
        return self::$dbInstance;
    }
}