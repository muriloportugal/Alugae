<div style="padding: 20px;">
    <h2>Aprovações</h2>
</div>

<div class="table-responsive">
    <table class="table small">
        <thead>
        <tr>
            <th class="text-nowrap"></th>
            <th class="text-nowrap">Status</th>
            <th class="text-nowrap">Dt Solicitação</th>
            <th class="text-nowrap">Solicitante</th>
            <th class="text-nowrap">Empreendimento</th>
            <th class="text-nowrap">Cidade</th>
            <th class="text-nowrap">UF</th>
            <th class="text-nowrap">Endereço</th>
            <th class="text-nowrap">Número</th>
            <th class="text-nowrap">Foto</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if ($fetch_data->num_rows() > 0) {
            foreach ($fetch_data->result() as $row) {
                ?>
                <tr>
                    <td class="align-middle">
                        <?php if ($row->aprovado == 0) { ?>
                            <button class="btn btn-warning" type="button" data-toggle="modal"
                                    data-target="#exampleModal"
                                    onclick="upd(<?php echo $row->request_id; ?>, <?php echo $row->id; ?>, this)">
                                <i class="fas fa-cog"></i>
                            </button>
                        <?php } ?>
                    </td>
                    <td class="align-middle"><?php echo $row->aprovado == 0 ? 'Aguardando' : ($row->aprovado == 1 ? 'Aprovado' : 'Reprovado'); ?></td>
                    <td class="align-middle"><?php echo date('d/m/Y H:i:s', strtotime($row->request)); ?></td>
                    <td class="align-middle"><?php echo $row->locatario; ?></td>
                    <td class="align-middle"><?php echo $row->nome_fantasia; ?></td>
                    <td class="align-middle"><?php echo $row->cidade; ?></td>
                    <td class="align-middle"><?php echo $row->uf; ?></td>
                    <td class="align-middle"><?php echo $row->endereco; ?></td>
                    <td class="align-middle"><?php echo $row->numero; ?></td>
                    <td class="align-middle">
                        <img class="img-fluid" style="max-height: 80px" src="<?php echo $row->foto; ?>">
                    </td>
                </tr>
                <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="4" class="text-center">Nenhum registro encontrato</td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <script>
        function upd(id, empreendimento, row) {
            var column = row.parentNode.parentNode.children;
            var data = column[2].firstChild.nodeValue;
            var responsavel = column[3].firstChild.nodeValue;
            var nome = column[4].firstChild.nodeValue;
            var cidade = column[5].firstChild.nodeValue;
            var uf = column[6].firstChild.nodeValue;
            var enderecoendereco = column[7].firstChild.nodeValue;
            var numero = column[8].firstChild.nodeValue;
            var img = column[9].childNodes[1].src;

            $('#responsavel').val(responsavel);
            $('#emprendiamento').val(nome);
            $('#cidade').val(cidade);
            $('#uf').val(uf);
            $('#enderecoendereco').val(enderecoendereco);
            $('#numero').val(numero);

            $('#img').attr("src", img);

            $('#idConfirm').val(id);
            $('#idDeny').val(id);
            $('#empreendimentoConfirm').val(empreendimento);
            $('#empreendimentoDeny').val(empreendimento);
        }
    </script>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alterar Solicitação</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-8">
                        <div class="form-group">
                            <label class="text-uppercase">Solicitante</label>
                            <input type="text" class="form-control" placeholder="Nome" id="responsavel">
                        </div>
                        <div class="form-group">
                            <label class="text-uppercase">Emprendiamento</label>
                            <input type="text" class="form-control" placeholder="Nome" id="emprendiamento">
                        </div>
                    </div>
                    <div class="form-group col-4">
                        <div class="text-center align-middle">
                            <img id="img" class="img-fluid" style="max-height: 150px">
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <label class="text-uppercase">Logradouro</label>
                    <input type="text" class="form-control" placeholder="Logradouro" id="logradouro">
                </div>
                <div class="row">
                    <div class="form-group col-md-2">
                        <label class="text-uppercase">Número</label>
                        <input type="text" class="form-control" placeholder="Número" id="numero">
                    </div>
                    <div class="form-group col-md-8">
                        <label class="text-uppercase">Cidade</label>
                        <input type="text" class="form-control" placeholder="Cidade" id="cidade">
                    </div>
                    <div class="form-group col-md-2">
                        <label class="text-uppercase">UF</label>
                        <input type="text" class="form-control" placeholder="UF" id="uf">
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <form class="form" method="post" action="<?php echo base_url() . 'app/approve_upd'; ?>">
                    <input type="hidden" name="op" value="1">
                    <input type="hidden" name="id" id="idConfirm">
                    <input type="hidden" name="empreendimento" id="empreendimentoConfirm">
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-check"></i> Aprovar
                    </button>
                </form>
                <form class="form" method="post" action="<?php echo base_url() . 'app/approve_upd'; ?>">
                    <input type="hidden" name="op" value="2">
                    <input type="hidden" name="id" id="idDeny">
                    <input type="hidden" name="empreendimento" id="empreendimentoDeny">
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-ban"></i> Negar
                    </button>
                </form>
                <button type="button" class="btn btn-success" data-dismiss="modal">
                    <i class="fas fa-times"></i> Fechar
                </button>
            </div>
        </div>
    </div>
</div>

