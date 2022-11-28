<?php

namespace app\controllers;

use app\helpers\Request;

class HomeController extends BaseController
{

    public function delete($id)
    {
        try {
            $emprestimo = new \app\models\Emprestimo();
            $emprestimo = $emprestimo->findby('emprestimoId', $id);
            $emprestimo->EmprestimoAtivo = 0;

            $emprestimo->update('emprestimoId', $id, $emprestimo->getDataEdit($emprestimo));

            header('Location: /');
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function create()
    {
        $emprestimoPost = Request::all();
        if (isset($emprestimoPost['ItemId']) && isset($_SESSION['id'])) {
            try {
                $emprestimo = new \app\models\Emprestimo();
                $emprestimo->create($emprestimo->getDataCreate($emprestimoPost));
                header('Location: /');
            } catch (\Throwable $th) {
                dd($th->getMessage());
            }
        }
    }

    public function index()
    {
        try {

            if (isset($_SESSION['user'])) {

                $emprestimos = new \app\models\Emprestimo();
                $emprestimos = $emprestimos->fetchAll();

                $emprestadosArray = array_filter($emprestimos, function ($emprestimo) {
                    return $emprestimo->EmprestimoAtivo == 1;
                });

                $emprestados = array_map(function ($emprestimo) {
                    return $emprestimo->EmprestimoItemId;
                }, $emprestadosArray);



                $items = new \app\models\Item();
                $items = $items->fetchAllEmprestimo();

                $items = array_filter($items, function ($item) use ($emprestados) {
                    return !in_array($item->ItemId, $emprestados);
                });


                $this->view('home', [
                    'title' => 'Home',
                    'emprestimos' => $emprestadosArray,
                    'items' => $items,

                ]);
            } else {
                header('Location: /signin');
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
}
