<?php

namespace App\Model;

use PDO;

class IndexManager extends AbstractManager
{
    public const TABLE = 'events';

    /**
     * Ajout d'un event
     */
    public function addEvent(array $events)
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE .
            " (`city`, `place`, `date`, `isSoldout`) VALUES (:city, :place, :date, :isSoldout)");
        $statement->bindValue('city', $events['city'], PDO::PARAM_STR);
        $statement->bindValue('place', $events['place'], PDO::PARAM_STR);
        $statement->bindValue('date', $events['date'], PDO::PARAM_STR);
        $statement->bindValue('isSoldout', $events['isSoldout'], PDO::PARAM_BOOL);

        return $statement->execute();
    }

    /**
     * Supprimer un event
     */
    public function deleteEvent()
    {
        $statement = $this->pdo->prepare("DELETE FROM " . self::TABLE . "WHERE `id`= :id");

        return $statement->execute();
    }

    /**
     * Modifie si l'event est soldout
     */
    public function update(array $events)
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET `isSoldout` = :isSoldout WHERE id=:id");
        $statement->bindValue('id', $events['id'], PDO::PARAM_INT);
        $statement->bindValue('isSoldout', $events['isSoldout'], PDO::PARAM_BOOL);

        return $statement->execute();
    }
}
