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
        $sql = 'SELECT * FROM tracks';
        $rows = $this->pdo->query($sql);

        return $this->mapRows($rows);
    }

    public function find(int $id): ?Track
    {
        $sql = 'SELECT * FROM tracks WHERE id = :id';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch();

        return $this->mapRow($row);
    }

    public function insert(Track $t): bool
    {
        $sql = 'INSERT INTO tracks (title) VALUES (:title)';

        $stmt = $this->pdo->prepare($sql);
        
        return $stmt->execute([
            'title' => $t->title
        ]);
    }

    private function mapRow(iterable $row): Track
    {
        if (!$row) {
            return null;
        }
        
        $t = new Track();
        $t->id = $row['id'];
        $t->title = $row['title'];

        return $t;
    }

    /** @var Track[] */
    private function mapRows(iterable $rows): array
    {
        $results = [];

        foreach ($rows as $row) {
            $results[] = $this->mapRow($row);
        }

        return $results;
    }
}
