<?php

namespace App\Controller;

class DiscoBioController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {
        return $this->twig->render('DiscoBio/discoBio.html.twig');
    }
}
