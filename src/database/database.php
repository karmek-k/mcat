<?php

namespace KarmekK\Mcat\Database;

use PDO;

class SqliteDatabase
{
    private PDO $db;

    public function __construct(string $dbName = 'mcat.db')
    {
        $this->db = new PDO('sqlite:' . $dbName);
        
        $tables = file_get_contents('database/tables.sql');
        $this->db->exec($tables);
    }

    // temporary, will be deleted
    public function getPdo() {
        return $this->db;
    }
}