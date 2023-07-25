<?php

namespace Source;

use Router\Router;
use Exceptions\RouteNotFoundException;


class App
{
    private Router $router;
    private array $request;

    public function __construct(Router $router, array $request)
    {
        $this->router = $router;
        $this->request = $request;
    }

    public function run()
    {
        try {
            echo $this->router->resolve($this->request['uri'], $this->request['method']);
        } catch (RouteNotFoundException $e) {
            echo $e->getMessage();
        }
    }
}