<?php
$veiculos = array(array("model" => "S10", "marca" => "Chevrolet", "ano" => "2016", "placa" => "xxxxx"), array("model" => "12", "marca" => "oi", "ano" => "400", "placa" => "xffx"), array("model" => "12", "marca" => "oi", "ano" => "400", "placa" => "xffx"), array("model" => "12", "marca" => "oi", "ano" => "400", "placa" => "xffx"), array("model" => "12", "marca" => "oi", "ano" => "400", "placa" => "xffx"), array("model" => "12", "marca" => "oi", "ano" => "400", "placa" => "xffx"), array("model" => "12", "marca" => "oi", "ano" => "400", "placa" => "xffx"), array("model" => "12", "marca" => "oi", "ano" => "400", "placa" => "xffx"), array("model" => "12", "marca" => "oi", "ano" => "400", "placa" => "xffx"), array("model" => "12", "marca" => "oi", "ano" => "400", "placa" => "xffx"),)
?>

<div class="title">
  <h1>Veículos Cadastrados</h1>
</div>
<div class="panelBody">
<div class="filter-wrapper">
  <div class="filter">
    <div class="filter-select">
      <span class="label">Tipo</span>
      <span class="select select-btn-car-type">Selecione o tipo do veículo</span>
    </div>
    <ul class="select-vehicle select-vehicle-type">
      <li><a href="#" class="type-select">teste</a></li>
      <li><a href="#" class="type-select">teste1</a></li>
      <li><a href="#" class="type-select">teste2</a></li>
      <li><a href="#" class="type-select">teste3</a></li>
      <li><a href="#" class="type-select">teste4</a></li>
      <li><a href="#" class="type-select">teste5</a></li>
    </ul>
    <button class="btn-vehicle-type">
      <i class="bx bxs-chevron-down"></i>
    </button>

  </div>
  <div class="line"></div>
  <div class="filter">
    <div class="filter-select">
      <span class="label">Marca</span>
      <span class="select select-btn-car-brand">Selecione a marca do veículo</span>
    </div>
    <ul class="select-vehicle select-vehicle-brand">
      <li><a href="#" class="brand-select">teste</a></li>
      <li><a href="#" class="brand-select">teste1</a></li>
      <li><a href="#" class="brand-select">teste2</a></li>
      <li><a href="#" class="brand-select">teste3</a></li>
      <li><a href="#" class="brand-select">teste4</a></li>
      <li><a href="#" class="brand-select">teste5</a></li>
    </ul>
    <button class="btn-vehicle-brand">
      <i class="bx bxs-chevron-down"></i>
    </button>
  </div>

  <button class="filter-btn">
    <i class="bx bx-search"></i>
  </button>
</div>
<div class="table">
  <div class="table-section">
    <table>
      <thead>
        <tr>
          <th>Tipo</th>
          <th>Modelo</th>
          <th>Marca</th>
          <th>Ano Fabricacao</th>
          <th>Placa</th>
          <th>Acoes</th>
        </tr>
      </thead>

      <tbody>
        <?php foreach ($this->view->dados as $indice => $veiculo) {
        ?>
        <tr>
          <td>
            <span class="icon-type">
              <?php
                switch ($veiculo['tipo']) {
                  case "carro":
                    echo '<i class="bx bxs-car"></i>';
                    break;
                  case "caminhao":
                    echo '<i class="bx bxs-truck"></i>';
                    break;
                  default:
                    echo '<i class="bx bxs-car"></i>';;
                }
                ?>
            </span>
          </td>
          <td><?= $veiculo['modelo'] ?></td>
          <td><?= $veiculo['marca'] ?></td>
          <td><?= date('Y', strtotime($veiculo['anoFabricacao'])) ?></td>
          <td>
            <?= $veiculo['placa'] ?>
          </td>
          <td>
            <button><i class="bx bxs-edit"></i></button>
            <button onclick="alertDeleteVehicle()"><i class="bx bxs-trash"></i></button>
            <button><i class="bx bxs-show"></i></button>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
<div class="footerButton">
  <button id="sendBtn">Cadastrar</button>
</div>
</div>

<script>
$(document).ready(function() {
  // Mostar os tipos de veiculos
  $(".btn-vehicle-type").click(function() {
    $(".select-vehicle-brand").toggleClass("show", false);
    $(".select-vehicle-type").toggleClass("show");
  });
  // Mostar as marcas de veiculos
  $(".btn-vehicle-brand").click(function() {
    $(".select-vehicle-type").toggleClass("show", false);
    $(".select-vehicle-brand").toggleClass("show");
  });

  // Substituir a opcao padrao para a opcao da marca de veiculo que deseja procurar
  $(".brand-select").click(function() {
    let $brand = $(".brand-select");
    let $option = ($(this).text());
    $(".select-btn-car-brand").text($option)
  })
  // Substituir a opcao padrao para a opcao do tipo de veiculo que deseja procurar
  $(".type-select").click(function() {
    let $type = $(".type-select");
    let $option = ($(this).text());
    $(".select-btn-car-type").text($option)
  })
})

function alertDeleteVehicle() {
  Swal.fire({
    title: 'oii!',
    text: 'Do you want to continue',
    icon: 'error',
    showCancelButton: true,
    cancelButtonText: 'Cancelar'
  })
}
</script>