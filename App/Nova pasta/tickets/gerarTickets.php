<!-- conexão com o banco de dados para pegar os dados -->
<!-- mudar os query para pegar os dados de cada tabela diferente, da tabela funcionarios, veiculo etc -->
<?php
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "scf_db";

//variaveis para inserir na tabela ticketsgerados//
if (isset($_POST['insert'])) {
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $database = "scf_db";



  $nome = $_POST['nome'];
  $nomeFantasia = $_POST['nomeFantasia'];
  $tipocombustiveis = $_POST['tipocombustiveis'];
  $valor = $_POST['valor'];
  $modelo = $_POST['modelo'];
  $dataemissao = $_POST['dataemissao'];
  $datavalidade = $_POST['datavalidade'];

  $connect = mysqli_connect($hostname, $username, $password, $database);
  $query = "INSERT INTO `ticketsgerados`(`nome`, `nomeFantasia`, `tipocombustiveis`, `valor`, `modelo`, `dataemissao`, `datavalidade`) VALUES ('$nome','$nomeFantasia','$tipocombustiveis','$valor','$modelo','$dataemissao','$datavalidade')";

  $result = mysqli_query($connect, $query);
  if ($result) {
    echo 'Dado inserido na tabela';
  } else {
    echo 'Dado inserido na tabela';
  }

  mysqli_close($connect);
}



$connect = mysqli_connect($hostname, $username, $password, $databaseName);
$query1 = "SELECT * FROM `funcionarios`";
$query2 = "SELECT * FROM `postos`";
$query3 = "SELECT * FROM `veiculo`";


$result1 = mysqli_query($connect, $query1);
$result2 = mysqli_query($connect, $query2);
$result3 = mysqli_query($connect, $query3);



// salva no banco de dados na tabela tickets gerados




?>
<!--  fim da conexão -->


<!doctype html>

<head>
  <charset="utf8">
</head>

<div class="title">
  <h1>Gerar Tickets</h1>
</div>

<div class="panelBody">
  <div id="form">
    <form action="tickets" method="post">
      <div class="divFormulario">
        <div class="contentsFormulario">
          <div>
            <label class="inputForm" for="nome">Motorista</label>
            <select size="1" name="nome">
              <?php while ($row1 = mysqli_fetch_array($result1)) :; ?>
                <option><?php echo $row1[1]; ?></option>
              <?php endwhile; ?>
            </select>
            </select>
            <br>
          </div>
          <div>
            <div>
              <label class="inputForm" for="nomeFantasia">Posto de Combustíveis</label>
              <select size="1" name="nomeFantasia">
                <?php while ($row2 = mysqli_fetch_array($result2)) :; ?>
                  <option><?php echo $row2[11]; ?></option>
                <?php endwhile; ?>
              </select>
            </div>
            <div>

              <label class="inputForm" for="tipocombustiveis">Tipo de Combustíveis</label>
              <select size="1" name="tipocombustiveis">
                <option> Gasolina comum </option>
                <option> Gasolina aditivada </option>
                <option> Gasolina premium </option>
                <option> Gasolina formulada </option>
                <option> Etanol </option>
                <option> Etanol aditivado </option>
                <option> Diesel </option>
              </select>
            </div>

            <div class="inputForm">
              <label for="valor">Valor</label>
              <input class="input" type="number" name="valor" id="valor" placeholder="R$00">
            </div>

            <div>
              <label class="inputForm" for="modelo">&nbsp;Veiculo</label>
              <select size="1" name="modelo">
                <?php while ($row3 = mysqli_fetch_array($result3)) :; ?>
                  <option><?php echo $row3[3];
                          echo "&nbsp";
                          echo $row3[2];
                          echo "&nbsp placa:&nbsp";
                          echo $row3[1]; ?></option>

                <?php endwhile; ?>
              </select>
            </div>
            <div class="inputForm">
              <label for="dataEmissao"> Data de emissão</label>
              <input class="input" type="date" name="dataEmissao" id="dataEmissao" min="<?php echo date("Y-m-d"); ?>" max="<?php echo date("Y-m-d"); ?>">
            </div>
            <div class="inputForm">
              <label for="dataValidade">Data de validade</label>
              <input class="input" type="date" name="dataValidade" id="dataValidade">
            </div>
          </div>
        </div>
        <div class="contentsFormulario2">
          <div class="inputForm">
          </div>
        </div>
      </div>
      <div class="rodape_btn">
        <button id="sendBtn" type="submit" name="insert">Salvar</button>
        <button id="cancelBtn">Cancelar</button>
      </div>
    </form>
  </div>
</div>