<?php

namespace App\Model;

use PDO;

class DiscoBioManager extends AbstractManager
{
    public const TABLE = 'album';

    public function update(array $album)
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE .
            " SET `title` = :title, `type` = :type, `nb_track` = :nb_track, 
            `price` = :price, `date` = :date, `description` = :description WHERE id=:id ");
        $statement->bindValue('title', $album['title'], PDO::PARAM_STR);
        $statement->bindValue('type', $album['type'], PDO::PARAM_STR);
        $statement->bindValue('nb_track', intval($album['nb_track']), PDO::PARAM_INT);
        $statement->bindValue('price', floatval($album['price']), PDO::PARAM_STR);
        $statement->bindValue('date', $album['date'], PDO::PARAM_STR);
        $statement->bindValue('description', $album['description'], PDO::PARAM_STR);
        $statement->bindValue('id', intval($album['id']), PDO::PARAM_INT);

        return $statement->execute();
    }
}
