<?php

namespace App\Model;

use App\Model\AbstractManager;
use PDO;

class CartManager extends AbstractManager
{
    protected PDO $pdo;

    public const TABLE = 'album';

    public function selectOneByAlbumId(string $albumId)
    {
        $statement = $this->pdo->prepare("SELECT * FROM " . static::TABLE . " WHERE id=:id");
        $statement->bindValue('id', $albumId, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }
}
