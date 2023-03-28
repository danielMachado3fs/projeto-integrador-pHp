<?php
function uniqueValue($data, $typeValue)
{
    $dataList = array();
    foreach ($data as $indice => $d) {
        array_push($dataList, $d->{$typeValue});
    }
    return array_unique($dataList);
}

?>

<div class="panelBody">
    <form action="/postos_combustivel" method="GET">
        <div class="filter-wrapper">
            <div class="filter">
                <div class="filter-select">
                    <span class="label">Cidade</span>
                    
                    <select name="cidade" id="cidade">
                        <option value=''>Todas</option>
                        <?php
                        $cidades = uniqueValue($postos, "cidade");
                        $selected = '';
                        foreach ($cidades as $c) {
                            if ($c == $selectedCidade) $selected = 'selected';
                        ?>
                            <option <?= $selected ?> value='<?= $c ?>'><?= $c ?></option>
                        <?php } ?>
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
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Cidade</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    foreach ($postos as $indice => $posto) {
                    ?>
                        <tr>
                            <td><?= $posto->nomeFantasia ?></td>
                            <td><?= $posto->telefone ?></td>
                            <td><?= $posto->email ?></td>
                            <td><?= ucfirst($posto->cidade) ?></td>
                            <td>
                                <a href="/posto_edit?id=<?= $posto->id ?>"><i class="bx bxs-edit"></i></a>
                                <a onclick="alertDeleteposto(<?= $posto->id ?>)"><i class="bx bxs-trash"></i></a>
                                <a href="/posto_view?id=<?= $posto->id ?>"><i class="bx bxs-show"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="footerButton">
        <a href="/adicionar_posto" id="sendBtn">Cadastrar Posto Combustível</a>
    </div>
</div>


<script>
    $(".select-make").click(function() {
        $(".container .filter-wrapper .filter .filter-select .custom-arrow-up-make").toggleClass("selected");
        $(".container .filter-wrapper .filter .filter-select .custom-arrow-down-make").toggleClass("selected");
    });

    $(".select-type").click(function() {
        $(".container .filter-wrapper .filter .filter-select .custom-arrow-up-type").toggleClass("selected");
        $(".container .filter-wrapper .filter .filter-select .custom-arrow-down-type").toggleClass("selected");
    });


    function alertDeleteposto(id) {
        Swal.fire({
                title: "Excluir posto de combustível?",
                text: "Esse processo não pode ser desfeito.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: "#ff0000",
                cancelButtonColor: "#a9c0d4",
                confirmButtonText: "Remover",
                cancelButtonText: "Cancelar",
            })
            .then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "GET",
                        url: '/posto_delete',
                        data: {
                            id: id
                        },
                        dataType: "json",
                        success: function(result) {
                            console.log(result);
                            if (result.success) {
                                Swal.fire({
                                    title: "Registro excluido com sucesso!",
                                    icon: "success",
                                    confirmButtonColor: "var(--primary-color)",
                                    confirmButtonText: "Ok",
                                }).then((result) => {
                                    sessionStorage.setItem("isdeleted", 'true');
                                    location.reload();
                                })
                            } else {
                                Swal.fire({
                                    title: "Error!",
                                    text: result.message,
                                    icon: "error",
                                    confirmButtonColor: "var(--primary-color)",
                                    confirmButtonText: "Ok",
                                });
                            }
                        }
                    });
                } else if (
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    // If cancel do nothing (stay on same page).
                }
            })
    }
</script>