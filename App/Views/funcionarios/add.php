<div class="title">
  <h1>Editar Funcionário</h1>
</div>
<div class="divForm">
  <div id="form">
    <form action="/add_store" method="post">
      <div class="inputFormName">
        <div>
          <label for="nome">Nome</label>
          <input class="input" class="inputName" type="text" name="nome" id="nome" placeholder="Ex: Joao Silva" required>
        </div>
      </div>
      <div class="divFormulario">
        <div class="contentsFormulario">
          <div>
            <div class="inputForm">
              <label for="dataNascimento">Data de nascimento</label>
              <input class="input" type="date" name="dataNascimento" id="dataNascimento" required>
            </div>
            <div class="inputForm">
              <label for="email">Email</label>
              <input class="input" type="email" name="email" id="email" placeholder="joao@exemplo.com" required>
            </div>
            <div class="inputForm">
              <label for="cep">CEP</label>
              <input class="input buscaCep" type="text" name="cep" id="cep" placeholder="0000-000" required>
            </div>
            <div class="inputForm">
              <label for="estado">Estado</label>
              <input class="input" type="text" name="estado" id="estado" readonly required>
            </div>
            <div class="inputForm">
              <label for="bairro">Bairro</label>
              <input class="input" type="text" name="bairro" id="bairro" readonly required>
            </div>
            <div class="inputForm">
              <label for="numero">Numero</label>
              <input class="input" type="number" name="numero" id="numero" required>
            </div>
            <div class="inputForm">
              <label for="setor">Setor</label>
              <input class="input" type="text" name="setor" id="setor" required>
            </div>
          </div>
        </div>
        <div class="contentsFormulario2">
          <div class="inputForm">
            <label for="cpf">CPF</label>
            <input class="input" type="text" name="cpf" id="cpf" required placeholder="000.000.000-00" required>
          </div>
          <div class="inputForm">
            <label for="telefone">Telefone</label>
            <input class="input" type="text" name="telefone" id="telefone" required placeholder="(00) 90000-0000">
          </div>
          <div class="inputForm">
            <label for="cidade">Cidade</label>
            <input class="input" type="text" name="cidade" id="cidade" readonly required>
          </div>
          <div class="inputForm">
            <label for="logradouro">Logradouro</label>
            <input class="input" type="text" name="logradouro" id="logradouro" readonly required>
          </div>
          <div class="inputForm">
            <label for="complemento">Complemento</label>
            <input class="input" type="text" name="complemento" id="complemento" placeholder="Casa, apartamento, condomínio" required>
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
  $(document).ready(function() {
    $("#cep").mask("00000-000");
    $("#cpf").mask("000.000.000-00");
    $("#telefone").mask("(00) 00000-0000");
  })
</script>