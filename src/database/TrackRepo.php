<?php

namespace KarmekK\Mcat\Database;

use KarmekK\Mcat\Database\Models\Track;
use PDO;

class TrackRepo
{
    private PDO $pdo;

    public function __construct(Database $db)
    {
        $this->pdo = $db->getPdo();
    }

    /**
     * @return Track[]
     */
    public function findAll(): array
    {
        $results = [];

        foreach ($this->pdo->query('SELECT id, title FROM tracks') as $row) {
            $t = new Track();
            $t->id = $row['id'];
            $t->title = $row['title'];

            $results[] = $t;
        }

        return $results;
    }
}
