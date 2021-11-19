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
        $sql = 'SELECT * FROM tracks';

        foreach ($this->pdo->query($sql) as $row) {
            $t = new Track();
            $t->id = $row['id'];
            $t->title = $row['title'];

            $results[] = $t;
        }

        return $results;
    }

    public function find(int $id): ?Track
    {
        $sql = 'SELECT * FROM tracks WHERE id = :id';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        
        $row = $stmt->fetch();
        if (!$row) {
            return null;
        }

        // TODO: delete duplicated code
        $t = new Track();
        $t->id = $row['id'];
        $t->title = $row['title'];

        return $t;
    }
}
