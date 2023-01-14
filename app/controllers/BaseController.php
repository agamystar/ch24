<?php
declare(strict_types=1);

namespace app\controllers;
class BaseController
{
    public function __construct()
    {
    }

    public function renderView(string $view, array $params = []):string
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        if (str_contains($view, ".")) {
            $arr = \str_replace('.', DIRECTORY_SEPARATOR, $view);
        }
        ob_start();
        include config('APP_ROOT'). "/views" . DIRECTORY_SEPARATOR . $arr . ".php";
        return ob_get_clean();
    }
}
