<?php

namespace App\Model;

use PDO;

class AdminManager extends AbstractManager
{
    public const TABLE = 'form';
    public function contactMessage()
    {
        $query = "SELECT * FROM " . static::TABLE . " ORDER BY id DESC ";

        return $this->pdo->query($query)->fetch();
    }
}
