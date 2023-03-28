<style>
    .filter-wrapper {
        width: 100% !important;
    }

    .pesquisar {
        margin-top: 20px;
        text-align: end;
    }
</style>

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
    <form action="/tickets" method="GET">
        <div class="filter-wrapper">
            <div class="line"></div>
            <div class="filter">
                <div class="filter-select">
                    <span class="label">Posto de Combustível</span>
                    <select name="postoCombustivelId" id="postoCombustivelId">
                        <option value="all">Todos</option>
                        <?php
                        foreach($postos as $p){ 
                            $selected2 = '';
                            if($postoCombustivelSelected == $p->id) $selected2 = 'selected'?>
                            <option <?= $selected2 ?> value="<?= $p->id ?>"><?= $p->nomeFantasia ?></option>
                        <?php } ?>
                    </select>
                    <i class="custom-arrow-down-type bx bxs-chevron-down"></i>
                    <i class="custom-arrow-up-type bx bxs-chevron-up"></i>
                </div>
            </div>
            <div class="line"></div>
            <div class="filter">
                <div class="filter-select">
                    <span class="label">Veículo</span>
                    <select name="veiculoId" id="veiculoId">
                        <option value="all">Todos</option>
                        <?php
                        foreach($veiculos as $v){ 
                            $selected1 = '';
                            if($veiculoSelected == $v->id) $selected1 = 'selected'?>
                            <option <?= $selected1 ?> value="<?= $v->id ?>"><?= $v->modelo ?>-<?= $v->placa ?></option>
                        <?php } ?>
                    </select>
                    <i class="custom-arrow-down-type bx bxs-chevron-down"></i>
                    <i class="custom-arrow-up-type bx bxs-chevron-up"></i>
                </div>
            </div>
            <div class="line"></div>
            <div class="filter">
                <div class="filter-select">
                    <span class="label">Status</span>
                    <select name="status" id="status">
                        <option value="all">Todos</option>
                        <option <?php if ($statusSelected == 'LIBERADO') echo 'selected'; ?> value="LIBERADO">Liberado</option>
                        <option <?php if ($statusSelected == 'BAIXADO') echo 'selected'; ?> value="BAIXADO">Baixado</option>
                        <option <?php if ($statusSelected == 'VENCIDO') echo 'selected'; ?> value="VENCIDO">Vencido</option>
                    </select>
                    <!-- <span class="label">Motorista</span>
                    <select name="motoristaId" id="motoristaId">
                        <option value="all">Todos</option>
                        <?php
                        foreach($motoristas as $m){ 
                            $selected3 = '';
                            if($motoristaSelected == $m->id) $selected3 = 'selected'?>
                            <option <?= $selected3 ?> value="<?= $m->id ?>"><?= $m->nome ?></option>
                        <?php } ?>
                    </select> -->
                    <i class="custom-arrow-down-type bx bxs-chevron-down"></i>
                    <i class="custom-arrow-up-type bx bxs-chevron-up"></i>
                </div>
            </div>
        </div>
        <div class="pesquisar">
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
                        <th>Posto</th>
                        <th>Combustível</th>
                        <th>Valor</th>
                        <th>Veículo</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    foreach ($tickets as $indice => $ticket) {
                    ?>
                        <tr>
                            <td><?= $ticket->nomePosto ?></td>
                            <td><?= strtoupper(str_replace('-', ' ',$ticket->tipoCombustivel)) ?></td>
                            <td><?= $ticket->valor ?></td>
                            <td><?= $ticket->veiculo . '' . $ticket->veiculoPlaca ?></td>
                            <td><?= $ticket->status ?></td>
                            <td>
                                <?= $ticket->actions ?>
                                <!-- <a href="/ticket_edit?id=<?= $ticket->id ?>"><i class="bx bxs-edit"></i></a>
                                <a onclick="alertDeleteticket(<?= $ticket->id ?>)"><i class="bx bxs-trash"></i></a>
                                <a href="/baixar_ticket?id=<?= $ticket->id ?>"><i class="bx bxs-show"></i></a>
                                <a href="/ticket_view?id=<?= $ticket->id ?>"><i class="bx bxs-show"></i></a> -->
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="footerButton">
        <a href="/gerar_ticket" id="sendBtn">Gerar Ticket</a>
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
                        url: '/deletar_tickets',
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
</script>