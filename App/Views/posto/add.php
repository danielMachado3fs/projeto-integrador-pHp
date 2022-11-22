<div class="title">
  <h1>Cadastro de posto de combustível</h1>
</div>
<div class="panelBody">
  <div id="form">
    <form action="/adicionar_posto_store" method="POST">
      <div class="divFormulario">
        <div class="contentsFormulario">
          <div>
            <div class="inputForm">
              <label for="cnpj">CNPJ </label>
              <input class="input" type="text" name="cnpj" id="cnpj" required placeholder="Ex: 01.23.456/0000-00">
            </div>
            <div class="inputForm">
              <label for="txtEmail">Email</label>
              <input class="input" type="email" name="txtEmail" id="txtEmail" placeholder="shell@exemplo.com" required>
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
          </div>
        </div>
        <div class="contentsFormulario2">
          <div class="inputForm">
            <label for="txtFantasia">Nome Fantasia</label>
            <input class="input" type="text" name="txtFantasia" id="txtFantasia" required
              placeholder="Ex: Posto Ipiranga">
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
      </div>
      <div class="rodape_btn">
        <button id="sendBtn" type="submit">Salvar</button>
        <button id="cancelBtn">Cancelar</button>
      </div>
    </form>
  </div>  
</div>
<script>
  $("#cnpj").mask("00.000.000/0000-00")
</script>