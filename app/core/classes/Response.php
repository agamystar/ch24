<?php
declare(strict_types=1);

namespace app\core\classes;

class Response
{

    public function back(array $flash = [], array $errors = []): void
    {
        Session::clearOldFlashError();
        foreach ($flash as $k => $v) {
            Session::setFlash($k, $v);
        }
        foreach ($errors as $k => $v) {
            Session::setError($k, $v);
        }
        foreach (Request::all() as $key => $value) {
            Session::setOld($key, $value);
        }

        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }

    public static function route(string $url): void
    {
        Session::clearOldFlashError();
        header("Location: " . url() . $url);
    }
}
