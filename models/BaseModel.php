<?php

require_once(ROOT . '/components/DB.php');

class BaseModel
{
    private $tableName;

    protected function __construct($tableName)
    {
        $this->tableName = $tableName;
    }

    protected function getAll()
    {
        $sql = "SELECT * FROM $this->tableName;";
        return DB::run($sql);
    }

    protected function getAllSorted(string $field, int $direction)
    {
        $sql = "SELECT * FROM $this->tableName ORDER BY $field ";
        $sql .= $direction ? 'ASC;' : 'DESC;';
        return DB::run($sql);
    }

    protected function addRow($args)
    {
        $fieldNames = array_keys($args);
        $sqlNames = implode(', ', $fieldNames);

        $queryParameters =  array_map(
            fn($field_name) => ':' . $field_name,
            $fieldNames
        );
        $sqlValues = implode(', ', $queryParameters);

        $sql = "INSERT INTO $this->tableName ($sqlNames) VALUES ($sqlValues);";

        DB::run($sql, $args);
    }

    protected function getSome($args)
    {
        $conditions = array_map(fn($k) => "$k = :$k", array_keys($args));
        $sql = "SELECT * FROM $this->tableName WHERE " . implode(' AND ', $conditions) . ';';

        return DB::run($sql, $args);
    }

    protected function updateRow($id, $args)
    {
        $setters = array_map(fn($k) => "$k = :$k", array_keys($args));

        $sql = "UPDATE $this->tableName SET " . implode(', ', $setters) . " WHERE id=$id";
        DB::run($sql, $args);
    }

    protected function deleteRow($id)
    {
        $sql = "DELETE FROM $this->tableName WHERE id = :id";
        DB::run($sql, ['id' => $id]);
    }
}