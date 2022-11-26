<?php

namespace app\controllers;

use app\helpers\Request;
use app\models\Usuario;

class LoginController extends BaseController
{

    public function signout()
    {
        session_destroy();
        header('Location: /signin');
    }

    public function signup()
    {
        $signupPost = Request::all();
        if (isset($signupPost['username']) && isset($signupPost['email']) && isset($signupPost['password'])) {

            try {
                //code...
                $usuario = new \app\models\Usuario();
                $userId = $usuario->create($usuario->getDataCreate($signupPost));

                $_SESSION['user'] = $signupPost['username'];
                $_SESSION['id'] = $userId;

                $this->view('home', [
                    'title' => 'SEC',
                ]);
            } catch (\Throwable $th) {
                //throw $th;
                dd($th->getMessage());
            }
        } else {
            $this->view('signup', [
                'title' => 'Cadastro',
            ]);
        }
    }

    public function profile($id)
    {

        $signupPost = Request::all();
        $usuario = new \app\models\Usuario();

        if (isset($signupPost['username']) && isset($signupPost['email']) && isset($signupPost['password'])) {

            $usuario->update('usuarioId', $id, $usuario->getDataCreate($signupPost));

            $_SESSION['user'] = $signupPost['username'];

            header('Location: /');
        } else {
            try {

                $user = $usuario->findBy('usuarioId', $id);

                $this->view('profile', [
                    'title' => 'Perfil',
                    'user' => $user->usuarioNome,
                    'email' => $user->usuarioEmail,
                ]);
            } catch (\Throwable $th) {
                dd($th->getMessage());
            }
        }
    }

    public function signin()
    {
        $signinPost = Request::all();
        if (isset($signinPost['email']) && isset($signinPost['password'])) {
            try {
                //code...
                $usuario = new \app\models\Usuario();
                $user = $usuario->findBy('usuarioEmail', $signinPost['email']);
                if ($user) {
                    if (password_verify($signinPost['password'], $user->usuarioSenha)) {
                        $_SESSION['user'] = $user->usuarioNome;
                        $_SESSION['id'] = $user->usuarioId;
                        header('Location: /');
                    } else {
                        $this->view('signin', [
                            'title' => 'Login',
                            'error' => 'Senha incorreta',
                        ]);
                    }
                } else {
                    $this->view('signin', [
                        'title' => 'Login',
                        'error' => 'Usuário não encontrado',
                    ]);
                }
            } catch (\Throwable $th) {
                //throw $th;
                dd($th->getMessage());
            }
        } else {
            $this->view('signin', [
                'title' => 'Login',
            ]);
        }
    }
}
