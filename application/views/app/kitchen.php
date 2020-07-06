<div style="margin: 30px">
    <button type="button" class="btn btn-outline-danger" type="button" data-toggle="modal"
            data-target="#mdlADD">
        <i class="fas fa-plus fa-lg"></i> Adicionar
    </button>
</div>

<!-- Modal -->
<div class="modal fade" id="mdlADD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dados do seu Empreendimento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url() . 'app/kitchen_upd'; ?>">
                <div class="modal-body" style="max-height:calc(100vh - 200px); overflow-y: auto;">
                    <div class="row">
                        <input type="hidden" name="op" value="1">
                        <div class="form-group col-md-8">
                            <label class="text-uppercase">Empreendimento</label>
                            <input type="text" class="form-control" placeholder="Nome" name="nome">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="text-uppercase">CEP</label>
                            <input type="text" class="form-control cep" placeholder="CEP" name="cep">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-uppercase">Logradouro</label>
                        <input type="text" class="form-control logradouro" placeholder="Logradouro" name="logradouro">
                    </div>
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label class="text-uppercase">Número</label>
                            <input type="text" class="form-control" placeholder="Número" name="numero">
                        </div>
                        <div class="form-group col-md-8">
                            <label class="text-uppercase">Cidade</label>
                            <input type="text" class="form-control localidade" placeholder="Cidade" name="cidade">
                        </div>
                        <div class="form-group col-md-2">
                            <label class="text-uppercase">UF</label>
                            <input type="text" class="form-control uf" placeholder="UF" name="uf">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="text-uppercase">Telefone</label>
                            <input type="text" class="form-control" placeholder="Telefone" name="telefone">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="text-uppercase">CNPJ/CPF</label>
                            <input type="text" class="form-control" placeholder="CNPJ/CPF" name="cnpj">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="text-uppercase">Foto</label>
                            <input type="text" class="form-control" placeholder="Foto" name="foto">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="text-uppercase">Desctição</label>
                        <textarea class="form-control" name="descricao" cols="50" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="text-uppercase">Inventário</label>
                        <textarea class="form-control" name="inventario" cols="50" rows="5"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="">
                        <button type="submit" class="btn btn-danger">Savar</button>
                        <button type="button" class="btn btn-success" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if ($fetch_data->num_rows() > 0) {
    foreach ($fetch_data->result() as $row) { ?>
        <div class="row">

            <div class="col-md-6">
                <img class="img-fluid" height="160px" src="<?php echo $row->foto; ?>">
            </div>

            <div class="col-md-6" style="padding-top: 10px">
                <div class="text-center">
                    <h2 class="info"><?php echo $row->nome_fantasia; ?></h2>
                </div>
                <h5 class=" info">Descrição:</h5>
                <div class="alert alert-info" role="alert">
                    <?php echo $row->descricao_breve; ?>
                </div>

                <h5 class=" info">Inventário:</h5>
                <div class="alert alert-info" role="alert">
                    <?php echo $row->inventario; ?>
                </div>
                <div class="d-none">
                    <span><?php echo $row->cep; ?></span>
                    <span><?php echo $row->cidade; ?></span>
                    <span><?php echo $row->uf; ?></span>
                    <span><?php echo $row->endereco; ?></span>
                    <span><?php echo $row->numero; ?></span>
                    <span><?php echo $row->telefone_comercial; ?></span>
                    <span><?php echo $row->CNPJ_CPF; ?></span>
                    <span><?php echo $row->alugado; ?></span>
                </div>
                <?php if ($row->alugado == 1) { ?>
                    <div class="alert alert-danger text-center" role="alert">
                        Empreendimento já Alugado
                    </div>
                    <?php
                } ?>
                <div class="container-fluid" style="padding-top: 30px">
                    <div class="float-left d-none">
                        <button type="button" class="btn btn-outline-danger" type="button" data-toggle="modal"
                                data-target="#exampleModal">
                            <i class="fas fa-warehouse fa-2x"></i> Ver inventário
                        </button>
                    </div>
                    <div class="float-right d-none">
                        <a href="https://api.whatsapp.com/send?phone=<?php echo $row->telefone_comercial; ?>"
                           class="btn btn-outline-danger" target="_blank">
                            <i class="fas fa-sms fa-2x"></i> Enviar Menssagem
                        </a>
                    </div>
                    <div class="float-right">
                        <div class="d-flex justify-content-center">
                            <button type="button" class="btn btn-outline-danger" type="button" type="button"
                                    data-toggle="modal" data-target="#mdlUPD"
                                    onclick="upd(<?php echo $row->id; ?>, this) ">
                                <i class="fas fa-cog fa-lg"></i> Editar
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <hr style="margin: 20px 0">
        <?php
    }
    ?>

    <!-- Modal -->
    <div class="modal fade" id="mdlUPD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Atualizar Empreendimento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?php echo base_url() . 'app/kitchen_upd'; ?>">
                    <div class="modal-body" style="max-height:calc(100vh - 200px); overflow-y: auto;">
                        <div class="row">
                            <input type="hidden" name="op" value="2">
                            <input type="hidden" name="id" id="idUPD">
                            <div class="form-group col-md-8">
                                <label class="text-uppercase">Empreendimento</label>
                                <input type="text" class="form-control" placeholder="Nome" name="nome" id="nomeUPD">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="text-uppercase">CEP</label>
                                <input type="text" class="form-control cep" placeholder="CEP" name="cep" id="cepUPD">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="text-uppercase">Logradouro</label>
                            <input type="text" class="form-control logradouro" placeholder="Logradouro" name="logradouro"
                                   id="logradouroUPD">
                        </div>
                        <div class="row">
                            <div class="form-group col-md-2">
                                <label class="text-uppercase">Número</label>
                                <input type="text" class="form-control" placeholder="Número" name="numero" id="numeroUPD">
                            </div>
                            <div class="form-group col-md-8">
                                <label class="text-uppercase">Cidade</label>
                                <input type="text" class="form-control localidade" placeholder="Cidade" name="cidade"
                                       id="localidadeUPD">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="text-uppercase">UF</label>
                                <input type="text" class="form-control uf" placeholder="UF" name="uf" id="ufUPD">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="text-uppercase">Telefone</label>
                                <input type="text" class="form-control" placeholder="Telefone" name="telefone" id="telefoneUDP">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="text-uppercase">CNPJ/CPF</label>
                                <input type="text" class="form-control" placeholder="CNPJ/CPF" name="cnpj" id="cnpjUDP">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="text-uppercase">Foto</label>
                                <input type="text" class="form-control" placeholder="Foto" name="foto" id="fotoUPD">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-uppercase">Desctição</label>
                            <textarea class="form-control" name="descricao" cols="50" rows="5" id="descricaoUPD"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-uppercase">Inventário</label>
                            <textarea class="form-control" name="inventario" cols="50" rows="5" id="inventarioUPD"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="text-uppercase">Status</label>
                            <input type="checkbox" checked data-toggle="toggle" data-on="Disponível"
                                   data-off="Alugado" data-onstyle="success" data-offstyle="danger"
                                   data-width="100" data-size="sm" name="status" id="statusUPD">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="">
                            <button type="submit" class="btn btn-danger">Savar</button>
                            <button type="button" class="btn btn-success" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
}
?>

<script language="javascript">
    window.onload = function (e) {
        $('.cep').inputmask("99.999-999", {"placeholder": "_"});
    }

    function upd(id, row) {
        var column = row.parentNode.parentNode.parentNode.parentNode.parentNode.children;
        var foto = column[0].childNodes[1].currentSrc;
        var nome = column[1].childNodes[1].outerText;
        var decricao = column[1].childNodes[5].outerText;
        var inventario = column[1].childNodes[9].outerText;
        var cep = column[1].childNodes[11].childNodes[1].outerText;
        var localidade = column[1].childNodes[11].childNodes[3].outerText;
        var uf = column[1].childNodes[11].childNodes[5].outerText;
        var logradouro = column[1].childNodes[11].childNodes[7].outerText;
        var num = column[1].childNodes[11].childNodes[9].outerText;
        var tel = column[1].childNodes[11].childNodes[11].outerText;
        var cnpj = column[1].childNodes[11].childNodes[13].outerText;
        var alugado = column[1].childNodes[11].childNodes[15].outerText;

        console.log(alugado);

        $('#idUPD').val(id);
        $('#fotoUPD').val(foto);
        $('#nomeUPD').val(nome);
        $('#descricaoUPD').val(decricao);
        $('#inventarioUPD').val(inventario);
        $('#cepUPD').val(cep);
        $('#logradouroUPD').val(logradouro);
        $('#localidadeUPD').val(localidade);
        $('#ufUPD').val(uf);
        $('#numeroUPD').val(num);
        $('#telefoneUDP').val(tel);
        $('#cnpjUDP').val(cnpj);
        $('#statusUPD').bootstrapToggle(alugado == '1' ? 'off' : 'on');
    }
</script>
