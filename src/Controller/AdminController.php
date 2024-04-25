<?php

namespace App\Controller;

use App\Model\IndexManager;
use App\Controller\AbstractController;

class AdminController extends AbstractController
{
    public function index(): string
    {
        $events = new IndexManager();
        $events = $events->selectAll();

        return $this->twig->render('Admin/admin.html.twig', ['events' => $events]);
    }
}
