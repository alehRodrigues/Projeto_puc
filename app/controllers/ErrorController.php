<?php
namespace app\controllers;

class ErrorController extends BaseController{
    public function error404(){
        echo dd('404');
    }
}