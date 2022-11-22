<div class="formularioCadVeículos">

  <div id="divPrincipalForm">
    <div class="title">
      <h1>Adicionar Veículo</h1>
    </div>
    <div class="divForm">
      <div id="form">
        <form action="" method="post">
          <div class="inputForBoard">
            <div>
              <label for="txtBoard">Placa</label>
              <input class="input" class="inputBoard" type="text" name="txtBoard" id="txtBoard" placeholder="Ex: ASD-1234" required>
            </div>
          </div>
          <div class="divFormulario">
            <div class="contentsFormulario">
              <div>
                <div class="inputForm">
                  <label for="txtSector">Setor</label>
                  <input class="input" type="text" name="txtSector" id="txtSector" required>
                </div>
              </div>
            </div>
            <div class="contentsFormulario2">
              <div class="inputForm">
                <label for="numberCpf">CPF</label>
                <input class="input" type="number" name="numberCpf" id="numberCpf" required placeholder="12345-678">
              </div>
              <div class="inputForm">
                <label for="numberTelephone">Telefone</label>
                <input class="input" type="number" name="numberTelephone" id="numberTelephone" required placeholder="(31) 91234-5678">
              </div>

            </div>
            <div class="divBtn">
              <div>
                <input class="input" id="sendBtn" type="submit" value="Salvar">
                <!-- <button id="sendBtn">Salvar</button> -->
              </div>
              <div>
                <!-- <input id="cancelBtn" type="submit" value="Cancelar"> -->
                <button id="cancelBtn">Cancelar</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>