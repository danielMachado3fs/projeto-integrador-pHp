<?php

use App\Route;

function uniqueValue($datas, $typeValue)
{
  $dataList = array();
  foreach ($datas as $indice => $data) {
    array_push($dataList, $data[$typeValue]);
  }
  return array_unique($dataList);
}

?>

<div class="title">
  <h1>Veículos Cadastrados</h1>
</div>
<div class="panelBody">

  <form action="/veiculos" method="GET">
    <div class="filter-wrapper">
      <div class="filter">
        <div class="filter-select">
          <span class="label">Tipo</span>
          <select name="types" id="types" class="select-type" required>
            <option value="" disabled selected hidden>Selecione o tipo do veículo</option>
            <option value="all">Todos os tipos</option>
            <?php
            $typesData = $this->view->dataFilters['tipo'];
            $selected = $this->view->dataFilters['selectedType'];
            $filteredListType = uniqueValue($typesData, "tipo");
            foreach ($filteredListType as $indice => $type) {
            ?>
            <option value="<?= $type ?>" <?php if ($selected == $type) {
                                              echo 'selected';
                                            } ?>><?= ucfirst($type) ?></option>
            <?php } ?>
          </select>
          <i class="custom-arrow-down-type bx bxs-chevron-down"></i>
          <i class="custom-arrow-up-type bx bxs-chevron-up"></i>
        </div>
      </div>
      <div class="line"></div>
      <div class="filter">
        <div class="filter-select">
          <span class="label">Marca</span>
          <select name="brands" id="brands" class="select-brand" required>
            <option value="" disabled selected hidden>Selecione a marca do veículo</option>
            <option value="all">Todas as marcas</option>
            <?php
            $brandsData = $this->view->dataFilters['marca'];
            $selected = $this->view->dataFilters['selectedBrand'];
            $filteredListBrand = uniqueValue($brandsData, "marca");
            foreach ($filteredListBrand as $indice => $brand) {
            ?>
            <option value="<?= $brand ?>" <?php if ($selected == $brand) {
                                              echo 'selected';
                                            } ?>><?= ucfirst($brand) ?></option>
            <?php } ?>
          </select>
          <i class="custom-arrow-down-brand bx bxs-chevron-down"></i>
          <i class="custom-arrow-up-brand bx bxs-chevron-up"></i>
        </div>
      </div>
      <button class="search filter-btn" type="submit" name="search" value="searched">
        <i class="bx bx-search"></i>
      </button>
    </div>
  </form>
  <div class="table">
    <div class="table-section">
      <table id="tableHolder">
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
          <?php
          $vehicles = $this->view->dados;
          foreach ($vehicles as $indice => $vehicle) {
            if ($vehicle['deletado'] == 0) {
          ?>
          <tr>
            <td>
              <span class="icon-type">
                <?php
                    switch ($vehicle['tipo']) {
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
            <td><?= $vehicle['modelo'] ?></td>
            <td><?= $vehicle['marca'] ?></td>
            <td><?= date('Y', strtotime($vehicle['anoFabricacao'])) ?></td>
            <td>
              <?= $vehicle['placa'] ?>
            </td>
            <td>
              <button><i class="bx bxs-edit"></i></button>
              <button onclick="alertDeleteVehicle(this)" data-id="<?= $vehicle['id'] ?>"><i
                  class="bx bxs-trash"></i></button>
              <button><i class="bx bxs-show"></i></button>
            </td>
          </tr>
          <?php }
          } ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="footerButton">
    <button id="sendBtn">Cadastrar</button>
  </div>
</div>


<script>
$(".select-brand").click(function() {
  $(".container .filter-wrapper .filter .filter-select .custom-arrow-up-brand").toggleClass("selected");
  $(".container .filter-wrapper .filter .filter-select .custom-arrow-down-brand").toggleClass("selected");
});

$(".select-type").click(function() {
  $(".container .filter-wrapper .filter .filter-select .custom-arrow-up-type").toggleClass("selected");
  $(".container .filter-wrapper .filter .filter-select .custom-arrow-down-type").toggleClass("selected");

});

$(function() {
  showToastAlert("success", "Veículo Excluido Com Sucesso!", "isdeleted", "false");
})

function alertDeleteVehicle(elem) {
  Swal.fire({
      title: "Excluir Veículo",
      text: "Excluindo esse veículo perderá todas as informações do veículo. Esse processo não pode ser desfeito.",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: "#ff0000",
      cancelButtonColor: "#a9c0d4",
      confirmButtonText: "Remover",
      cancelButtonText: "Cancelar",
    })
    .then((result) => {
      if (result.isConfirmed) {
        var vehicleId = $(elem).attr("data-id");
        $.ajax({
          type: "POST",
          url: '/veiculos_delete',
          data: {
            vehicle_id: vehicleId
          },
          dataType: "text",
          success: function(data, statusText, xhr) {
            console.log("Veiculo deletado com sucesso.");
            if (xhr.status == 200) {
              Swal.fire({
                title: "Veículo Excluido Com Sucesso!",
                text: "Veículo excluido com sucesso",
                icon: "success",
                confirmButtonColor: "var(--primary-color)",
                confirmButtonText: "Ok",
              }).then((result) => {
                sessionStorage.setItem("isdeleted", 'true');
                location.reload();
              })
            }
          },
          error: function(response) {
            console.log("Error no Banco de Dados.");
            Swal.fire({
              title: "Error!",
              text: "Veículo não excluido com sucesso",
              icon: "error",
              confirmButtonColor: "var(--primary-color)",
              confirmButtonText: "Ok",
            });
          }
        });
      } else if (
        result.dismiss === swal.DismissReason.cancel
      ) {}
    })
}
</script>