<?php

namespace App\Controller;

use App\Model\ContactManager;
use App\Model\AdminManager;

class AdminContactController extends AbstractController
{
    public function show()
    {
        $adminManager = new AdminManager();
        $contact = $adminManager->contactMessage();

        return $this->twig->render('Admin/Contact/adminContact.html.twig', ['contact' => $contact]);
    }
}
