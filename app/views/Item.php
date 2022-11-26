<?php $this->layout('master', ['title' => $title, 'items' => $items]) ?>

<?php $this->start('css') ?>
<?php $this->stop() ?>

<h1>ITENS</h1>
<div class="col-12 d-flex justify-content-end px-3">
    <button id="btnNovoItem" class="btn btn-primary mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNew">
        NOVO ITEM
    </button>
</div>
<div class="collapse mb-3" id="collapseNew">
    <div class="card card-body">
        <form action="/items/create" method="post">
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['id'] ?>">
            <div class="row col-12 mx-auto">
                <div class="form-group col-3">
                    <label for="title">Título</label>
                    <input type="text" class="form-control" oninput="this.value = this.value.toUpperCase()" name="title" maxlength="30" id="title" required autocomplete="off">
                </div>
                <div class="form-group col-6">
                    <label for="description">Descrição</label>
                    <input type="text" class="form-control" name="description" oninput="this.value = this.value.toUpperCase()" maxlength="50" id="description" required autocomplete="off">
                </div>
                <div class="form-group col-3">
                    <label for="category">Categoria</label>
                    <input type="text" class="form-control" name="category" oninput="this.value = this.value.toUpperCase()" id="category" maxlength="20" required autocomplete="off">
                </div>
            </div>
            <button type="submit" class="btn btn-primary m-3 float-end">Salvar</button>
        </form>
    </div>
</div>
<div class="collapse mb-3" id="collapseEdit">
    <div class="card card-body">
        <form action="/items/edit" method="post">
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['id'] ?>">
            <input type="hidden" name="itemId" id="itemId">
            <div class="row col-12 mx-auto">
                <div class="form-group col-3">
                    <label for="title">Título</label>
                    <input type="text" class="form-control" oninput="this.value = this.value.toUpperCase()" name="title" maxlength="30" id="titleEdit" required autocomplete="off">
                </div>
                <div class="form-group col-6">
                    <label for="description">Descrição</label>
                    <input type="text" class="form-control" name="description" oninput="this.value = this.value.toUpperCase()" maxlength="50" id="descriptionEdit" required autocomplete="off">
                </div>
                <div class="form-group col-3">
                    <label for="category">Categoria</label>
                    <input type="text" class="form-control" name="category" oninput="this.value = this.value.toUpperCase()" id="categoryEdit" maxlength="20" required autocomplete="off">
                </div>
            </div>
            <button type="submit" class="btn btn-primary m-3 float-end">Salvar</button>
        </form>
    </div>
</div>
<div class="col-12">
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
                    <tr id="<?php echo 'item_' . $this->e($item->ItemId) ?>">
                        <td class="align-middle"><?php echo $this->e($item->ItemTitulo) ?></td>
                        <td class="align-middle"><?php echo $this->e($item->ItemDescricao) ?></td>
                        <td class="align-middle"><?php echo $this->e($item->ItemCategoria) ?></td>
                        <td class="text-center">
                            <button type="button" class="btn btn-warning px-3" data-bs-toggle="collapse" data-bs-target="#collapseEdit" onclick="editarItem(<?php echo 'item_' . $this->e($item->ItemId) ?>)">Editar</button>
                            <a href="/items/delete/<?php echo $this->e($item->ItemId) ?>" class="btn btn-danger">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        </tbody>
    </table>
</div>

<?php $this->start('js') ?>
<script src="/js/item.js"></script>
<?php $this->stop() ?>