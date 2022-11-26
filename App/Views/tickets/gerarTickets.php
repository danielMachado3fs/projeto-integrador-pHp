<div class="title">
  <h1>Gerar Tickets</h1>
</div>
<div class="panelBody">
  <div id="form">
    <form action="/gerar_ticket_store" method="POST">
      <div class="divFormulario">
        <div class="contentsFormulario">
          <div class="inputForm">
            <label for="motoristaId">Motorista</label>
            <select class="select2" size="1" name="motoristaId" id="motoristaId">
              <option value="">Selecione...</option>
              <?php
              foreach ($motoristas as $m) { ?>
                <option value="<?= $m->id ?>"><?= $m->nome ?></option>
              <?php } ?>
            </select>
            <br>
          </div>
          <div>
            <div class="inputForm">
              <label for="postoCombustivelId">Posto de Combustíveis</label>
              <select class="select2" size="1" name="postoCombustivelId" id="postoCombustivelId">
                <option value="">Selecione...</option>
                <?php
                foreach ($postos as $p) { ?>
                  <option <?= $selected2 ?> value="<?= $p->id ?>"><?= $p->nomeFantasia ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="inputForm">
              <label for="tipoCombustivel">Tipo de Combustíveis</label>
              <select class="select2" size="1" name="tipoCombustivel" id="tipoCombustivel">
                <option value="">Selecione...</option>
                <option value="gasolina-comum"> Gasolina comum </option>
                <option value="gasolina-aditivada"> Gasolina aditivada </option>
                <option value="etanol"> Etanol </option>
                <option value="diesel"> Diesel </option>
              </select>
            </div>
            <div class="inputForm">
              <label for="veiculoId">Veiculo</label>
              <select class="select2" size="1" name="veiculoId" id="veiculoId">
                <option value="">Selecione...</option>
                <?php
                foreach ($veiculos as $v) { ?>
                  <option value="<?= $v->id ?>"><?= $v->modelo ?> - <?= $v->placa ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="inputForm">
              <label for="valor">Valor</label>
              <input class="input" type="text" name="valor" id="valor" placeholder="R$0,00">
            </div>
            <div class="inputForm">
              <label for="dateEmissao">Data de emissão</label>

              <input class="input" type="date" name="dataEmissao" id="dataEmissao" value="<?php echo date("Y-m-d"); ?>" min="<?php echo date("Y-m-d"); ?>">

            </div>
            <div class="inputForm">
              <label for="dateValidade">Data de validade</label>
              <input class="input" type="date" name="dataValidade" id="dataValidade">
            </div>
          </div>
        </div>
      </div>
      <div class="rodape_btn">
        <button id="sendBtn" type="submit">Salvar</button>
        <button id="cancelBtn">Cancelar</button>
      </div>
    </form>
  </div>
</div>

<script>
  $('#valor').mask('#.000,00', {
    reverse: true
  })
</script>