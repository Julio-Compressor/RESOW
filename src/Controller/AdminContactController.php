<?php

namespace App\Controller;

use App\Model\ContactManager;

class AdminContactController extends AbstractController
{
    public function show()
    {
        if ((!$this->user )) {
            echo 'Accès non autorisé';
            header('Location: /error');
        }
        $contactManager = new ContactManager();
        $contacts = $contactManager->selectAll();

        return $this->twig->render('Admin/Contact/adminContact.html.twig', ['contacts' => $contacts]);
    }
}
