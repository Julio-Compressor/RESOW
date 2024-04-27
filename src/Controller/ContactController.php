<?php

namespace App\Controller;

use App\Model\ContactManager;

class ContactController extends AbstractController
{
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $datacontact = array_map('trim', $_POST);
            $datacontact = array_map('htmlentities', $datacontact);
            // TODO validations (length, format...)

            // if validation is ok, insert and redirection
            $contactManager = new ContactManager();
            $contactManager->insert($datacontact);

            header('Location: /contact/show');
            return null;
        }

        return $this->twig->render('Contact/contact.html.twig');
    }
    public function show()
    {
        $contactManager = new ContactManager();
        $contact = $contactManager->lastContactMessage();

        return $this->twig->render('Contact/show.html.twig', ['contact' => $contact]);
    }
}
