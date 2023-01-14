<?php

namespace app\middlewares;

use app\core\classes\Response;
use app\core\interfaces\MiddlewareInterface;
use app\core\classes\Auth;

class AuthMiddleware implements MiddlewareInterface
{
    public static function handle(): void
    {
        if (!Auth::user()) { //check the session of that model user
            Response::route('/auth/login');
        }
    }
}
