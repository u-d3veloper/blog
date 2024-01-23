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
    $router->register('/posts',['Controllers\PostController','post']);
    $router->register('/show',['Controllers\PostController','show']);

    $request = new Request($_SERVER['REQUEST_URI']);

    try
    {
        echo $router->resolve($request->getPath(),$request->getParams());
    }
    catch(RouteNotFoundException $e)
    {
        echo $e->getMessage();
    }


