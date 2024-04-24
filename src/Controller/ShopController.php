<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Model\ShopManager;

class ShopController extends AbstractController
{
    public function index(): string
    {
        $articleTable = new ShopManager();
        $articles = $articleTable->selectArticleCategory();

        $colors = ['noir', 'bleu', 'jaune', 'rose', 'vert'];
        $sizes = ['S', 'M', 'L'];
        return $this->twig->render(
            'Shop/shop.html.twig',
            ['articles' => $articles, 'colors' => $colors, 'sizes' => $sizes]
        );
    }

    public function addArticle()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $articleData = array_map('trim', $_POST);
            $id = intval($articleData['id']);
            if (!isset($_SESSION['article'][$id])) {
                $_SESSION['article'][$id] = 0;
            }
            $shopManager = new ShopManager();
            $article = $shopManager->selectArticleById($articleData['id']);
            $_SESSION['article'][$id] = $article;
            if (isset($articleData['size'])) {
                $_SESSION['article'][$id]['size'] = $articleData['size'];
            }
            if (isset($articleData['color'])) {
                $_SESSION['article'][$id]['color'] = $articleData['color'];
            }
            header('location: /cart');
        }
        return $this->twig->render('Shop/shop.html.twig');
    }
}
