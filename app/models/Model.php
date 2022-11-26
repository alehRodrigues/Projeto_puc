<?php

namespace app\models;

use PDO;
use app\database\Filters;
use app\database\Connection;

abstract class Model
{

    private string $fields = '*';
    private string $filters = '';

    public function setFields(string $fields)
    {
        $this->fields = $fields;
    }

    public function setFilters(Filters $filters)
    {
        $this->filters = $filters->dump();
    }

    public function update(string $field, string|int $fieldValue, array $data)
    {
        try {
            $connection = Connection::getConnection();
            $sql = "UPDATE {$this->table} SET ";

            foreach ($data as $key => $value) {
                $sql .= "{$key} = :{$key}, ";
            }

            $sql = rtrim($sql, ', ');

            $sql .= " WHERE {$field} = :{$field}";


            $data[$field] = $fieldValue;

            $stmt = $connection->prepare($sql);


            $stmt->execute($data);

            return $stmt->rowCount();
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function fetchAll()
    {
        try {

            $sql = "SELECT {$this->fields} FROM {$this->table} {$this->filters}";

            $connection = Connection::getConnection();
            $query = $connection->query($sql);
            return $query->fetchAll(PDO::FETCH_CLASS, get_called_class());
        } catch (\PDOException $e) {
            dd($e->getMessage());
        }
    }

    public function findBy(string $field, string $value)
    {
        try {
            $sql = "select {$this->fields} from {$this->table} where {$field} = :{$field}";
            $connection = Connection::getConnection();
            $prepare = $connection->prepare($sql);
            $prepare->execute([$field => $value]);

            return $prepare->fetchObject(get_called_class());
        } catch (\PDOException $e) {
            dd($e->getMessage());
        }
    }

    public function create(array $data)
    {

        try {
            $fields = implode(',', array_keys($data));
            $values = ':' . implode(',:', array_keys($data));
            $sql = "insert into {$this->table} ({$fields}) values ({$values})";
            $connection = Connection::getConnection();
            $prepare = $connection->prepare($sql);
            $prepare->execute($data);
            return $connection->lastInsertId();
        } catch (\PDOException $e) {
            dd($e->getMessage());
        }
    }

    public function delete(string $field = '', string|int $value = '')
    {
        try {
            $sql = (!empty($this->filters)) ?
                "delete from {$this->table} {$this->filters}" :
                "delete from {$this->table} where {$field} = :{$field}";

            $connection = Connection::getConnection();
            $prepare = $connection->prepare($sql);
            return $prepare->execute(empty($this->filters) ? [$field => $value] : []);
        } catch (\PDOException $e) {
            dd($e->getMessage());
        }
    }
}
