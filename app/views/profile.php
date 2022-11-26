<?php $this->layout('master', ['title' => $title, 'user' => $user, 'email' => $email]) ?>

<?php $this->start('css') ?>
<?php $this->stop() ?>

<div style="margin-top:100px;">
    <form id="formSignup" class="col-4 mx-auto my-5" action="/profile/edit/<?php echo $_SESSION['id'] ?>" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Usuário</label>
            <input type="text" class="form-control" id="username" name="username" required autocomplete="off" value="<?php echo $this->e($user) ?>">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required autocomplete="off" value="<?php echo $this->e($email) ?>">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Nova Senha</label>
            <input type="password" class="form-control" id="password" name="password" autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Repita Nova Senha</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" autocomplete="off">
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="/signout" class="btn btn-danger">Sair</a>
    </form>
</div>


<?php $this->start('js') ?>
<script src="/js/profile.js"></script>
<?php $this->stop() ?>