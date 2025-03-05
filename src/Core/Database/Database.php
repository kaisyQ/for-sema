<?php

declare(strict_types=1);

namespace Jason\Backend\Core\Database;

class Database 
{
    private \PDO $pdo;

    public function __construct(\PDO $pdo) 
    {
        $this->pdo = $pdo;
    }
}