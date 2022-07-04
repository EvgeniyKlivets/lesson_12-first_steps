<?php

namespace Core\Traits;

use Core\Model;
use PDO;

trait QueryTrait
{
    use ConnectionTrait;

    static protected string|null $tableName = null;

    static protected string $query ="";

    public static function all()
    {
        $query = "SELECT * FROM" . static::$tableName;
        return static::connect()->query($query)->fetchAll(PDO::FETCH_CLASS,static::class);
    }

    public static function find(int $id)
    {
        $query = "SELECT*FROM" . static::$tableName ."WHERE id =: id";

        $query = static::connect()->prepare($query);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();

        return $query->fetchObject(static::class);
    }
    /**
     * Return only one raw
     * @param string $column
     * @param $value
     * @return mixed
     */

    public static function findBy (string $colum, $value)
    {
        $query ="SELECT*FROM" . static::$tableName. "WHERE {$column}=:{$column}";

        $query = static::connect()->prepare($query);
        $query->bindValue(":{$column}", $value);
        $query->execute();

        return $query->fetchObject(static::class);
    }

    public static function select(array $columns = ['*']):Model
    {
        static::$query="";
        static::$query="SELECT" . implode(',', $columns) ."FROM". static::$tableName ."";

        return new static();
    }
    public static function create (array $fields)
    {
        $vars = static::preparedQueryVars($fields);

        $query ='INSERT INTO' . static::$tableName .'('.
            $vars['keys'].') VALUES (' .$vars['placeholders'].')';
        $query = static::connect()->prepare($query);

        foreach ($fields as $key => $values) {
            $query->bindValue(":{$key}", $value);
        }
        $query->execute();

        return (int) static::connect()->lastInsertId();
    }
    /**
     * $conditions = ['column', '<', 'value']
     * @param array $conditions
     */
    public function where (array $conditions)
    {
        $valueKey = array_key_last ($conditions);
        $value = $conditions[$valueKey];
        unset($conditions[$valueKey]);

        static::$query .='WHERE' . implode($conditions).':value';

        $stmt = static::connect()->prepare(static::$query);
        $stmt->bindValue(':value', $value);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS, static::class);
    }

    protected static function preparedQueryVars(array $fields):array
    {
        $keys = array_keys($fields);
        $placeholders = preg_filter('/^/', ':', $keys);

        return [
            'keys' => implode(',',$keys),
            'placeholders' => implode(',', $placeholders)
        ];
    }
}