 <!--  creer la base de donnée dans phpadmin mysql-->
 create dadabase car_rent;

 <!-- reintialiser composer -->
 **composer update**
 **composer install**

s'il y a une erreur par rapport a la version de php, aller dans le ficher  **composer.json** **composer.lock** et  et modifier la version de php 

"require-dev": {
    "phpunit/phpunit": "^10.0" //derniere version
}

<!-- vider les caches -->
**php artisan optimize:clear**
**php artisan config:clear**
**php artisan cache:clear**
**php artisan route:clear**
**php artisan view:clear**
**php artisan storage:link**

**php artisan make:model Marque -m**
**php artisan make:migration add_marque_id_to_cars_table --table=cars**
**php artisan make:controller MarqueController**
**composer dump-autoload**
<!-- faire les migrations -->
**php artisan migrate:reset** //reinitialiser
**php artisan migrate**

<!-- faire les verification -->
aller dans le ficher **.env** et vérifier le username et mot de passe de la base de donné (defaut: username= 'root', password='')

<!-- lancer le server sur le localhost -->
**php artisan serve** and enjoy🎉🎉🎉


---------------------------------------------- junior the Dev --------------------------------------