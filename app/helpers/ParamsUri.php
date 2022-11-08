<?php
namespace app\helpers;

class ParamsUri{

    public static function get(){
        $uri = $_SERVER['REQUEST_URI'];
        $uri = explode('/', $uri);
        $uri = array_filter($uri);
        $uri = array_values($uri);
        return $uri[2];
    }

}
