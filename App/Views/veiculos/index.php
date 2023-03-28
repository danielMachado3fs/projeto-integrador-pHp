<?php

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
          <select name="types" id="types" class="select-type">
            <option value="all">Todos</option>
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
          <select name="makes" id="makes" class="select-make">
            <option value="all">Todas</option>
            <?php
            $makesData = $this->view->dataFilters['marca'];
            $selected = $this->view->dataFilters['selectedmake'];
            $filteredListmake = uniqueValue($makesData, "marca");
            foreach ($filteredListmake as $indice => $make) {
            ?>
            <option value="<?= $make ?>" <?php if ($selected == $make) {
                                              echo 'selected';
                                            } ?>><?= ucfirst($make) ?></option>
            <?php } ?>
          </select>
          <i class="custom-arrow-down-make bx bxs-chevron-down"></i>
          <i class="custom-arrow-up-make bx bxs-chevron-up"></i>
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
              <button onclick="viewUpdateVehicle(this)" data-id="<?= $vehicle['id'] ?>"><i
                  class="bx bxs-edit"></i></button>
              <button onclick="alertDeleteVehicle(this)" data-id="<?= $vehicle['id'] ?>"><i
                  class="bx bxs-trash"></i></button>
              <button id="btn-view" onclick="viewVehicle(this)" data-id="<?= $vehicle['id'] ?>"><i
                  class="bx bxs-show"></i></button>
            </td>
          </tr>
          <?php }
          } ?>
        </tbody>
      </table>
    </div>
  </div>
  <div id="fade-view" class="hide"></div>
  <div id="modal-view" class="hide">
    <div id="modal-header">
      <h2>Visualizar</h2>
      <button id="close-modal-view">
        <i class='bx bx-x'></i>
      </button>
    </div>
    <div id="modal-body">
      <div class="containerForm">
        <div class="fieldForm">
        </div>
      </div>
    </div>
  </div>
  <div class="footerButton">
    <a href="/veiculo_add" id="sendBtn">Cadastrar Veículo</a>
  </div>
</div>

<script>
$(".select-make").click(function() {
  $(".container .filter-wrapper .filter .filter-select .custom-arrow-up-make").toggleClass("selected");
  $(".container .filter-wrapper .filter .filter-select .custom-arrow-down-make").toggleClass("selected");
});

$(".select-type").click(function() {
  $(".container .filter-wrapper .filter .filter-select .custom-arrow-up-type").toggleClass("selected");
  $(".container .filter-wrapper .filter .filter-select .custom-arrow-down-type").toggleClass("selected");
});

if (sessionStorage.getItem("isdeleted") != null) {
  $(function() {
    showToastAlert("success", "Veículo Excluido Com Sucesso!", "isdeleted", "false");
  })
}

if (sessionStorage.getItem("isupdated") != null) {
  if (sessionStorage.getItem("isupdated") == "update") {
    $(function() {
      showToastAlert("success", "Veículo Atualizado Com Sucesso!", "isupdated", "nothing");
    })
  }
  if (sessionStorage.getItem("isupdated") == "notupdate") {
    $(function() {
      showToastAlert("error", "Veículo Não Atualizado Com Sucesso!", "isupdated", "nothing");
    })
  }
}

if (sessionStorage.getItem("isinserted") != null) {
  if (sessionStorage.getItem("isinserted") == "insert") {
    $(function() {
      showToastAlert("success", "Veículo Cadastrado Com Sucesso!", "isinserted", "nothing");
    })
  }
  if (sessionStorage.getItem("isupdated") == "notinsert") {
    $(function() {
      showToastAlert("error", "Veículo Não Cadastrado Com Sucesso!", "isinserted", "nothing");
    })
  }
}

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
        let vehicleId = $(elem).attr("data-id");
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

$("#close-modal-view").click(function() {
  $("#modal-view").toggleClass("hide");
  $("#fade-view").toggleClass("hide");
});

$("#fade-view").click(function() {
  $("#modal-view").toggleClass("hide");
  $("#fade-view").toggleClass("hide");
});

async function viewVehicle(elem) {
  let vehicleId = $(elem).attr("data-id");
  await $.ajax({
    type: "GET",
    url: '/veiculos_view',
    data: {
      vehicle_id: vehicleId
    },
    contentType: "application/json",
    dataType: "json",
    success: function(response) {

      function findKey(obj, value) {
        const key = Object.keys(obj).find(key => obj[key].includes(value))
        const keyFormatted = key.charAt(0).toUpperCase() + key.slice(1);
        return keyFormatted
      }

      response.forEach((key, index) => {
        $('.fieldForm').html('')

        $(".fieldForm").append(`
          <div class="box-input-view">
            <label>${findKey(response[index],response[index].placa)}</label>
            <input class="input input-view" type="text" value="${response[index].placa}" readonly>
          </div>
          <div class="box-input-view">
            <label>${findKey(response[index],response[index].marca)}</label>
            <input class="input input-view" type="text" value="${response[index].marca}" readonly>
          </div>
          <div class="box-input-view">
            <label>${findKey(response[index],response[index].modelo)}</label>
            <input class="input input-view" type="text" value="${response[index].modelo}" readonly>
          </div>
          <div class="box-input-view">
            <label>${findKey(response[index],response[index].anoFabricacao) == "AnoFabricacao" && "Ano Fabricação"}</label>
            <input class="input input-view" type="text" value="${dataFormatada(new Date(response[index].anoFabricacao))}" readonly>
          </div>
          <div class="box-input-view">
            <label>${findKey(response[index],response[index].dataAquisicao) == "DataAquisicao" && "Data De Aquisição"}</label>
            <input class="input input-view" type="text" value="${dataFormatada(new Date(response[index].dataAquisicao))}" readonly>
          </div>
          <div class="box-input-view">
            <label>${findKey(response[index],response[index].valor)}</label>
            <input class="input input-view-amount" type="text" data-thousands="." data-decimal="," data-prefix="R$ " value="${moneyMask(response[index].valor)}" readonly>
        `)
      });

      
      $("#modal-view").toggleClass("hide");
      $("#fade-view").toggleClass("hide");

      console.log("Veiculo retornado com sucesso.");
    },
    error: function(response) {
      console.log("Error no Banco de Dados.");
      Swal.fire({
        title: "Error!",
        text: "Veículo não retornado com sucesso",
        icon: "error",
        confirmButtonColor: "var(--primary-color)",
        confirmButtonText: "Ok",
      });
    }
  });
}

async function viewUpdateVehicle(elem) {
  let vehicleId = $(elem).attr("data-id");
  await $.ajax({
    type: "GET",
    url: `/veiculo_edit?vehicle_id=${vehicleId}`,
    headers: {
      'Accept': 'application/text',
      'Content-Type': 'application/json',
    },
    success: function(response, textStatus, xhr) {
      window.location.href = `/veiculo_edit?vehicle_id=${vehicleId}`;
      console.log("Veiculo retornado com sucesso.");
    },
    error: function(response) {
      console.log("Error no Banco de Dados.");
      Swal.fire({
        title: "Error!",
        text: "Veículo não retornado com sucesso",
        icon: "error",
        confirmButtonColor: "var(--primary-color)",
        confirmButtonText: "Ok",
      });
    }
  });
}

const moneyMask = (value) => {
  value = value.replace('.', '').replace(',', '').replace(/\D/g, '')

  const options = {
    minimumFractionDigits: 2
  }
  const result = new Intl.NumberFormat('pt-BR', options).format(
    parseFloat(value) / 100
  )

  return 'R$ ' + result
}
</script>