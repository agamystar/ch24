<?php
declare(strict_types=1);
namespace app\core\classes;
class Hashing
{
    public static function make(string $password):string
    {
        return \password_hash($password, PASSWORD_DEFAULT);
    }

}