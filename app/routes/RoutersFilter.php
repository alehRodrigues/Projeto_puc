<?php

namespace app\routes;

use app\helpers\RequestType;
use app\helpers\Uri;

class RoutersFilter
{

    private string $uri;
    private string $requestType;
    private array $routes;

    public function __construct()
    {
        $this->uri = Uri::get();
        $this->requestType = RequestType::get();
        $this->routes = Routes::get();
    }

    public function simpleRouter()
    {

        if (array_key_exists($this->uri, $this->routes[$this->requestType])) {
            return $this->routes[$this->requestType][$this->uri];
        } else {
            return null;
        }
    }

    public function dynamicRouter()
    {
        foreach ($this->routes[$this->requestType] as $key => $value) {
            $regex = str_replace('/', '\/', trim($key, '/'));
            if ($value != '/' && preg_match("/^$regex$/", trim($this->uri, '/'))) {
                return $value;
            }
        }

        return null;
    }

    public function get()
    {

        $router = $this->simpleRouter();


        if ($router == null) {
            $router = $this->dynamicRouter();
        }

        if ($router == null) {
            return 'ErrorController@error404';
        } else {
            return $router;
        }
    }
}
