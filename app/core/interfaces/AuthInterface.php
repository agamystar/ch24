<?php

namespace app\core\interfaces;
interface AuthInterface
{

    public  function login(string $email, string $password): bool;

    public  static function logout(): void;

    public  static function user(): object|bool;
}
