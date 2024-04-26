<?php

namespace App\Controller;

use App\Model\IndexManager;
use App\Controller\AbstractController;

class ErrorController extends AbstractController
{
    public function index(): string
    {
        return $this->twig->render('Error/error.html.twig');
    }
}
