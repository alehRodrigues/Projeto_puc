<nav class="d-flex justify-content-between mb-5">
    <ul class="d-flex align-items-center justify-content-start">
        <li class="mx-3 p-2"><a href="/">Home</a></li>
        <li class="mx-3 p-2"><a href="/items">Itens Empréstimos</a></li>
    </ul>
    <a href="/profile/edit/<?php echo $_SESSION['id'] ?>" type="button" class="my-3 mx-5 px-3 mr-4 btn btn-info"><?php echo $_SESSION['user'] ?></a>
</nav>