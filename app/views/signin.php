<?php $this->layout('master', ['title' => $title, 'error' => $error]) ?>

<?php $this->start('css') ?>
<?php $this->stop() ?>

<div class="" style="margin-top:100px;">
    <form id="formSignin" class="col-4 mx-auto my-5" action="/signin" method="post">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control" id="password" name="password" required autocomplete="off">
        </div>
        <button type="submit" class="btn btn-primary">Logar</button>
    </form>
    <div class="alert alert-danger <?php echo isset($error) ? '' : 'd-none' ?>" role="alert">
        <?php echo $this->e($error) ?>
    </div>
</div>


<?php $this->start('js') ?>
<script src="/js/signin.js"></script>
<?php $this->stop() ?>