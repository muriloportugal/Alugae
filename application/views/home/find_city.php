<div style="padding: 20px;">
    <h2><?php echo $localidade . '-' . $uf; ?></h2>
</div>

<div class="row">
    <?php
    if ($fetch_data->num_rows() > 0) {
        foreach ($fetch_data->result() as $row) {
            if ($row->alugado == 0) { ?>
                <div class="col-md-2" style="padding-bottom: 20px">
                    <div class="card">
                        <a href="<?php echo base_url() . 'home/kitchen/' . $row->id; ?>" style="text-decoration:none;">
                            <img class="card-img-top" height="160px" src="<?php echo $row->foto; ?>">
                        </a>
                        <div class="card-body text-center">
                            <a href="<?php echo base_url() . 'home/kitchen/' . $row->id; ?>" style="text-decoration: none;">
                                <?php echo $row->nome_fantasia; ?>
                            </a>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
    }
    ?>
</div>