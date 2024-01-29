<?php

echo "";

// Inclure l'autoload de Composer
require_once __DIR__ . '/../vendor/autoload.php';

//Créer une nouvelle instance de la classe App
use MVC\App;
$app = App::getInstance();

//Appel de la classe MonSuperService 
use MonSuperService;

//Appeler la méthode boot() de la classe App
$app->boot();

//Appeler la méthode singleton() de la classe App
$app->singleton('mon_service', fn (App $app) => new MonSuperService);

//Récupération d'une instance du service 
$monService = $app -> make ('mon_service');