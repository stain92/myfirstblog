<?php

namespace Database;


class PDODatabase implements DatabaseInterface
{
    /**
     * @var \PDO
     */
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }



    public function getErrorInfo(): array
    {
        return $this->pdo->errorInfo();
    }

    public function lastInsertId():int{
        return $this->pdo->lastInsertId();
    }

    /**
     * @param string $query
     * @return StatementInterface
     */
    public function query(string $query): StatementInterface
    {
        $stmt = $this->pdo->prepare($query);
        return new PDOPreparedStatement($stmt);
    }


}