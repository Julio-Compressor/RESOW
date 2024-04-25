<?php

// list of accessible routes of your application, add every new route here
// key : route to match
// values : 1. controller name
//          2. method name
//          3. (optional) array of query string keys to send as parameter to the method
// e.g route '/item/edit?id=1' will execute $itemController->edit(1)
return [
    '' => ['IndexController', 'index',],
    'discoBio' => ['DiscoBioController', 'index'],
    'shop' => ['ShopController', 'index'],
    'shop/add' => ['ShopController', 'addArticle', ['id']],
    'items' => ['ItemController', 'index',],
    'items/edit' => ['ItemController', 'edit', ['id']],
    'items/show' => ['ItemController', 'show', ['id']],
    'items/add' => ['ItemController', 'add',],
    'items/delete' => ['ItemController', 'delete',],
    'contact' => ['ContactController', 'add'],
    'contact/show' => ['ContactController', 'show', ['id']],
    'register' => ['UserController', 'register',],
    'login' => ['UserController', 'login',],
    'logout' => ['UserController', 'logout',],
    'album' => ['CartController', 'insertAlbumById', ['id']],
    'cart' => ['CartController', 'index', ['id']],
    'cart/delete' => ['CartController', 'delete', ['id']],
    'compte' => ['UserController', 'resetpassword',],
    'admin' => ['AdminController', 'index'],
    'admin/events' => ['AdminEventsController', 'index'],
    'admin/events/update' => ['AdminEventsController', 'update', ['id']],
    'admin/events/delete' => ['AdminEventsController', 'delete', ['id']],
    'error' => ['ErrorController', 'index',],
];
