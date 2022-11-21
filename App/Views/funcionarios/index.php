<?php
function uniqueValue($datas, $typeValue)
{
    $dataList = array();
    foreach ($datas as $indice => $data) {
        array_push($dataList, $data[$typeValue]);
    }
    return array_unique($dataList);
}

?>

<!-- <div class="title">
  <h1>Veículos Cadastrados</h1>
</div> -->
<div class="panelBody">
    <form action="/funcionarios" method="GET">
        <div class="filter-wrapper">
            <div class="filter">
                <div class="filter-select">
                    <span class="label">Setor</span>
                    <select name="setor" id="setor">
                        <option value=''>Todos</option>
                        <option <?php if ($selectedSetor == 'administrativo') echo 'selected'; ?> value="administrativo"> Administrativo </option>
                        <option <?php if ($selectedSetor == 'financeiro') echo 'selected'; ?> value="financeiro"> Financeiro </option>
                        <option <?php if ($selectedSetor == 'logistica') echo 'selected'; ?> value="logistica"> Logística </option>
                    </select>
                    <i class="custom-arrow-down-type bx bxs-chevron-down"></i>
                    <i class="custom-arrow-up-type bx bxs-chevron-up"></i>
                </div>
            </div>
            <div class="line"></div>
            <div class="filter">
                <div class="filter-select">
                    <span class="label">Nome</span>
                    <input type="text" name="nome" id="nome" value="<?= $selectedNome ?>">
                </div>
            </div>
            <button class="search filter-btn" type="submit" name="search" value="search">
                <i class="bx bx-search"></i>
            </button>
        </div>
    </form>
    <div class="table">
        <div class="table-section">
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Setor</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    foreach ($funcionarios as $indice => $funcionario) {
                    ?>
                        <tr>
                            <td><?= $funcionario->nome ?></td>
                            <td><?= $funcionario->email ?></td>
                            <td><?= $funcionario->telefone ?></td>
                            <td><?= strtoupper($funcionario->setor) ?></td>
                            <td>
                                <a href="/funcionario_edit?id=<?= $funcionario->id ?>"><i class="bx bxs-edit"></i></a>
                                <a href="/funcionario_delete?id=<?= $funcionario->id ?>"><i class="bx bxs-trash"></i></a>
                                <a href="/funcionario_view?id=<?= $funcionario->id ?>"><i class="bx bxs-show"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="footerButton">
        <a href="/funcionario_add" id="sendBtn">Cadastrar Funcionário</a>
    </div>
</div>


<script>
    $(".select-brand").click(function() {
        $(".container .filter-wrapper .filter .filter-select .custom-arrow-up-brand").toggleClass("selected");
        $(".container .filter-wrapper .filter .filter-select .custom-arrow-down-brand").toggleClass("selected");
    });

    $(".select-type").click(function() {
        $(".container .filter-wrapper .filter .filter-select .custom-arrow-up-type").toggleClass("selected");
        $(".container .filter-wrapper .filter .filter-select .custom-arrow-down-type").toggleClass("selected");
    });


    function alertDeleteVehicle() {
        Swal.fire({
            title: 'oii!',
            text: 'Do you want to continue',
            icon: 'error',
            showCancelButton: true,
            cancelButtonText: 'Cancelar'
        })
    }
</script>