<?php

namespace App\Controller;

use App\Model\UserManager;
use App\Controller\AbstractController;

class AdminUsersController extends AbstractController
{
    public function index(): string
    {
        $users = new UserManager();
        $users = $users->selectAll();

        return $this->twig->render('Admin/Users/adminUsers.html.twig', ['users' => $users]);
    }

    public function update($id)
    {
        $usersManager = new UserManager();
        $user = $usersManager->selectOneById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = array_map('trim', $_POST);

            $usersManager->update($user);

            header('Location: /admin/users');
            return null;
        }
    }

    public function delete(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $usersManager = new UserManager();
            $usersManager->delete((int)$id);

            header('Location: /admin/users');
        }
    }
}
