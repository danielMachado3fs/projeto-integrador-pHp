<div class="table">
    <div class="table-section">
      <table>
        <thead>
          <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Setor</th>
            <th>Acoes</th>
          </tr>
        </thead>

        <tbody>
          <?php
          $vehicles = $this->view->dados;
          foreach ($funcionarios as $indice => $funcionario) {;
          ?>
          <tr>
            <td><?= $funcionario['nome'] ?></td>
            <td><?= $funcionario['email'] ?></td>
            <td><?= $funcionario['telefone'] ?></td>
            <td><?= $funcionario['setor'] ?></td>
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