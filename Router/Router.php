<?php
namespace Router;

use Exceptions\RouteNotFoundException;

class Router
{ 
    private array $routes;

   
    public function register(string $path, array $action, string $HTTPVerb): void
    {
        $this->routes[$HTTPVerb][$path] = $action;
    }

    public function get(string $path, array $action): void
    {
        $this->register($path, $action, 'GET');
    }

    public function post(string $path, array $action): void
    {
        $this->register($path, $action, 'POST');
    }
    

    public function resolve(string $uri, string $requestMethod) : mixed 
    {
        $path = explode('?', $uri)[0];
        if (isset(explode('?', $uri)[1]))
        {
            $arg = explode ('=', explode('?', $uri)[1])[1];
        }
        
        $action = $this->routes[$requestMethod][$path] ?? null;

        if(is_callable($action)) {
            return $action();
        }
        
        if(is_array($action)) {
            [$className, $method] = $action;

            if(class_exists($className) && method_exists($className, $method)) {
                $class = new $className(); 
                if(isset($arg)){
                    return call_user_func_array([$class, $method], [$arg]);
                } else {
                    return call_user_func_array([$class, $method], []);
                }
            }
        }

        
        throw new RouteNotFoundException();
    }
}