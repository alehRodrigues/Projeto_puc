<?php
namespace app\controllers;

use League\Plates\Engine;

abstract class BaseController{

    protected function view(string $view, array $data = []){
        
        $viewPath = "../app/views/{$view}.php";

        if(!file_exists($viewPath)){
            throw new \Exception("View {$view} not found");
        }

        $templates = new Engine('../app/views');

        echo $templates->render($view, $data);

    }

}

