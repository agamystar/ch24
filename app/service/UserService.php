<?php

namespace app\service;
use app\core\classes\Auth;
use app\models\User;

class UserService
{

    public function register(array $fields): bool
    {
        $user = new User();
        $user->name = $fields["name"];
        $user->email = $fields["email"];
        $user->password =$fields["password"];
        $res=$user->create();
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function login(array $fields): bool
    {
        $auth = new Auth(new User());
        return $auth->login($fields["email"], $fields["password"]);
    }
}