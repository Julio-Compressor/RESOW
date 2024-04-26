<?php

namespace App\Controller;

use App\Model\ContactManager;
use App\Model\AdminManager;

class AdminContactController extends AbstractController
{
    public function show()
    {
        $adminManager = new AdminManager();
        $contacts = $adminManager->selectAll();

        return $this->twig->render('Admin/Contact/adminContact.html.twig', ['contacts' => $contacts]);
    }
}
