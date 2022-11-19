
                
            <form>
              <div class="divFormulario">
                <div class="contentsFormulario">
                  
                  <div>
                    <label  for="motorista">Motorista</label> 
                     
                      <select  size="1" name="motorista">
                          <option> Artur Santos</option>
                          <option> Daniel Maciel </option>
                          <option> Fabricio Correia</option>
                          <option> Fernando Elias</option>
                          <option> Guilherme Freitas </option>
                          <option> Julio Eler </option>
                          <option> Raniery Neiva </option>
                      </select>
                      <br>
                  </div>
               


                  <div>
                    <div >
                      <label for="postoCombustiveis">Posto de Combustíveis</label> 
                      <select  size="1" name="postos">
                        <option> Posto Belvedere </option>
                        <option> Posto Ipiranga </option>
                        <option> Posto Veraneio XIII </option>
                        <option> Posto Shell </option>
                        <option> Posto Furacão Rede Riva 7 </option>
                        <option> Posto D&F da rede D&D </option>
                        <option> Posto GT7 </option>
                    </select>
                    </div>
                    <div  >
                      <label for="TipoCombustiveis">Tipo de Combustíveis</label> 
                      <select   size="1" name="tiposCombustiveis">
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
                    <div  >
                      <label for="veiculo">Veiculo</label> 
                       <select  size="1" name="postos">
                        <option> Hyundai: HR</option>
                        <option> Hyundai: HD80 </option>
                        <option> Volvo: FH </option>
                        <option> Scania </option>
                        <option> Volksvagen </option>

                    </select>
                    </div>
                    <div class="inputForm">
                      <label for="dateEmissao">Data de emissão</label> 
                      
                      <input class="input" type="date" name="dateEmissao" id="dateEmissao"
                      min="2022-11-11">
                      
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