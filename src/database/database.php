<?php

namespace KarmekK\Mcat\Database;

use PDO;

interface Database
{
    function __construct(string $dbName);
    function getPdo(): PDO;
}

class SqliteDatabase implements Database
{
    private PDO $db;

    public function __construct(string $dbName = 'mcat.db')
    {
        $this->db = new PDO('sqlite:' . $dbName);
        
        $tables = file_get_contents('database/tables.sql');
        $this->db->exec($tables);
    }

    public function getPdo(): PDO
    {
        return $this->db;
    }
}