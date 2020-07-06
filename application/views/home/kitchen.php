<?php
if ($fetch_data->num_rows() > 0) {
    foreach ($fetch_data->result() as $row) { ?>
        <div class="container-fluid" style="padding-bottom: 20px;">
            <form method="post" action="<?php echo base_url() . 'home/find_city'; ?>">
                <input type="hidden" name="localidade" value="<?php echo $row->cidade; ?>"">
                <input type="hidden" name="uf" value="<?php echo $row->uf; ?>"" >
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-reply"></i> Voltar na Busca
                </button>
            </form>
        </div>
        <div class="row">

            <div class="col-md-6">
                <img class="img-fluid" height="160px" src="<?php echo $row->foto; ?>">
            </div>

            <div class="col-md-6" style="padding-top: 10px">
                <div class="text-center">
                    <h2 class="info"><?php echo $row->nome_fantasia; ?></h2>
                    <?php if ($row->alugado == 1) { ?>
                        <div class="alert alert-danger" role="alert">
                            Empreendimento já Alugado
                        </div>
                        <?php
                    } ?>
                </div>
                <h5 class=" info">Descrição:</h5>
                <div class="alert alert-info" role="alert">
                    <?php echo $row->descricao_breve; ?>
                </div>

                <div class="container-fluid" style="padding-top: 30px">
                    <div class="float-left">
                        <button type="button" class="btn btn-outline-danger" type="button" data-toggle="modal"
                                data-target="#mdlInfo">
                            <i class="fas fa-warehouse fa-2x"></i> Ver inventário
                        </button>
                    </div>
                    <div class="float-right">
                        <a href="https://api.whatsapp.com/send?phone=<?php echo $row->telefone_comercial; ?>"
                           class="btn btn-outline-danger" target="_blank">
                            <i class="fas fa-sms fa-2x"></i> Enviar Menssagem
                        </a>
                    </div>
                    <div class="float-none">
                        <div class="d-flex justify-content-center">
                            <button type="button" class="btn btn-outline-danger" type="button" data-toggle="modal"
                                    data-target="#mdlRent">
                                <i class="fas fa-hand-holding-usd fa-2x"></i> Alugar
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="mdlInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Inverntário</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php echo $row->inventario; ?>
                        </div>
                        <div class="modal-footer">
                            <div class="d-none">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="mdlRent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Alugar</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php if ($row->alugado == 0) { ?>
                                Confirma o Aluquel do empreendimento: <?php echo $row->nome_fantasia; ?>

                            <?php } else { ?>
                                <div class="alert alert-danger text-center" role="alert">
                                    Empreendimento já Alugado
                                </div>
                                <?php
                            } ?>
                        </div>
                        <div class="modal-footer">
                            <?php if ($row->alugado == 0) { ?>
                                <form method="post" action="<?php echo base_url() . 'app/request/' . $row->id; ?>">
                                    <button type="submit" class="btn btn-danger">Confirmar</button>
                                    <button type="button" class="btn btn-success" data-dismiss="modal">Desistir</button>
                                </form>
                                <?php
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
?>
