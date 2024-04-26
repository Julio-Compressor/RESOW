<?php

namespace App\Model;

use PDO;

class UserManager extends AbstractManager
{
    public const TABLE = 'user' ;

    public function selectOneByEmail(string $email)
    {
        $statement = $this->pdo->prepare("SELECT * FROM " . self::TABLE . " WHERE email = :email ");
        $statement->bindValue('email', $email, \PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetch();
    }

//La function qui permet à l'utilisateur de créer un compte

    public function insert(array $userdata)
    {
        $statement = $this->pdo->prepare("INSERT INTO " . static::TABLE .
            " (`email`, `password`, `firstname`, `lastname`)
            VALUES (:email, :password, :firstname, :lastname)");
        $statement->bindValue(':email', $userdata['email'], PDO::PARAM_STR);
        $statement->bindValue(':password', password_hash($userdata['password'], PASSWORD_DEFAULT));
        $statement->bindValue(':firstname', $userdata['firstname'], PDO::PARAM_STR);
        $statement->bindValue(':lastname', $userdata['lastname'], PDO::PARAM_STR);
        $statement->execute();

        return (int)$this->pdo->lastInsertId();
    }

    public function update(array $userdata)
    {

        $statement = $this->pdo->prepare("UPDATE " . static::TABLE .
        " SET password=:password WHERE email=:email");
        $statement->bindValue(':email', $userdata['email'], PDO::PARAM_STR);
        $statement->bindValue(':password', password_hash($userdata['password'], PASSWORD_DEFAULT));
        $statement->execute();

        return (int)$this->pdo->lastInsertId();
    }
}
