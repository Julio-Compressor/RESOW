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
        }
    }
}
