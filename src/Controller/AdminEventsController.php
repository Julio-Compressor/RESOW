<?php

namespace App\Controller;

use App\Model\IndexManager;
use App\Controller\AbstractController;

class AdminEventsController extends AbstractController
{
    public function index(): string
    {
        if ((!$this->user )) {
            echo 'Accès non autorisé';
            header('Location: /error');
        }

        $events = new IndexManager();
        $events = $events->selectAll();

        return $this->twig->render('Admin/Events/adminEvents.html.twig', ['events' => $events]);
    }

    public function update($id)
    {
        $eventsManager = new indexManager();
        $event = $eventsManager->selectOneById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $event = array_map('trim', $_POST);

            if (!isset($event['isSoldout'])) {
                $event['isSoldout'] = 0;
            }
            $eventsManager->update($event);

            header('location: /admin/events');
            return null;
        }
    }
    public function delete(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $eventsManager = new IndexManager();
            $eventsManager->delete((int)$id);

            header('location: /admin/events');
        }
    }
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $newEvent = array_map('trim', $_POST);
            $newEvent['city'] = mb_strtoupper($newEvent['city']);
            if (!isset($newEvent['isSoldout'])) {
                $newEvent['isSoldout'] = false;
            }
            $eventsManager = new IndexManager();
            $eventsManager->addEvent($newEvent);
            header('location: /admin/events');
            return null;
        }
    }
}
