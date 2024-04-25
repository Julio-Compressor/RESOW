<?php

namespace App\Controller;

class CompteController extends AbstractController
{
    // Cette function de donner la permissions à un admin d'acceder a une page spécifique.
    public function index(): string
    {
        if (!$this->user || !$_SESSION['is_admin'] === true) {
            echo 'Accès non autorisé';
            header('Location: /401/show');
        }
        return $this->twig->render('User/compte.html.twig');
    }
}
