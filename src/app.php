<?php declare(strict_types=1);

namespace MVC;

use Closure;

class App
{
    // Stockage de l'instance de la classe App
    private static $instance;

    // Rendre le constructeur privé pour empêcher la création de nouvelles instances
    private function __construct() {}

    // Méthode statique pour obtenir l'instance de la classe App
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    // La méthode boot est vide par défaut
    public function boot() {}

    //Propriété pour stocker les services
    private $container = [];

    //Méthode pour enregistrer des services en tant que singletons
    public function singleton ($name, Closure $closure) {
        $this->container[$name] = $closure($this);
    }

}
