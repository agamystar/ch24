<?php
declare(strict_types=1);

namespace app\models;

use app\core\classes\DB;
use app\core\classes\DBModel;
use app\core\interfaces\ModelInterface;

class Post extends DBModel implements ModelInterface
{
    public string $title;
    public string $body;
    public int $user_id;

    public function __construct(DB $db = null)
    {
        parent::__construct($db);
    }

    public static function tableName(): string
    {
        return "posts";
    }

    public function attributes(): array
    {
        return ['title', 'body', 'user_id'];
    }

    public function get(): array
    {
        $stmt = $this->db->connection()->prepare("SELECT posts.*,users.name FROM  posts  LEFT JOIN users   ON posts.user_id=users.id");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

}
