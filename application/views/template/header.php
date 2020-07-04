<div class="menu">

    <nav class="navbar navbar-expand navbar-light" style="height: 80px">
        <a class="logo" href="<?php echo base_url(); ?>" style="text-decoration: none">Alugaê!</a>

        <?php if ($this->session->userdata('id')) { ?>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="<?php echo base_url() . 'app/users'; ?>" class="btn btn-link-secondary">
                            <i class="fas fa-users"></i> Usuários
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url() . 'app/banco'; ?>" class="btn btn-link-secondary">
                            <i class="fas fa-database"></i> Banco de Dados
                        </a>
                    </li>
                </ul>
            </div>

            <ul class="nav navbar-nav ml-auto">
                <li>
                    <a href="<?php echo base_url() . 'app/logout'; ?>" class="btn btn-link-secondary">
                        <i class="fas fa-reply"></i> Sair
                    </a>
                </li>
            </ul>
        <?php } else { ?>
            <ul class="nav navbar-nav ml-auto">
                <li>
                    <a href="<?php echo base_url() . 'home/login'; ?>" class="btn btn-link-secondary">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </a>
                </li>
            </ul>
        <?php } ?>
    </nav>
</div>
