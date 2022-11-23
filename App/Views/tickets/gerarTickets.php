
<!-- conexão com o banco de dados para pegar os dados -->
<!-- mudar os query para pegar os dados de cada tabela diferente, da tabela funcionarios, veiculo etc -->
<?php
$hostname = "localhost";
$username="root";
$password= "";
$databaseName="scf_db";

$connect = mysqli_connect($hostname,$username, $password, $databaseName);
$query="SELECT * FROM `registration`";

$result1 = mysqli_query($connect,$query);
$result2 = mysqli_query($connect,$query);
$result3 = mysqli_query($connect,$query);
$result4 = mysqli_query($connect,$query);

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
                
            <form action="connectGetTickets.php" method="post">

              <div class="divFormulario">
                <div class="contentsFormulario">
                  
                  <div>
                    <label class="inputForm" for="motorista"> Motorista</label> 
                    
                      <select  size="1" name="motorista">
                      <?php while ($row1 = mysqli_fetch_array($result1)):;?>
                      <option><?php echo $row1[0];?></option>
                      <?php endwhile;?>
                      </select>
                      </select>
                      <br>
                  </div>
               


                  <div>
                    <div >
                      <label class="inputForm" for="postoCombustiveis">Posto de Combustíveis</label> 
                      <select  size="1" name="postocombustiveis" >
                      <?php while ($row2 = mysqli_fetch_array($result2)):;?>
                      <option><?php echo $row2[1];?></option>
                      <?php endwhile;?>
                    </select>
                    </div>
                    <div  >

                      <label class="inputForm" for="TipoCombustiveis">Tipo de Combustíveis</label> 
                      <select   size="1" name="tiposCombustiveis">
                      <?php while ($row3 = mysqli_fetch_array($result3)):;?>
                      <option><?php echo $row3[2];?></option>
                      <?php endwhile;?>
                    </select>
                    </div>

                    <div class="inputForm">
                      <label for="valor">Valor</label>
                      <input class="input" type="number" name="valor" id="valor" placeholder="R$00">
                    </div>

                    <div>
                      <label class="inputForm" for="veiculo">&nbsp;Veiculo</label> 
                       <select  size="1" name="postos">
                      <?php while ($row4 = mysqli_fetch_array($result4)):;?>
                      <option><?php echo $row4[4];?></option>
                      <?php endwhile;?>
                    </select>
                    </div>

                    <div class="inputForm">
                      <label for="dateEmissao"> Data de emissão</label> 
                      
                      <input class="input" type="date" name="dateEmissao" id="dateEmissao"
                      min="<?php echo date("Y-m-d");?>"  max="<?php echo date("Y-m-d");?>">
                      
                    </div>
                    <div class="inputForm">
                      <label for="dateValidade">Data de validade</label> 
                      <input class="input" type="date" name="dateValidade" id="dateValidade">
                    </div>
                  </div>
                </div>
                <div class="contentsFormulario2">
                  <div class="inputForm">
                     
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