<div class="formularioFuncionarios">

      <div id="divPrincipalForm">
        <div class="title">
            <h1>Adicionar Funcionário</h1>
        </div>
        <div class="divForm">
          <div id="form">
            <form action="" method="post">
              <div class="inputFormName">
                <div>
                  <label for="txtName">Nome</label>
                  <input class="input"  class="inputName" type="text" name="txtName" id="txtName" placeholder="Ex: Joao Silva"
                    required>
                </div>
              </div>
              <div class="divFormulario">
                <div class="contentsFormulario">
                  <div>
                    <div class="inputForm">
                      <label for="dateBirth">Data de nascimento</label>
                      <input class="input" type="date" name="dateBirth" id="dateBirth">
                    </div>
                    <div class="inputForm">
                      <label for="txtEmail">Email</label>
                      <input class="input" type="email" name="txtEmail" id="txtEmail" placeholder="joao@exemplo.com" required>
                    </div>
                    <div class="inputForm">
                      <label for="numberCep">CEP</label>
                      <input class="input" type="number" name="numberCep" id="numberCep" placeholder="12345-678">
                    </div>
                    <div class="inputForm">
                      <label for="txtEstate">Estado</label>
                      <input class="input" type="text" name="txtEstate" id="txtEstate">
                    </div>
                    <div class="inputForm">
                      <label for="txtDistrict">Bairro</label>
                      <input class="input" type="text" name="txtDistrict" id="txtDistrict">
                    </div>
                    <div class="inputForm">
                      <label for="numberEnd">Numero</label>
                      <input class="input" type="number" name="numberEnd" id="numberEnd">
                    </div>
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
                    <input class="input" type="number" name="numberTelephone" id="numberTelephone" required
                      placeholder="(31) 91234-5678">
                  </div>
                  <div class="inputForm">
                    <label for="txtCity">Cidade</label>
                    <input class="input" type="text" name="txtCity" id="txtCity">
                  </div>
                  <div class="inputForm">
                    <label for="txtPatio">Logradouro</label>
                    <input class="input" type="text" name="txtPatio" id="txtPatio" placeholder="Avenida Paulista">
                  </div>
                  <div class="inputForm">
                    <label for="txtComplement">Complemento</label>
                    <input class="input" type="text" name="txtComplement" id="txtComplement"
                      placeholder="Casa, apartamento, condomínio">
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