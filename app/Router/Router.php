<?php

namespace Router;
use Exceptions\RouteNotFoundException;

class Router
{
    private array $routes;

    public function register(string $path, callable|array $action):void
    {
        $this->routes[$path] = $action;
    }

    public function resolve($url,$params):mixed
    {
        $action = $this->routes[$url] ?? null;

        if(is_callable($action))
        {
            return $action();
        }elseif(is_array($action))
        {
            [$className,$method] = $action;
            
            if (class_exists($className) && method_exists($className,$method)) 
            {
                $class = new $className();
                // return call_user_func_array([$class,$method],[]);
                return $class->$method($params);
            }
        }
        
        throw new RouteNotFoundException();
    }

}