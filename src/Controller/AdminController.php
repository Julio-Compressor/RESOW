<?php

namespace App\Controller;

use App\Model\AdminManager;
use App\Controller\AbstractController;

class AdminController extends AbstractController
{
    public function index(): string
    {
        if (!$this->user || !$_SESSION['is_admin']) {
            echo 'Accès non autorisé';
            header('Location: /error');
        }

        return $this->twig->render('Admin/admin.html.twig');
    }
}
