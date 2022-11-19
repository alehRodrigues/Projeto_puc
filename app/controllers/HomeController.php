<?php
namespace app\controllers;

class HomeController extends BaseController{

    public function index(){
        
        $this->view('home', [
            'title' => 'Home',
            'name' => 'Alexandre'
        ]);
    }

}