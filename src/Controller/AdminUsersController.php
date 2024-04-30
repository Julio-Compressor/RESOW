<?php

namespace App\Controller;

use App\Model\AdminManager;
use App\Controller\AbstractController;

class AdminUsersController extends AbstractController
{
    public function index(): string
    {
        if (!$this->user || !$_SESSION['is_admin']) {
            echo 'Accès non autorisé';
            header('Location: /error');
        }

        $users = new AdminManager();
        $users = $users->selectAll();

        return $this->twig->render('Admin/Users/adminUsers.html.twig', ['users' => $users]);
    }

    public function update($id)
    {
        $usersManager = new AdminManager();
        $user = $usersManager->selectOneById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = array_map('trim', $_POST);

            if (!isset($user['is_admin'])) {
                $user['is_admin'] = 0;
            }
            if (!isset($user['is_newsletter'])) {
                $user['is_newsletter'] = 0;
            }
            $usersManager->update($user);

            header('Location: /admin/users');
            return null;
        }
    }

    public function delete(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $usersManager = new AdminManager();
            $usersManager->delete((int)$id);

            header('location: /admin/users');
        }
    }
}
