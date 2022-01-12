<?php

namespace App\Repository;

use App\PDO\FactoryPDO;
use App\User;
use PDO;

class PDOUserRepository implements UserRepositoryInterface
{
    function __construct(private PDO $PDO)
    {
    }

    function find(int $id): ?User
    {
        $query = "SELECT * FROM users WHERE id = $id;";
        $stmt = $this->PDO->query($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\User');
        return $stmt->fetch();
    }

    function all(): iterable
    {
        $query = "SELECT * FROM users";
        $stmt = $this->PDO->query($query);
        return $stmt->fetchALL(PDO::FETCH_CLASS, 'App\User');
    }

    public function incrementHistoryCount(User $user): void
    {
        $query = sprintf("UPDATE users SET history_count = %s WHERE id = %s",
            ((int)$user->getHistoryCount() + 1),
            $user->getId());
        $stmt = $this->PDO->prepare($query);
        $stmt->execute();
    }
}