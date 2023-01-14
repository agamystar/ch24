<?php
declare(strict_types=1);

namespace app\core\classes;
class Request
{
    public static function get(string $name): string|bool
    {
        return $_REQUEST[$name] ?? false;
    }

    public static function all(): array
    {
        return $_REQUEST;
    }

    /** get or post */
    public static function getMethod(): string
    {
        return $_SERVER["REQUEST_METHOD"];
    }

    /**get the current path e.g /post/create **/
    public static function getPath(): string
    {
        return $_SERVER['REQUEST_URI'];
    }
}
