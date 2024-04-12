<?php

namespace App\Controller;

use App\Model\DiscoBioManager;

class DiscoBioController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {
        $albumTable = new DiscoBioManager();
        $albums = $albumTable->selectAll();

        return $this->twig->render('DiscoBio/discoBio.html.twig', ['albums' => $albums]);
    }
}
