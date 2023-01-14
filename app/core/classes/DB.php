<?php
declare(strict_types=1);

namespace app\core\classes;

use app\core\App;

class DB
{
    private static ?\PDO $dbInstance = null;

    function __construct()
    {
        if (self::$dbInstance == null) {
            $conn = new \PDO("mysql:host=" . App::$config["db"]["DB_HOST"] . ";dbname=" . App::$config["db"]["DB_NAME"],
                App::$config["db"]["DB_USER"], App::$config["db"]["DB_PASS"]);
            $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            self::$dbInstance = $conn;
        }
    }

    public  function connection(): \PDO
    {
            return self::$dbInstance;
    }
}