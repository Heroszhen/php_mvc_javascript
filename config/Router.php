<?php
namespace Config;

use FastRoute;

class Router{
    public function setRoutes() {
        $routes = include dirname(__DIR__).'/config/routes.php';
        return FastRoute\simpleDispatcher($routes);
    }

    public function getRouter($dispatcher){
        //chemin relatif
        $uri = $_SERVER['REQUEST_URI'];
        //strpos : Cherche la position de la première occurrence dans une chaîne
        if (false !== $pos = strpos($uri, '?')) {
            //substr: Retourne un segment de chaîne
            $uri = substr($uri, 0, $pos);
        }
        //rawurldecode : Décode une chaîne URL
        $routeInfo = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], rawurldecode($uri));
        if($routeInfo[0] == FastRoute\Dispatcher::NOT_FOUND || $routeInfo[0] == FastRoute\Dispatcher::METHOD_NOT_ALLOWED){/*
            header('HTTP/1.0 404 Not Found');
            $security = new SecurityController();
            $security->index(); */
        }elseif($routeInfo[0] == FastRoute\Dispatcher::FOUND) { 
            /*
            echo "<pre>";
            var_dump($routeInfo[1]);
            echo "</pre>";
            */
            $routeInfo[1][2] = (!isset($routeInfo[1][2]) || $routeInfo[1][2] == null)?[]:$routeInfo[1][2];
            //récupérer les paramètres passés dans l'url : /article/1 -> 1: paramètre
            foreach ($routeInfo[2] as $key => $value) {
               array_push($routeInfo[1][2],$value);
            }
            /**
             * call_user_func_array : Appelle une fonction de rappel avec les paramètres rassemblés en tableau
             * $routeInfo[1][0] : class(controller)
             * $routeInfo[1][1] : methode
             * $routeInfo[1][0] : paramètres
             */
            call_user_func_array(array($routeInfo[1][0], $routeInfo[1][1]),$routeInfo[1][2]);
        }
    }
}