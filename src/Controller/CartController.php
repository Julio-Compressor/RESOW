<?php

namespace App\Controller;

use App\Controller\AbstractController;

class CartController extends AbstractController
{

    public function insertAlbumById()
    {
        unset($_SESSION['id']);
        $_SESSION['id'] = [$_GET['cart'] => 1];
        // $_SESSION['panier'][$_GET['cart'] = 1;
        // $_SESSION['panier'] = [$_GET['cart'] => 1];
        // $_SESSION['panier'][] = [$_GET['cart'] => 1]

        header('location:cart');
    }

    public function index(): string
    {
        return $this->twig->render('Cart/cart.html.twig');
    }
}
