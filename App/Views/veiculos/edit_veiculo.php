<?php $dataVehicle = $this->view->dataVehicle[0]; ?>
<div class="title">
  <h1>Editar Funcionário</h1>
</div>
<div class="panelBody">
  <form action="/veiculo_edit_store" method="post">
    <div class="inputForm">
      <div>
        <label for="nome">Placa</label>
        <input class="input" class="inputPlaca" type="text" maxlength="7" name="placa" id="vehicle-placa"
          placeholder="Ex: HHH8H77" required value='<?= $dataVehicle["placa"] ?>'>
      </div>
    </div>
    <div class="divFormulario">
      <div class="contentsFormulario">
        <div>
          <div class="inputForm">
            <label for="setor">Marca</label>
            <select class="select2" size="1" name="marca" id="vehicle-brand" required>
              <option disabled selected hidden> Selecione...</option>
            </select>
          </div>
          <div class="inputForm">
            <label for="dataNascimento">Data Fabricação</label>
            <input class="input" type="date" name="anoFabricacao" id="anoFabricacao" required
              value='<?= $dataVehicle["anoFabricacao"] ?>'>
          </div>
          <div class="inputForm">
            <label for="dataNascimento">Data de Aquisicao</label>
            <input class="input" type="date" name="dataAquisicao" id="dataAquisicao" readonly required
              value='<?= $dataVehicle["dataAquisicao"] ?>'>
          </div>
        </div>
      </div>
      <div class="contentsFormulario2">
        <div class="inputForm">
          <label for="email">Modelo</label>
          <input class="input" type="text" name="modelo" id="modelo" placeholder="Gol G5" required
            value='<?= $dataVehicle["modelo"]  ?>'>
        </div>
        <div class="inputForm">
          <label for="tipo">Tipo</label>
          <select class="select2" size="1" name="tipo" id="tipo" required>
            <option disabled selected hidden> Selecione...</option>
            <?php echo $dataVehicle['tipo'] ?>
            <option <?php if ($dataVehicle["tipo"] == 'carro') echo 'selected'; ?> value="carro">
              Carro </option>
            <option <?php if ($dataVehicle["tipo"] == 'caminhao') echo 'selected'; ?> value="caminhao"> Caminhao
            </option>
          </select>
        </div>
        <div class="inputForm">
          <label for="email">Valor</label>
          <input class="input" type="text" name="valor" id="valor" step=".01" placeholder="R$100.00" required
            value='<?= $dataVehicle["valor"] ?>'>
        </div>
      </div>
    </div>
    <div class="rodape_btn veiculo-form">
      <button id="sendBtn" onclick="updateVehicle(this)" type="submit">Salvar</button>
      <a id="cancelBtn" href="/veiculos">Cancelar</a>
    </div>
    <input type="hidden" name="id" id="id" value='<?= $dataVehicle["id"] ?>'>
  </form>
</div>

<script>
$(document).ready(function() {
  $("#cep").mask("00000-000");
  $("#cpf").mask("000.000.000-00");
  $("#telefone").mask("(00) 00000-0000");

  $("#valor").mask('###0.00', {
    reverse: true
  });
})

function dataOptions() {
  // const dataMarca = "<?php echo $dataVehicle["marca"] ?>".toLowerCase();
  const dataMarca = "<?php echo $dataVehicle["modelo"] ?>".toLowerCase();
  return {
    "datamarca": dataMarca,
  }
}

async function updateVehicle(elem) {
  await fetch(
    "/veiculo_edit_store", {
      method: "POST",
      // headers: {
      //   "Content-Type": "application/json",
      // },
    }
  ).then((res) => {
    if (res.ok) {
      sessionStorage.setItem("isupdated", 'update');
    } else {
      sessionStorage.setItem("isupdated", 'notupdate');
      console.log("Network response was not ok.")
    }
  }).catch((error) => {
    console.log('There has been a problem with your fetch operation: ' + error.message);
    sessionStorage.setItem("isupdated", 'notupdate');
  })




}
</script>