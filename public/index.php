<?php

echo "";

// Inclure l'autoload de Composer
require_once __DIR__ . '/../vendor/autoload.php';

//Créer une nouvelle instance de la classe App
use MVC\app\App;
$app = App::getInstance();

//Appeler la méthode boot() de la classe App
$app->boot();
