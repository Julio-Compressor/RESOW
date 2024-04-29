<?php

namespace App\Model;

use PDO;

class AdminManager extends AbstractManager
{
    public const TABLE = 'user';

    public function deleteUser()
    {
        $statement = $this->pdo->prepare("DELETE FROM " . self::TABLE . "WHERE `id`= :id");

        return $statement->execute();
    }

    public function update(array $userdata)
    {
        $statement = $this->pdo->prepare("UPDATE " . static::TABLE .
        " SET is_admin=:is_admin WHERE id=:id");

        $statement->bindValue(':is_admin', $userdata['is_admin'], PDO::PARAM_BOOL);
        $statement->bindValue(':id', $userdata['id'], PDO::PARAM_INT);
        $statement->execute();

        return (int)$this->pdo->lastInsertId();
    }
}
