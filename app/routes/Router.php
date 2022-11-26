<?php

namespace app\routes;

use app\controllers\Controller;

class Router
{

    public static function run()
    {

        try {
            $routerRegistered = new RoutersFilter;
            $router = $routerRegistered->get();

            // dd($router);

            $controller = new Controller;
            $controller->execute($router);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}
