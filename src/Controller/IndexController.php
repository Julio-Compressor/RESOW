<?php

namespace App\Controller;

use App\Model\IndexManager;

class IndexController extends AbstractController
{
    public function index(): string
    {
        $events = new IndexManager();
        $events = $events->selectAll();

        return $this->twig->render('Home/index.html.twig', ['events' => $events]);
    }
}
