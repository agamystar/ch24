<?php

declare(strict_types=1);

namespace app\core\classes;

use app\core\interfaces\AuthInterface;
use app\core\interfaces\ModelInterface;

class Auth implements AuthInterface
{
    private ModelInterface $model;

    public function __construct(ModelInterface $model)
    {
        $this->model = $model;
    }

    public function login(string $email, string $password): bool
    {
        $user = $this->model->findOne([
            "email" => $email
        ]);
        if ($user && password_verify($password, $user->password)) {
            Session::set("user", $user);
            return true;
        } else {
            return false;
        }
    }

    public static function logout(): void
    {
        Session::remove("user");
    }

    public static function user(): object|bool
    {
        if (Session::get("user")) {
            return Session::get("user");
        } else {
            return false;
        }

    }
}
