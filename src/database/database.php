<?php

namespace KarmekK\Mcat\Database;

use PDO;

class SqliteDatabase
{
    private PDO $db;

    public function __construct(string $dbName = 'mcat.db')
    {
        $this->db = new PDO('sqlite:' . $dbName);
    }
}