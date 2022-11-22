<div class="table">
  <div class="table-section">
    <table>
      <thead>
        <tr>
          <th>Placa</th>
          <th>Telefone</th>
          <th>Marca</th>
          <th>Acoes</th>
        </tr>
      </thead>

      <tbody>
        <?php
        $vehicles = $this->view->dados;
        foreach ($veiculos as $indice => $veiculo) {;
        ?>
          <tr>
            <td><?= $veiculo['nome'] ?></td>
            <td><?= $veiculo['email'] ?></td>
            <td><?= $veiculo['telefone'] ?></td>
            <td><?= $veiculo['marca'] ?></td>
            <td>
              <button><i class="bx bxs-edit"></i></button>
              <button onclick="alertDeleteVehicle()"><i class="bx bxs-trash"></i></button>
              <button><i class="bx bxs-show"></i></button>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>