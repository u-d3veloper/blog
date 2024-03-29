<?php 

    require_once('../config/_config.php');

    spl_autoload_register(function($class){
        $path = dirname(__DIR__).'\\app\\'.$class.'.php';
        if(file_exists($path))
        {
            require_once($path);
        }
    });

    use Router\Router;
    use Request\Request;
    use Exceptions\RouteNotFoundException;

    $router = new Router();

    $router->register('/',['Controllers\HomeController','index']);
    $router->register('/posts',['Controllers\PostController','index']);
    $router->register('/teaching',['Controllers\TeachingController','index']);
    $router->register('/about',['Controllers\AboutController','index']);
    $router->register('/login',['Controllers\LoginController','form']);


    $request = new Request($_SERVER['REQUEST_URI']);

    try
    {
        $router->resolve($request->getPath(),$request->getParams());
    }
    catch(RouteNotFoundException $e)
    {
        // Mettre en forme l'erreur de route
        echo $e->getMessage();
    }



