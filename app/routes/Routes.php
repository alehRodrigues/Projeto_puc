<?php   

namespace app\routes;

class Routes{

    public static function get(){
        return [
            'get' => [
                '/' => 'HomeController@index',
                '/signup' => 'LoginController@signup',
                '/signin' => 'LoginController@signin',
                '/signout' => 'LoginController@signout',
                '/items' => 'ItemController@index',
                '/items/create' => 'ItemController@create',
                '/items/edit/[0-9]+' => 'ItemController@edit',
                '/items/delete/[0-9]+' => 'ItemController@delete',
                '/items/detail/[0-9]+' => 'ItemController@detail',
            ],
            'post' => []
        ];
    }

}