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
}
