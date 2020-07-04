<secton class="login-block">
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card form-holder">
                    <div class="card-body">
                        <h2 class="text-center">Conheça nosso projeto</h2>
                        <form class="login-form" method="post" action="<?php echo base_url() . 'home/login'; ?>">
                            <div class="form-group">
                                <label class="text-uppercase">E-mail</label>
                                <input type="email" class="form-control" placeholder="E-mail" name="email">
                            </div>
                            <div class="form-group">
                                <label class="text-uppercase">Senha</label>
                                <input type="password" class="form-control" placeholder="Senha" name="password">
                            </div>
                            <div class="form-group">
                                <a href="<?php echo base_url() . 'home/account'; ?>" class="btn btn-link">
                                    Criar uma conta
                                </a>
                                <button type="submit" class="btn btn-primary float-right">
                                    <i class="fas fa-sign-in-alt"></i> Entrar
                                </button>
                            </div>
                            <div class="form-group text-center">
                                MEGA HACK <i class="fa fa-heart"></i>
                                <a href="https://www.megahack.com.br/">3ª EDIÇÃO</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</secton>
