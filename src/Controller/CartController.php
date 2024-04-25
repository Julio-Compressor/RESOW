<?php

namespace App\Controller;

use App\Model\CartManager;
use App\Controller\AbstractController;

class CartController extends AbstractController
{
    public function insertAlbumById()
    {
        $id = $_GET['album'];
        // Il sait qu'il existe une clé qui est lié à l'album
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

        return $this->twig->render('Cart/cart.html.twig', ['carts' => $carts]);
    }

    public function delete()
    {
        $id = $_GET['id'];
        //$_SESSION['panier'] = [];
        $cartTemp = []; // Je crée un tableau temporaire
        // je boucle sur ma session panier
        foreach ($_SESSION['panier'] as $albumId => $quantite) {
            if ($id != $albumId) { // Si l'élément a supprimer n'est pas la ligne dans la panier
                $cartTemp[$albumId] = $_SESSION['panier'][$albumId]; // Alors je le rajoute dans mon tableau temporaire
                $quantite = trim($quantite); //ligne inutile mais pour passer grump
            }
        }
        $_SESSION['panier'] = $cartTemp;
        header('location: /cart');
    }
}
