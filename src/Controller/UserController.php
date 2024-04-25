<?php

namespace App\Controller;

use App\Model\UserManager;

class UserController extends AbstractController
{
    public function login()
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userdata = array_map('trim', $_POST);


            if (!empty($userdata['email'])) {
                $errors[] = 'L\'adresse email ou le mot de passe n\'est pas valide';
            }

            // if (filter_var($credentials['email'], FILTER_VALIDATE_EMAIL) === false) {
            //     $errors[] = 'email obligatoire';
            // }

            // if (empty($credentials['password'])) {
            //     $errors[] = 'Le mot de passe est obligatoire';
            // }

            $userManager = new UserManager();
            $user = $userManager->selectOneByEmail($userdata['email']);
            if ($user && password_verify($userdata['password'], $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['is_admin'] = $user['is_admin'];
                header('Location: /');
                exit();
            }
        }
        return $this->twig->render('User/login.html.twig', ['errors' => $errors]);
    }

    public function register()
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userdata = array_map('trim', $_POST);

            if (filter_var($userdata['email'], FILTER_VALIDATE_EMAIL) === false) {
                $errors[] = 'veuillez entrez un email';
            }

            if (empty($userdata['firstname'])) {
                $errors[] = 'veuillez entrez un prénom';
            }

            if (empty($userdata['lastname'])) {
                $errors[] = 'veuillez entrez un Nom';
            }

            if (empty($userdata['password'])) {
                $errors[] = 'veuillez entrez un mot de passe';
            }


            if (empty($errors)) {
                $userManager = new UserManager();
                $userManager->insert($userdata);
                return $this->login();
            }
        }
        return $this->twig->render('User/register.html.twig', ['errors' => $errors]);
    }


    public function logout()
    {
         $_SESSION = [];
        header('location: /');
        exit();
    }

    public function resetpassword()
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userdata = array_map('trim', $_POST);

            if (filter_var($userdata['email'], FILTER_VALIDATE_EMAIL) === false) {
                $errors[] = 'veuillez entrez un email';
            }

            if (empty($userdata['password'])) {
                $errors[] = 'veuillez entrez un mot de passe';
            }

            if (empty($errors)) {
                $userManager = new UserManager();
                $userManager->update($userdata);
                header('location: /compte');
            }
        }
        return $this->twig->render('User/compte.html.twig', ['errors' => $errors]);
    }
}
