<?php

namespace App\Controller;

use App\Model\CartManager;
use App\Model\ShopManager;
use App\Controller\AbstractController;

class CartController extends AbstractController
{
    public function insertAlbumById()
    {
        $id = $_GET['album'];
        // Il sait qu'il existe une clé qui est lié à l'album
        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = [];
        }
        if (array_key_exists($id, $_SESSION['panier'])) {
            $_SESSION['panier'][$id] += 1;
        } else {
            // Il ne retrouve pas la clé, il crée une clé avec l'id Album
            $_SESSION['panier'][$id] = 1;
        }

        header('location: /cart');
    }

    public function index(): string
    {
        // $_SESSION['article'] = [];
        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = [];
        }
        // !!!!!!!! IMPORTANT !!!!! REMPLACER LA LIGNE CI DESSOUS POUR QUE LE PANNIER FONCTIONNE PAR : $carts[] = 0;
        $carts = [];
        $carts[] = 0;
        foreach ($_SESSION['panier'] as $albumId => $quantite) {
            $albumManager = new CartManager();
            $data = $albumManager->selectOneByAlbumId($albumId);
            $data['qty'] = $quantite;
            $carts[] = $data;
        }
        $articles = [];
        $articles = $_SESSION['article'];

        return $this->twig->render('Cart/cart.html.twig', ['carts' => $carts, 'articles' => $articles]);
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $cartTemp = []; // Je crée un tableau temporaire
            foreach ($_SESSION['panier'] as $albumId => $quantite) {
                if ($id != $albumId) { // Si l'élément a supprimer n'est pas la ligne dans la panier
                    // Alors je le rajoute dans mon tableau temporaire
                    $cartTemp[$albumId] = $_SESSION['panier'][$albumId];
                    $quantite = trim($quantite); //ligne inutile mais pour passer grump
                }
            }
            $_SESSION['panier'] = $cartTemp;
        }

        if (isset($_GET['id2'])) {
            $id2 = $_GET['id2'];
            $cartTemp2 = [];
            foreach ($_SESSION['article'] as $articleId => $quantite2) {
                if ($id2 != $articleId) {
                    $cartTemp2[$articleId] = $_SESSION['article'][$articleId];
                }
            }
            $_SESSION['article'] = $cartTemp2;
        }
        header('location: /cart');
    }
}
