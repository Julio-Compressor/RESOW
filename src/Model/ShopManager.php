<?php

namespace App\Model;

use PDO;

class ShopManager extends AbstractManager
{
    public const TABLE = 'article';
    public const TABLE2 = 'category_article';

    public function selectArticleCategory(): array
    {
        $query = 'SELECT a.*, c.name AS nameCat FROM ' . static::TABLE .
            ' AS a JOIN ' . static::TABLE2 . ' AS c ON c.id=a.category_id';

        return $this->pdo->query($query)->fetchAll();
    }

    public function selectArticleById(int $id)
    {
        $statement = $this->pdo->prepare("SELECT a.*, c.name AS nameCat FROM "
            . static::TABLE . " AS a JOIN " . static::TABLE2 .
            " AS c ON c.id=a.category_id WHERE a.id=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetch();
    }
}
