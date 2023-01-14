<?php
declare(strict_types=1);
namespace app\core\classes;
session_start();

class Session
{

    public static function set(string $key, mixed $value):void
    {
        $_SESSION[$key] = $value;
    }

    public static function get(string $key):mixed
    {
        return $_SESSION[$key] ?? false;
    }
    public static function remove(string $key):void
    {
        unset($_SESSION[$key]);
    }
    public static function setFlash(string $k, mixed $v):void
    {
        $_SESSION["flash"][$k] = $v;
    }
    public static function getFlash(string $name):string|bool
    {
        return $_SESSION["flash"][$name] ?? "";
    }
    public static function setError(string $k, mixed $v):void
    {
        $_SESSION["error"][$k] = $v;

    }
    public static function getError(string $name):string|bool
    {
        return $_SESSION["error"][$name] ?? false;
    }
    public static function setOld(string $k,mixed $v):void
    {
        $_SESSION["old"][$k] = $v;
    }
    public static function getOld(string $name):string
    {
        return  $_SESSION["old"][$name] ?? "";
    }

    public static function clearOldFlashError():void
    {
        unset($_SESSION["error"]);
        unset($_SESSION["flash"]);
        unset($_SESSION["old"]);
    }

} 