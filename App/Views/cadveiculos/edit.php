<?php $modelInfo = $this->view->data ?>
<div class="title">
  <h1>Editar Funcionário</h1>
</div>
<div class="panelBody">
  <form action="/edit_store" method="post">
    <div class="inputForBoard">
      <div>
        <label for="placa">Placa</label>
        <input class="input" class="inputBoard" type="text" board="placa" id="placa" placeholder="Ex: ASD-1234" required value='<?= $modelInfo->nome ?>'>
      </div>
    </div>
    <div class="divFormulario">
      <div class="contentsFormulario">
        <div>
          <div class="inputForm">
            <label for="marca">Marca</label>
            <select class="select2" size="1" name="marca" id="marca">
              <option> Selecione...</option>
              <option <?php if ($modelInfo->marca == 'volvo') echo 'selected'; ?> value="volvo"> Volvo </option>
              <option <?php if ($modelInfo->marca == 'mercedes') echo 'selected'; ?> value="mercedes"> Mercedes </option>
              <option <?php if ($modelInfo->marca == 'volkswagen') echo 'selected'; ?> value="volkswagen"> Volkswagen </option>
            </select>
          </div>
        </div>
      </div>
      <div class="contentsFormulario2">
        <div class="inputForm">
          <label for="cpf">CPF</label>
          <input class="input" type="text" name="cpf" id="cpf" required placeholder="000.000.000-00" required value='<?= $modelInfo->cpf ?>'>
        </div>
        <div class="inputForm">
          <label for="telefone">Telefone</label>
          <input class="input" type="text" name="telefone" id="telefone" required placeholder="(00) 90000-0000" value='<?= $modelInfo->telefone ?>'>
        </div>
      </div>
    </div>
    <div class="rodape_btn">
      <button id="sendBtn" type="submit">Salvar</button>
      <a id="cancelBtn" href="/veiculos">Cancelar</a>
    </div>
    <input type="hidden" name="id" id="id" value='<?= $modelInfo->id ?>'>
  </form>
</div>

<script>
  $(document).ready(function() {
    $("#cpf").mask("000.000.000-00");
    $("#telefone").mask("(00) 00000-0000");
  })
</script>