<nav class="sidebar">
  <div class="logo-content">
    <img src="./images/logo.svg" alt="" width="130" height="60" />
  </div>

  <ul class="nav-list">
    <li>
      <a href="">
        <i class="bx bx-line-chart"></i>
        <span class="link_name">Dashboard</span>
      </a>
    </li>

    <li>
      <a href="">
        <i class="bx bx-user"></i>
        <span class="link_name">Funcionários</span>
      </a>
    </li>

    <li>
      <a href="">
        <i class="bx bx-gas-pump"></i>
        <span class="link_name">Post. Combustivel</span>
      </a>
    </li>

    <li>
      <a href="">
        <i class="bx bx-car"></i>
        <span class="link_name">Veículos</span>
      </a>
    </li>

    <li>
      <a href="">
        <i class="bx bx-map-alt"></i>
        <span class="link_name">Mapa</span>
      </a>
    </li>

    <li>
      <a href="#" class="btn-finance">
        <i class="bx bx-money"></i>
        <span class="link_name">Financeiro</span>
        <i class="bx bxs-chevron-right"></i>
      </a>
      <ul class="finance-options-show">
        <li><a href="">Tickets</a></li>
        <li><a href="">Relatórios</a></li>
      </ul>
    </li>
  </ul>
</nav>

<script>
  $(".btn-finance").click(function () {
    $(".sidebar .nav-list .finance-options-show").toggleClass("show");
    $(".sidebar .nav-list li a .bxs-chevron-right").toggleClass("rotate");
    $(".sidebar .nav-list li .btn-finance").toggleClass("selected");
  });
</script>