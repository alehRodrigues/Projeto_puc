<?php $this->layout('master', ['title' => $title]) ?>

<?php $this->start('css')?>
<?php $this->stop()?>

<form class="col-4 mx-auto my-5" action="/signup" method="post">
    <div class="mb-3">
        <label for="username" class="form-label">Usuário</label>
        <input type="text" class="form-control" id="username" name="username" required autocomplete="off">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required autocomplete="off">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Senha</label>
        <input type="password" class="form-control" id="password" name="password" required autocomplete="off">
    </div>
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirmação de senha</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required autocomplete="off">
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>

<?php $this->start('js')?>
<?php $this->stop()?>