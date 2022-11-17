<div class="top-bar">
    <div class="title-guide">
        <h2>DashBoard</h2>
    </div>

    <div class="profile">
        <a class="profile-content" href="#">
            <img src="https://akvis.com/img/examples/before-after/charcoal-eagle-o.jpg" alt="" />
            <h5 class="name">Meu OVO</h5>
            <i class="bx bxs-chevron-down"></i>
        </a>
        <ul class="dropdown-profile">

            <li><i class="bx bx-exit"></i> <a href="/sair">Sair</a></li>
        </ul>
    </div>
</div>

<script>
    $(".profile-content").click(function() {
        $(".dropdown-profile").toggleClass("show");
    });
</script>