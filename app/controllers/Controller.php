<?php

namespace app\controllers;

use app\helpers\ParamsUri;

class Controller
{

    public function execute($router)
    {

        if (substr_count($router, '@') <= 0) {
            throw new \Exception('Error: Router not found');
        }

        $router = explode('@', $router);


        $controller = $router[0];

        if (!class_exists("app\\controllers\\$controller")) {
            throw new \Exception('Error: Controller not found');
        }

        $method = $router[1];

        $controller = "app\\controllers\\$controller";
        $controller = new $controller;

        if (!method_exists($controller, $method)) {
            throw new \Exception('Error: Method not found');
        }

        $params = new ParamsUri;
        $params = $params->get($router);

        $controller->$method($params);
    }
}
