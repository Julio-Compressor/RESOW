<?php

namespace App\Model;

use PDO;

class AdminManager extends AbstractManager
{
    public const TABLE = 'events';
    public const TABLE2 = 'album';
    public const TABLE3 = 'article';
    public const TABLE4 = 'user';

    /**
     * Ajout events
     */
    public function addEvent(array $events)
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE .
         " (`city`, `place`, `date`) VALUES (:title, :place, :date)");
        $statement->bindValue('city', $events['city'], PDO::PARAM_STR);
        $statement->bindValue('place', $events['place'], PDO::PARAM_STR);
        $statement->bindValue('date', $events['date'], PDO::PARAM_STR);

        return $statement->execute();
    }
}
