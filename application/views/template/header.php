<div class="menu">
    <nav class="navbar navbar-expand navbar-light" style="height: 80px; background-color: #FFFFFF">
        <a class="logo" href="<?php echo base_url(); ?>" style="text-decoration: none">Alugaê!</a>

        <?php if ($this->session->userdata('id')) { ?>

            <div style="padding-left: 160px">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>" class="btn btn-link-secondary">
                                <i class="fas fa-search text-grey fa-lg"></i> Procurar
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() . 'app/rent'; ?>" class="btn btn-link-secondary">
                                <i class="fas fa-book fa-lg"></i> Solicitações
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() . 'app/kitchen'; ?>" class="btn btn-link-secondary">
                                <i class="fas fa-store fa-lg"></i> Empreendimentos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() . 'app/approve'; ?>" class="btn btn-link-secondary">
                                <i class="far fa-check-square fa-lg"></i> Aprovações
                            </a>
                        </li>
                        <li class="nav-item d-none">
                            <a href="<?php echo base_url() . 'app/users'; ?>" class="btn btn-link-secondary">
                                <i class="fas fa-users fa-lg"></i> Usuários
                            </a>
                        </li>
                        <li class="nav-item d-none">
                            <a href="<?php echo base_url() . 'app/banco'; ?>" class="btn btn-link-secondary">
                                <i class="fas fa-database fa-lg"></i> Banco de Dados
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <ul class="nav navbar-nav ml-auto">
                <a href="<?php echo base_url() . 'home/about'; ?>" class="btn btn-link-secondary">
                    <i class="fas fa-people-carry fa-lg"></i> Sobre
                </a>
                <li>
                    <a href="<?php echo base_url() . 'app/logout'; ?>" class="btn btn-link-secondary">
                        <i class="fas fa-reply fa-lg"></i> Sair
                    </a>
                </li>
            </ul>

        <?php } else { ?>
            <ul class="nav navbar-nav ml-auto">
                <li>
                    <a href="<?php echo base_url() . 'home/about'; ?>" class="btn btn-link-secondary">
                        <i class="fas fa-people-carry fa-lg"></i> Sobre
                    </a>
                    <a href="<?php echo base_url() . 'home/login'; ?>" class="btn btn-link-secondary">
                        <i class="fas fa-sign-in-alt fa-lg"></i> Login
                    </a>
                </li>
            </ul>
        <?php } ?>
    </nav>
</div>