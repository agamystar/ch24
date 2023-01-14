<?php
declare(strict_types=1);

namespace app\core\classes;

abstract class DBModel
{

    public ?DB $db;

    public function __construct(?DB $db = null)
    {
        if ($db == null) {
            $this->db = new DB();
        } else {
            $this->db = $db;
        }

    }

    abstract public static function tableName(): string;

    abstract public function attributes(): array;

    public static function primaryKey(): string
    {
        return 'id';
    }

    public function db()
    {
        return new DB();
    }

    public function get(): array
    {
        $tableName = $this->tableName();
        $stmt = $this->db->connection()->prepare("SELECT * FROM " . $tableName);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function create(): bool
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn($attr) => ":$attr", $attributes);
        $sql = "INSERT INTO $tableName (" . implode(",", $attributes) . ") 
         VALUES (" . implode(",", $params) . ")";
        $stmt = $this->db->connection()->prepare($sql);
        foreach ($attributes as $attribute) {
            $stmt->bindValue(":$attribute", $this->{$attribute});
        }
        $stmt->execute();
        return true;
    }

    public function update($where): bool
    {
        return true;
    }

    public function delete($where): bool
    {
        return true;
    }

    public function findOne($where): bool|object
    {
        $tableName = static::tableName();
        $attributes = array_keys($where);
        $sql = implode("AND", array_map(fn($attr) => "$attr = :$attr", $attributes));
        $stmt = $this->db->connection()->prepare("SELECT * FROM $tableName WHERE $sql");
        foreach ($where as $key => $item) {
            $stmt->bindValue(":$key", $item);
        }
        $stmt->execute();
        return $stmt->fetchObject(static::class);

    }
}