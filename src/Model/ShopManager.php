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
    public function selectAllCategories(string $orderBy = '', string $direction = 'ASC'): array
    {
        $query = 'SELECT * FROM ' . static::TABLE2;
        if ($orderBy) {
            $query .= ' ORDER BY ' . $orderBy . ' ' . $direction;
        }

        return $this->pdo->query($query)->fetchAll();
    }
    public function updateArticle(array $article)
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE .
            " SET `name` = :name, `price` = :price, `description` = :description, 
            `category_id` = :category_id, `img_name` = :img_name WHERE id=:id ");
        $statement->bindValue('name', $article['name'], PDO::PARAM_STR);
        $statement->bindValue('price', floatval($article['price']), PDO::PARAM_STR);
        $statement->bindValue('description', $article['description'], PDO::PARAM_STR);
        $statement->bindValue('category_id', intval($article['category_id']), PDO::PARAM_INT);
        $statement->bindValue('img_name', $article['img_name'], PDO::PARAM_STR);
        $statement->bindValue('id', intval($article['id']), PDO::PARAM_INT);

        return $statement->execute();
    }
    public function add($article)
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE .
            " (`name`,`price`, `description`, `category_id`, `img_name`) 
        VALUES (:name, :price, :description, :category_id, :img_name)");
        $statement->bindValue('name', $article['name'], PDO::PARAM_STR);
        $statement->bindValue('price', floatval($article['price']), PDO::PARAM_STR);
        $statement->bindValue('description', $article['description'], PDO::PARAM_STR);
        $statement->bindValue('category_id', intval($article['category_id']), PDO::PARAM_INT);
        $statement->bindValue('img_name', $article['img_name'], PDO::PARAM_STR);

        return $statement->execute();
    }
    public function selectCategoryById(int $id): array|false
    {
        // prepared request
        $statement = $this->pdo->prepare("SELECT * FROM " . static::TABLE2 . " WHERE id=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }
    public function updateCategory(array $category)
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE2 .
            " SET `name` = :name WHERE id=:id ");
        $statement->bindValue('name', $category['name'], PDO::PARAM_STR);
        $statement->bindValue('id', intval($category['id']), PDO::PARAM_INT);

        return $statement->execute();
    }
    public function addCategory(array $category)
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE2 . " (`name`) VALUES (:name)");
        $statement->bindValue('name', $category['name'], PDO::PARAM_STR);

        return $statement->execute();
    }
    public function deleteCategory(int $id): void
    {
        $statement = $this->pdo->prepare("DELETE FROM " . static::TABLE2 . " WHERE id=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();
    }
}
