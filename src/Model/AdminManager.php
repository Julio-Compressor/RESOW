<?php

namespace App\Model;

use PDO;

class AdminManager extends AbstractManager
{
    public const TABLE = 'user';

    public function add(array $userdata)
    {
        $statement = $this->pdo->prepare("INSERT INTO " . static::TABLE .
            " (`firstname`, `lastname`, `password`, `email`, `address`, `address2`,
             `zip_code`, `pays`, `phone`, `is_newsletter`, `is_admin`)
            VALUES (:firstname, :lastname, :password, :email, :address, :address2,
             :zip_code, :pays, :phone, :is_newsletter, :is_admin)");
        $statement->bindValue(':firstname', $userdata['firstname'], PDO::PARAM_STR);
        $statement->bindValue(':lastname', $userdata['lastname'], PDO::PARAM_STR);
        $statement->bindValue(':password', password_hash($userdata['password'], PASSWORD_DEFAULT));
        $statement->bindValue(':email', $userdata['email'], PDO::PARAM_STR);
        $statement->bindValue(':address', $userdata['address'], PDO::PARAM_STR);
        $statement->bindValue(':address2', $userdata['address2'], PDO::PARAM_STR);
        $statement->bindValue(':zip_code', $userdata['zip_code'], PDO::PARAM_INT);
        $statement->bindValue(':pays', $userdata['pays'], PDO::PARAM_STR);
        $statement->bindValue(':phone', $userdata['phone'], PDO::PARAM_INT);
        $statement->bindValue(':is_newsletter', $userdata['is_admin'], PDO::PARAM_BOOL);
        $statement->bindValue(':is_admin', $userdata['is_admin'], PDO::PARAM_BOOL);

        $statement->execute();

        return (int)$this->pdo->lastInsertId();
    }

    public function deleteUser()
    {
        $statement = $this->pdo->prepare("DELETE FROM " . self::TABLE . "WHERE `id`= :id");

        return $statement->execute();
    }

    public function update(array $userdata)
    {
        $statement = $this->pdo->prepare("UPDATE " . static::TABLE .
        " SET firstname=:firstname, lastname=:lastname, password=:password, email=:email,
         address=:address, address2=:address2, zip_code=:zip_code, pays=:pays, phone=:phone,
          is_newsletter=:newsletter, is_admin=:is_admin WHERE id=:id");
        $statement->bindValue(':firstname', $userdata['firstname'], PDO::PARAM_STR);
        $statement->bindValue(':lastname', $userdata['lastname'], PDO::PARAM_STR);
        $statement->bindValue(':password', password_hash($userdata['password'], PASSWORD_DEFAULT));
        $statement->bindValue(':email', $userdata['email'], PDO::PARAM_STR);
        $statement->bindValue(':address', $userdata['address'], PDO::PARAM_STR);
        $statement->bindValue(':address2', $userdata['address2'], PDO::PARAM_STR);
        $statement->bindValue(':zip_code', $userdata['zip_code'], PDO::PARAM_STR);
        $statement->bindValue(':pays', $userdata['pays'], PDO::PARAM_STR);
        $statement->bindValue(':phone', $userdata['phone'], PDO::PARAM_STR);
        $statement->bindValue(':is_newsletter', $userdata['is_newsletter'], PDO::PARAM_BOOL);
        $statement->bindValue(':is_admin', $userdata['is_admin'], PDO::PARAM_BOOL);
        $statement->bindValue(':id', $userdata['id'], PDO::PARAM_INT);
        $statement->execute();

        return (int)$this->pdo->lastInsertId();
    }
}
