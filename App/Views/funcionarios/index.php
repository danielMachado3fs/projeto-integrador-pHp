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
                        <th>Cargo</th>
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
                            <td><?= strtoupper($funcionario->cargo) ?></td>
                            <td><?= strtoupper($funcionario->setor) ?></td>
                            <td>
                                <a href="/funcionario_edit?id=<?= $funcionario->id ?>"><i class="bx bxs-edit"></i></a>
                                <a href="#" onclick="alertDeleteFuncionario(<?= $funcionario->id ?>)"><i class="bx bxs-trash"></i></a>
                                <a href="#" onclick="viewFuncionario(<?= $funcionario->id ?>)"><i class="bx bxs-show"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div id="fade-view" class="hide"></div>
    <div id="modal-view" class="hide">
        <div id="modal-header">
            <h2>Visualizar</h2>
            <button id="close-modal-view">
                <i class='bx bx-x'></i>
            </button>
        </div>
        <div id="modal-body">
            <div class="containerForm">
                <div class="fieldForm">
                </div>
            </div>
        </div>
    </div>
    <div class="footerButton">
        <a href="/funcionario_add" id="sendBtn">Cadastrar Funcionário</a>
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


    function alertDeleteticket(id) {
        Swal.fire({
                title: "Excluir Funcionario",
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
                        url: '/funcionario_delete',
                        data: {
                            id: id
                        },
                        dataType: "json",
                        success: function(result) {
                            console.log(result);
                            if (result.success) {
                                Swal.fire({
                                    title: "Funcionário Excluído Com Sucesso!",
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

    $("#close-modal-view").click(function() {
        $("#modal-view").toggleClass("hide");
        $("#fade-view").toggleClass("hide");
    });

    $("#fade-view").click(function() {
        $("#modal-view").toggleClass("hide");
        $("#fade-view").toggleClass("hide");
    });

    async function viewFuncionario(id) {
        await $.ajax({
            type: "GET",
            url: '/funcionario_view',
            data: {
                id: id
            },
            contentType: "application/json",
            dataType: "json",
            success: function(response) {
                console.log(response);
                if (response.success) {
                    let data = response.data;
                    $('.fieldForm').html('')

                    $(".fieldForm").append(`
                        <div class="box-input-view">
                            <label>Nome</label>
                            <input class="input input-view" type="text" value="${data.nome}" readonly>
                        </div>
                        <div class="box-input-view">
                            <label>Data nascimento</label>
                            <input class="input input-view" type="text" value="${dataFormatada(new Date(data.dataNascimento))}" readonly>
                        </div>
                        <div class="box-input-view">
                            <label>Email</label>
                            <input class="input input-view" type="text" value="${data.email}" readonly>
                        </div>
                        <div class="box-input-view">
                            <label>Telefone</label>
                            <input class="input input-view" type="text" value="${data.telefone}" readonly>
                        </div>
                        <div class="box-input-view">
                            <label>Setor</label>
                            <input class="input input-view" type="text" value="${data.setor.toUpperCase()}" readonly>
                        </div>
                        <div class="box-input-view">
                            <label>Cargo</label>
                            <input class="input input-view" type="text" value="${data.cargo}" readonly>
                        </div>
                        <div class="box-input-view">
                            <label>Endereço completo</label>
                            <input class="input input-view" type="text" value="${data.logradouro}, bairro ${data.bairro}, ${data.cidade} - ${data.estado}, CEP - ${data.cep}" readonly>
                        </div>
                    `)
                    $("#modal-view").toggleClass("hide");
                    $("#fade-view").toggleClass("hide");
                } else {
                    Swal.fire({
                        title: "Error!",
                        text: `${response.message}`,
                        icon: "error",
                        confirmButtonColor: "var(--primary-color)",
                        confirmButtonText: "Ok",
                    });
                }
                console.log("Veiculo retornado com sucesso.");
            },
            error: function(response) {
                console.log("Error no Banco de Dados.");
                Swal.fire({
                    title: "Error!",
                    text: "Funcionário não retornado com sucesso",
                    icon: "error",
                    confirmButtonColor: "var(--primary-color)",
                    confirmButtonText: "Ok",
                });
            }
        });
    }
</script>