lien de déploiment : https://0224-php-p2-straszik.strasbourg-1.wilders.dev/ du projet 2 

---------IMPORTANT-----------

Le lien de deploiement ci-dessus est l'etat du projet pour la formation soit 2.5 semaine de travail. 

Ce repo est un travail personnel pour continuer de developper le projet afin d'abouttir un quelque chose d'un peu plus fini. 

pour accéder aux ameliorations du site il ne peut être qu'accessible qu'en local donc il faut :

- PHP installer sur votre machine
- mySQL
- cloner le repos
- dans la console: composer install
- copier le  db.php.dist dans le dossier config
- le renommer en db.php
- dans le fichier db.php :
  
```php
    define('APP_DB_USER', 'user');  remplacer 'user' par votre user de mySQL
    define('APP_DB_PASSWORD', 'password'); remplacer 'password' par votre password de mySQL
    define('APP_DB_HOST', 'localhost'); changer rien
    define('APP_DB_NAME', 'database_name'); remplacer 'database_name' par un nom de database que vous souhaitez
```

- dans la console : php migration.php
- dans la console : php -S localhost:8000 -t public

ENJOY ! 
----------------------------------------

---------AMELIORATION EN COUR-----------
- Responsive
- Refaire la gestion des images (ajout des fichiers via pages admin)
- revoir et renforcer les login
- revoir reset password
- incorporer un systeme de payment
- revoir le formulaire de contact
- 

----------------------------------------





## Steps

1. Clone the repo from Github.
2. Run `composer install`.
3. Create _config/db.php_ from _config/db.php.dist_ file and add your DB parameters. Don't delete the _.dist_ file, it must be kept.

```php
define('APP_DB_HOST', 'your_db_host');
define('APP_DB_NAME', 'your_db_name');
define('APP_DB_USER', 'your_db_user_wich_is_not_root');
define('APP_DB_PASSWORD', 'your_db_password');
```

4. Import _database.sql_ in your SQL server, you can do it manually or use the _migration.php_ script which will import a _database.sql_ file.
5. Run the internal PHP webserver with `php -S localhost:8000 -t public/`. The option `-t` with `public` as parameter means your localhost will target the `/public` folder.
6. Go to `localhost:8000` with your favorite browser.
7. From this starter kit, create your own web application.






## Run it on docker

If you don't know what is docker, skip this chapter. ;)

Otherwise, you probably see, this project is ready to use with docker.

To build the image, go into the project directory and in your CLI type:

```
docker build -t simple-mvc-container .
```

then, run it to open it on your localhot :

```
docker run -i -t --name simple-mvc  -p 80:80 simple-mvc-container
```
