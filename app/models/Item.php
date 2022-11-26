<?php

namespace app\models;

use app\database\Filters;

class Item extends Model
{
    protected string $table = 'Item';

    public function fetchAll()
    {
        $filters = new Filters();
        $filters->where('ItemUsuarioId', '=', $_SESSION['id']);

        $this->setFields('ItemId, ItemTitulo, ItemDescricao, ItemCategoria, ItemUsuarioId');
        $this->setFilters($filters);

        return parent::fetchAll();
    }

    public function fetchAllEmprestimo()
    {
        $filters = new Filters();
        $filters->where('ItemUsuarioId', '<>', $_SESSION['id']);

        $this->setFields('ItemId, ItemTitulo, ItemDescricao, ItemCategoria, ItemUsuarioId');
        $this->setFilters($filters);

        return parent::fetchAll();
    }

    public function getDataCreate($postData)
    {
        return [
            'itemTitulo' => $postData['title'],
            'itemDescricao' => $postData['description'],
            'itemCategoria' => $postData['category'],
            'itemUsuarioId' => $postData['user_id'],
        ];
    }

    public function getDataEdit()
    {
        return [
            strval($this->ItemId),
            strval($this->ItemTitulo),
            strval($this->ItemDescricao),
            strval($this->ItemCategoria),
            strval($this->ItemUsuarioId),
        ];
    }
}
