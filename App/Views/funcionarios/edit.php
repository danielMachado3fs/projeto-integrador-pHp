<?php $modelInfo = $this->view->data ?>
<div class="title">
  <h1>Editar Funcionário</h1>
</div>
<div class="panelBody">
  <form action="/edit_store" method="post">
    <div class="inputFormName">
      <div>
        <label for="nome">Nome</label>
        <input class="input" class="inputName" type="text" name="nome" id="nome" placeholder="Ex: Joao Silva" required value='<?= $modelInfo->nome ?>'>
      </div>
    </div>
    <div class="divFormulario">
      <div class="contentsFormulario">
        <div>
          <div class="inputForm">
            <label for="dataNascimento">Data de nascimento</label>
            <input class="input" type="date" name="dataNascimento" id="dataNascimento" required value='<?= $modelInfo->dataNascimento ?>'>
          </div>
          <div class="inputForm">
            <label for="email">Email</label>
            <input class="input" type="email" name="email" id="email" placeholder="joao@exemplo.com" required value='<?= $modelInfo->email ?>'>
          </div>
          <div class="inputForm">
            <label for="cep">CEP</label>
            <input class="input buscaCep" type="text" name="cep" id="cep" placeholder="0000-000" required value='<?= $modelInfo->cep ?>'>
          </div>
          <div class="inputForm">
            <label for="estado">Estado</label>
            <input class="input" type="text" name="estado" id="estado" readonly required value='<?= $modelInfo->estado ?>'>
          </div>
          <div class="inputForm">
            <label for="bairro">Bairro</label>
            <input class="input" type="text" name="bairro" id="bairro" readonly required value='<?= $modelInfo->bairro ?>'>
          </div>
          <div class="inputForm">
            <label for="numero">Numero</label>
            <input class="input" type="number" name="numero" id="numero" required value='<?= $modelInfo->numero ?>'>
          </div>
          <div class="inputForm">
            <label for="setor">Setor</label>
            <input class="input" type="text" name="setor" id="setor" required value='<?= $modelInfo->setor ?>'>
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
        <div class="inputForm">
          <label for="cidade">Cidade</label>
          <input class="input" type="text" name="cidade" id="cidade" readonly required value='<?= $modelInfo->cidade ?>'>
        </div>
        <div class="inputForm">
          <label for="logradouro">Logradouro</label>
          <input class="input" type="text" name="logradouro" id="logradouro" readonly required value='<?= $modelInfo->logradouro ?>'>
        </div>
        <div class="inputForm">
          <label for="complemento">Complemento</label>
          <input class="input" type="text" name="complemento" id="complemento" placeholder="Casa, apartamento, condomínio" required value='<?= $modelInfo->complemento ?>'>
        </div>
      </div>
    </div>
    <div class="rodape_btn">
      <button id="sendBtn" type="submit">Salvar</button>
      <button id="cancelBtn">Cancelar</button>
    </div>
    <input type="hidden" name="id" id="id" value='<?= $modelInfo->id ?>'>
  </form>
</div>

<script>
  $(document).ready(function() {
    $("#cep").mask("00000-000");
    $("#cpf").mask("000.000.000-00");
    $("#telefone").mask("(00) 00000-0000");
  })
</script>