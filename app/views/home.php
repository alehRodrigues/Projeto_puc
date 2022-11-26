<?php $this->layout('master', ['title' => $title, 'emprestimos' => $emprestimos, 'items' => $items]) ?>

<?php $this->start('css') ?>
<?php $this->stop() ?>
<h1>
    EMPRÉSTIMOS
</h1>
<div class="col-12 d-flex justify-content-end px-3">
    <button id="btnNovoItem" class="btn btn-primary mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNew">
        NOVO EMPRÉSTIMO
    </button>
</div>
<div class="collapse mb-3 col-12" id="collapseNew">
    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col" class="col-3">Título</th>
                <th scope="col" class="col-5">Descrição</th>
                <th scope="col" class="col-2">Categoria</th>
                <th scope="col" class="col-2"></th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($items) === 0) : ?>
                <tr>
                    <td colspan="4" class="text-center">Nenhum item cadastrado</td>
                </tr>
            <?php else : ?>
                <?php foreach ($items as $item) : ?>
                    <tr>
                        <td class="align-middle"><?php echo $this->e($item->ItemTitulo) ?></td>
                        <td class="align-middle"><?php echo $this->e($item->ItemDescricao) ?></td>
                        <td class="align-middle"><?php echo $this->e($item->ItemCategoria) ?></td>
                        <td class="text-center">
                            <form action="/emprestimo/create" method="post">
                                <input type="hidden" name="ItemId" value="<?php echo $this->e($item->ItemId) ?>">
                                <button class="btn btn-success">Emprestar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        </tbody>
    </table>
</div>
<div class="col-12">
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col" class="col-3">Título</th>
                <th scope="col" class="col-2">Categoria</th>
                <th scope="col" class="col-3">Data Devolução</th>
                <th scope="col" class="col-5">Dono Item</th>
                <th scope="col" class="col-2"></th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($emprestimos) === 0) : ?>
                <tr>
                    <td colspan="5" class="text-center">Nenhum item emprestado</td>
                </tr>
            <?php else : ?>
                <?php foreach ($emprestimos as $emprestimo) : ?>
                    <tr>
                        <td class="align-middle"><?php echo $this->e($emprestimo->ItemTitulo) ?></td>
                        <td class="align-middle"><?php echo $this->e($emprestimo->ItemCategoria) ?></td>
                        <td class="align-middle"><?php echo date("d/m/Y", strtotime($this->e($emprestimo->EmprestimoDevolucao))) ?></td>
                        <td class="align-middle"><?php echo $this->e($emprestimo->UsuarioNome) ?></td>
                        <td class="text-center">
                            <a href="/emprestimo/delete/<?php echo $this->e($emprestimo->EmprestimoId) ?>" class="btn btn-danger">Devolver</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        </tbody>
    </table>
</div>

<?php $this->start('js') ?>
<?php $this->stop() ?>