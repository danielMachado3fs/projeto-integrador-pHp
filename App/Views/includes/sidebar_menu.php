<nav class="sidebar">
  <div class="logo-content">
    <img src="./images/logo3.svg" alt="" width="250" height="70" style="scale: 3.5;"/>
  </div>

  <ul class="nav-list">
    <li>
      <a href="" class="btn-menu dashboardMenu" onclick="selectMenu('dashboardMenu')">
        <i class="bx bx-line-chart"></i>
        <span class="link_name">Dashboard</span>
      </a>
    </li>

    <li>
      <a href="/funcionarios" class="btn-menu funcionariosMenu" onclick="selectMenu('funcionariosMenu')">
        <i class="bx bx-user"></i>
        <span class="link_name">Funcionários</span>
      </a>
    </li>

    <li>
      <a href="" class="btn-menu postoMenu" onclick="selectMenu('postoMenu')">
        <i class="bx bx-gas-pump"></i>
        <span class="link_name">Post. Combustivel</span>
      </a>
    </li>

    <li>
      <a href="/veiculos" class="btn-menu veiculosMenu" onclick="selectMenu('veiculoMenu')">
        <i class="bx bx-car"></i>
        <span class="link_name">Veículos</span>
      </a>
    </li>

    <li>
      <a href="#" class="btn-menu mapaMenu" onclick="selectMenu('mapaMenu')">
        <i class="bx bx-map-alt"></i>
        <span class="link_name">Mapa</span>
      </a>
    </li>

    <li>
      <a href="#" class="btn-menu financeiro" onclick="selectMenu('financeiro')">
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
  $(".financeiroMenu").click(function () {
    $(".sidebar .nav-list .finance-options-show").toggleClass("show");
    $(".sidebar .nav-list li a .bxs-chevron-right").toggleClass("rotate");
    $(".sidebar .nav-list li .btn-menu").toggleClass("selected");
  });

  function selectMenu(btn){
    $(".btn-menu").removeClass("selected");
    $('.'+btn).addClass('selected');
  }

  $(document).ready(function(){
    var menuSelected = '<?=$this->view->menuSelected?>';
    console.log(menuSelected);
    $('.'+menuSelected).addClass('selected');
  })

  

</script>