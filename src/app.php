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
    public $container;

    //Méthode pour enregistrer des services en tant que singletons
    public function singleton ($name, Closure $closure = null) {
        //Si closure n'est pas fourni, assume que l'instance passe directement
        if ($closure === null) {
            $this -> container[$name] = $name;
        } else {
            $this -> container[$name] = $closure($this);
        }
    }

    //Méthode pour récupérer un service à partir du conteneur
    public function make ($name){
        if (isset($this -> container [$name])) {
        //Si c'est closure, on l'appelle pour obtenir l'instance
        if (is_callable($this -> container[$name])){
            return $this -> container[$name]($this);
        } else {
            //Sinon, on retourne directement l'instance 
            return $this -> container[$name];
        }
        } else {
            //Retourner une erreur ou lancer une exception si le service n'est pas enregistrer
    } throw new \Exception("Le service '$name' n'est pas enregisté.");
    }
}