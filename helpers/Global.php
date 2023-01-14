<?php
use app\core\classes\Session;

if (!function_exists("flash_session")) {
    function flash_session($name): string
    {
        return Session::getFlash($name);
    }
}

if (!function_exists("error")) {
    function error($name): string
    {
        return Session::getError($name);
    }
}

if (!function_exists("old")) {
    function old($name): string
    {
        return Session::getOld($name);
    }
}
if (!function_exists("url")) {
    function url(): string
    {
        return "http://" . $_SERVER["HTTP_HOST"];
    }
}