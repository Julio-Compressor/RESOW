<?php

namespace App\Controller;

use App\Model\ShopManager;
use App\Controller\AbstractController;

class AdminShopController extends AbstractController
{
    public function index(): string
    {
        if ((!$this->user )) {
            echo 'Accès non autorisé';
            header('Location: /error');
        }
        $categoryManager = new ShopManager();
        $categories = $categoryManager->selectAllCategories();

        $articlesManager = new ShopManager();
        $articles = $articlesManager->selectArticleCategory();

        return $this->twig->render(
            'Admin/Shop/adminShop.html.twig',
            ['articles' => $articles, 'categories' => $categories]
        );
    }

    public function editArticle(int $id)
    {
        $articlesManager = new ShopManager();
        $article = $articlesManager->selectArticleById($id);

        return $this->twig->render('Admin/Shop/editShop.html.twig', ['article' => $article]);
    }

    public function update(int $id)
    {
        $articlesManager = new ShopManager();
        $article = $articlesManager->selectArticleById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $article = array_map('trim', $_POST);

            $articlesManager->updateArticle($article);

            header('location: /admin/shop');
            return null;
        }
    }
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newArticles = array_map('trim', $_POST);

            $articlesManager = new ShopManager();
            $articlesManager->add($newArticles);
            header('location: /admin/shop');
            return null;
        }
    }
    public function delete(int $id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $articlesManager = new ShopManager();
            $articlesManager->delete((int)$id);

            header('location: /admin/shop');
        }
    }

    public function editCategory(int $id)
    {
        $categoryManager = new ShopManager();
        $category = $categoryManager->selectCategoryById($id);

        return $this->twig->render('Admin/Shop/editShopCategory.html.twig', ['category' => $category]);
    }
    public function updateCategory(int $id)
    {
        $categoryManager = new ShopManager();
        $category = $categoryManager->selectCategoryById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $category = array_map('trim', $_POST);

            $categoryManager->updateCategory($category);

            header('location: /admin/shop');
            return null;
        }
    }
    public function addCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newCategory = array_map('trim', $_POST);

            $categoryManager = new ShopManager();
            $categoryManager->addCategory($newCategory);
            header('location: /admin/shop');
            return null;
        }
    }
    public function deleteCategory(int $id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $categoryManager = new ShopManager();
            $categoryManager->deleteCategory((int)$id);

            header('location: /admin/shop');
        }
    }
}
