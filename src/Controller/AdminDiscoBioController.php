<?php

namespace App\Controller;

use App\Model\DiscoBioManager;

class AdminDiscoBioController extends AbstractController
{
    public function index(): string
    {
        $albumsManager = new DiscoBioManager();
        $albums = $albumsManager->selectAll();

        return $this->twig->render('Admin/DiscoBio/adminDiscoBio.html.twig', ['albums' => $albums]);
    }
    public function edit(int $id)
    {
        $itemManager = new DiscoBioManager();
        $album = $itemManager->selectOneById($id);

        return $this->twig->render('Admin/DiscoBio/editAlbum.html.twig', ['album' => $album]);
    }
    public function update(int $id)
    {
        $itemManager = new DiscoBioManager();
        $album = $itemManager->selectOneById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $album = array_map('trim', $_POST);
            $itemManager->update($album);
            header('location: /admin/discoBio');
            return null;
        }
    }
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newAlbum = array_map('trim', $_POST);

            $albumManager = new DiscoBioManager();
            $albumManager->addAlbum($newAlbum);
            header('location: /admin/discoBio');
            return null;
        }
    }
    public function delete(int $id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $albumManager = new DiscoBioManager();
            $albumManager->delete((int)$id);

            header('location: /admin/discoBio');
        }
    }
}
