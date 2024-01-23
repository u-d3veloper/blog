<?php

namespace Router;
use Exceptions\RouteNotFoundException;
use Database\DBConnection;

class Router
{
    private array $routes;

    public function register(string $path, callable|array $action):void
    {
        $this->routes[$path] = $action;
    }

    public function resolve($url,$params):mixed
    {
        // On récupère une URL (get transformée par l'objet request : donc $url est sous la forme string)
        // On récupère les paramètres aussi si il y'en à.

        $action = $this->routes[$url] ?? null;

        // L'action retournée par la table de routage est elle un callable
        //( ? première version du Modèle MVC : simplifiée, peu fléxible - tâches simples)

        if(is_callable($action))
        {
            return $action();
        }
        
        // Si l'action retournée par la table de routage est un array (plus de flexibilité)
        // La table de routage renvoie l'action sous forme $action = [string $pathToAdequateController, string 'ControllerMethodNameToAction']

        elseif(is_array($action))
        {
            [$className,$method] = $action; // On sépare en className et Method par exemple ['HomeController', 'index'] pour afficher la page d'accueil.
            
            if (class_exists($className) && method_exists($className,$method)) 
            {
         
                $class = new $className(new DBConnection('localhost','blog','root',''));
                return $class->$method($params);
            }
        }
        
        throw new RouteNotFoundException();
    }

}