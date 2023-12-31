<?php

namespace Core;

use PDO;
use PDOException;
use PDOStatement;

class Database
{
    private PDO $connection;

    protected PDOStatement $statement;

    public function __construct($config, $username = 'sagnunes', $password = 'tag@admin')
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        try {
            $this->connection = new PDO($dsn, $username, $password, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
        } catch (PDOException $exception) {
            dd($exception);
        }
    }

    public function query($query, $params = []): Database
    {
        $this->statement = $this->connection->prepare($query);

        $this->statement->execute($params);

        return $this;
    }

    public function find(): false|array
    {
        return $this->statement->fetch();
    }

    public function get(): false|array
    {
        return $this->statement->fetchAll();
    }

    public function findOrFail(): false|array
    {
        $result = $this->find();
        if (!$result) {
            abort();
        }

        return $result;
    }
}