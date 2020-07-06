<div class="container-fluid">
    <div class="row">
        <div class="col-6" style="padding-top: 20px">
            <h4>Encontre hoje mesmo um local ideal para seu empreendimento.</h4>


            <div class="input-group md-form form-sm form-2 pl-0">
                <input class="form-control my-0 py-1 red-border cep" type="text" placeholder="CEP"
                       aria-label="Search" name="cep" id="cep">
                <div class="input-group-append">
                    <button type="button" class="btn btn-primary">
                        <i class="fas fa-search text-grey"></i> Buscar
                    </button>
                </div>
            </div>
            <div class="d-none">
                <form id="FindCity" method="post" action="<?php echo base_url() . 'home/find_city'; ?>">
                    <input type="hidden" class="localidade" name="localidade">
                    <input type="hidden"  class="uf" name="uf">
                </form>
            </div>

            <div class="alert alert-primary" role="alert" style="margin-top: 40px">
                “Todo sucesso é fruto de um grande trabalho em equipe!!”
            </div>
        </div>
        <div class="col-6">
            <img class="img-fluid"
                 src="https://static.vecteezy.com/system/resources/previews/000/223/251/non_2x/vector-people-talking-illustration.jpg">
        </div>
    </div>
</div>

<script language="javascript">
    window.onload = function (e) {
        $('.cep').inputmask("99.999-999", {"placeholder": "_"});

        $('#cep').keypress(function(event){
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if(keycode == '13'){
                $('#cep').blur();
            }
        });
    }
</script>

