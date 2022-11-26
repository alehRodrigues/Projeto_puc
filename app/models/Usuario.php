<?php

namespace app\models;

use app\database\Connection;

class Usuario extends Model
{

    protected string $table = 'Usuario';

    public function fetchAll()
    {
        $this->setFields('id, nome, email');
        return parent::fetchAll();
    }

    public function getDataCreate($postaData)
    {
        if ($postaData['password'] != '') {
            return [
                'usuarioNome' => $postaData['username'],
                'usuarioEmail' => $postaData['email'],
                'usuarioSenha' => password_hash($postaData['password'], PASSWORD_DEFAULT),
            ];
        } else {
            return [
                'usuarioNome' => $postaData['username'],
                'usuarioEmail' => $postaData['email'],
            ];
        }
    }
}
