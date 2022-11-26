<?php

namespace app\models;

use PDO;
use app\database\Filters;
use app\database\Connection;

class Emprestimo extends Model
{

    protected string $table = 'Emprestimo';

    public function fetchAll()
    {
        try {

            $sql = "SELECT EmprestimoId, EmprestimoItemId, EmprestimoUsuarioId, EmprestimoDevolucao, EmprestimoAtivo, ItemTitulo, ItemCategoria, UsuarioNome FROM {$this->table} ";
            $sql .= "JOIN Item ON EmprestimoItemId = ItemId ";
            $sql .= "JOIN Usuario ON UsuarioId <> {$_SESSION['id']} ";

            $connection = Connection::getConnection();
            $query = $connection->query($sql);


            return $query->fetchAll(PDO::FETCH_CLASS, get_called_class());
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function getDataCreate($postData)
    {
        return [
            'emprestimoItemId' => $postData['ItemId'],
            'emprestimoUsuarioId' => $_SESSION['id'],
            'emprestimoDevolucao' => date("Y-m-d", strtotime("+2 weeks")),
            'emprestimoAtivo' => 1,
        ];
    }

    public function getDataEdit($emprestimo)
    {
        return [
            'emprestimoItemId' => $emprestimo->EmprestimoItemId,
            'emprestimoUsuarioId' => $emprestimo->EmprestimoUsuarioId,
            'emprestimoDevolucao' => $emprestimo->EmprestimoDevolucao,
            'emprestimoAtivo' => $emprestimo->EmprestimoAtivo,
        ];
    }
}
