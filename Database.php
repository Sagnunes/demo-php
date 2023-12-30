<?php

class Database
{
    private string $dsn = 'mysql:host=localhost;port=3306;dbname=demo;user=root;charset=utf8mb4';
    private PDO $connection;

    public function __construct()
    {
        try {
            $this->connection = new PDO($this->dsn);
        } catch (PDOException $exception) {
            dd($exception);
        }
    }

    public function query($query): false|PDOStatement
    {
        $statement = $this->connection->prepare($query);

        $statement->execute();

        return $statement;
    }
}