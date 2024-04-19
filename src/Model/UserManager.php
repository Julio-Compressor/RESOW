<?php

namespace App\Model;

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

    public function insert(array $credentials)
    {
        $statement = $this->pdo->prepare("INSERT INTO " . static::TABLE .
            " (`email`, `password`, `firstname`, `lastname`, `address`, `address2`, `zip_code`, `pays`, `phone`)
            VALUES (:email, :password, :firstname, :lastname, :address, :address2, :zip_code, :pays, :phone)");
        $statement->bindValue(':email', $credentials['email']);
        $statement->bindValue(':password', password_hash($credentials['password'], PASSWORD_DEFAULT));
        $statement->bindValue(':firstname', $credentials['firstname']);
        $statement->bindValue(':lastname', $credentials['lastname']);
        $statement->bindValue(':address', $credentials['address']);
        $statement->bindValue(':address2', $credentials['address2']);
        $statement->bindValue(':zip_code', $credentials['zip_code']);
        $statement->bindValue(':pays', $credentials['pays']);
        $statement->bindValue(':phone', $credentials['phone']);
        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }
}
