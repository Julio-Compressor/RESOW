<?php

namespace App\Model;

use PDO;

class ContactManager extends AbstractManager
{
    public const TABLE = 'form';
    public function insert(array $datacontact)
    {
        if (isset($datacontact['particulier']) && $datacontact['particulier'] === 'on') {
            $particulier = true;
        } else {
            $particulier = false;
        }

        if (isset($datacontact['professionnel']) && $datacontact['professionnel'] === 'on') {
            $professionnel = true;
        } else {
            $professionnel = false;
        }
        $statement = $this->pdo->prepare("INSERT INTO " . static::TABLE .  " (name, firstname, email, particulier, 
        professionnel, message) VALUES (:name, :firstname, :email, :particulier, :professionnel, :message)");
        $statement->bindValue('name', $datacontact['name'], PDO::PARAM_STR);
        $statement->bindValue('firstname', $datacontact['firstname'], PDO::PARAM_STR);
        $statement->bindValue('email', $datacontact['email'], PDO::PARAM_STR);
        $statement->bindValue('particulier', $particulier, PDO::PARAM_INT);
        $statement->bindValue('professionnel', $professionnel, PDO::PARAM_INT);
        $statement->bindValue('message', $datacontact['message'], PDO::PARAM_STR);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }

    public function lastContactMessage()
    {
        $query = "SELECT * FROM " . static::TABLE . " ORDER BY id DESC LIMIT 1 ";
        return $this->pdo->query($query)->fetch();
    }
}
