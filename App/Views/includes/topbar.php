<?php session_start(); ?>
<div class="top-bar">
    <div class="title-guide">
        <h2><?= $this->view->topBarTitle ?></h2>
    </div>

    <div class="profile">
        <a class="profile-content" href="#">
        <img
            src="https://akvis.com/img/examples/before-after/charcoal-eagle-o.jpg"
            alt=""
        />
        <h5 class="name"><?= $_SESSION['nome'] ?></h5>
        <i class="bx bxs-chevron-down"></i>
        </a>
        <ul class="dropdown-profile">
        <li><i class="bx bx-cog"></i> Configurações</li>
        <li><i class="bx bx-exit"></i><a href="/logoff" style="text-decoration:none;"> Sair</a></li>
        </ul>
    </div>
</div>

<script>
    $(".profile-content").click(function () {
        $(".dropdown-profile").toggleClass("show");
    });
</script>