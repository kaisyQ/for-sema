<?php

declare(strict_types= 1);

namespace Jason\Backend\Core\Database;

class DatabaseFactory
{
    private const DEFAULT_CHARSET = 'utf-8';

    private string $host; 
    private string $port;
    private string $username;
    private string $password;
    private string $dbName;
    private string $charset;

    public function __construct(
        string $host, 
        string $port,
        string $username,
        string $password,
        string $dbName,
        string $charset = self::DEFAULT_CHARSET
    ) {
        $this->host = $host;
        $this->port = $port;
        $this->dbName = $dbName;
        $this->username = $username;
        $this->password = $password;
        $this->charset = $charset;
    }

    public function create(): Database
    {
        $pdo = new \PDO($this->prepareDSN());

        return new Database($pdo);
    }

    private function prepareDSN(): string 
    {
        return "postgresql://{$this->username}:{$this->password}@{$this->host}:{$this->port}/{$this->dbName}?serverVersion=16&charset={$this->charset}";
    }
}
