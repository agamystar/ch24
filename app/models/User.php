<?php
declare(strict_types=1);
namespace app\models;
use app\core\classes\DB;
use app\core\classes\DBModel;
use app\core\interfaces\ModelInterface;

class User  extends DBModel implements ModelInterface
{
    public string $name;
    public string $email;
    public string $password;

    public function __construct(DB $db = null)
    {
        parent::__construct($db);
    }
    public static function tableName(): string
    {
        return "users";
    }
    public function attributes(): array
    {
        return ['name', 'email', 'password'];
    }

}
