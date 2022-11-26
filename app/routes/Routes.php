<?php

namespace app\routes;

class Routes
{

    public static function get()
    {
        return [
            'get' => [
                '/' => 'HomeController@index',
                '/signup' => 'LoginController@signup',
                '/signin' => 'LoginController@signin',
                '/profile/edit/[0-9]+' => 'LoginController@profile',
                '/signout' => 'LoginController@signout',
                '/items' => 'ItemController@index',
                '/items/create' => 'ItemController@create',
                '/items/delete/[0-9]+' => 'ItemController@delete',
                'emprestimo/delete/[0-9]+' => 'HomeController@delete',

            ],
            'post' => [
                '/signup' => 'LoginController@signup',
                '/signin' => 'LoginController@signin',
                '/profile/edit/[0-9]+' => 'LoginController@profile',
                '/items/create' => 'ItemController@create',
                '/items/edit' => 'ItemController@edit',
                '/items/delete/[0-9]+' => 'ItemController@delete',
                '/emprestimo/create' => 'HomeController@create',
            ]
        ];
    }
}
