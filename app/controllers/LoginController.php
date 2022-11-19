<?php

namespace app\controllers;

use app\helpers\Request;
use app\models\Usuario;

class LoginController extends BaseController
{

    public function signup()
    {
        $signupPost = Request::all();

        if (isset($signupPost['username']) && isset($signupPost['email']) && isset($signupPost['password']) && isset($signupPost['password_confirmation'])) {

            $usuario = new \app\models\Usuario();
            $usuario->create($usuario->getDataCreate($signupPost));
        } else {
            $this->view('signup', [
                'title' => 'Cadastro',
            ]);
        }
    }
}
