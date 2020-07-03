<div style="padding: 20px;">
	<div class="container-fluid" style="background-color: #FFFFFF; border-radius: 10px; padding: 10px;">
		<h2>Usuários</h2>

		<div>
			<div class="table-responsive">
				<table class="table small">
					<thead>
					<tr>
						<th class="text-nowrap"></th>
						<th class="text-nowrap">Nome</th>
						<th class="text-nowrap">Dt Atualização</th>
					</tr>
					</thead>
					<tbody>
					<?php
					if ($fetch_data->num_rows() > 0) {
						foreach ($fetch_data->result() as $row) {
							?>
							<tr>
								<td>
									<button class="btn btn-xs btn-warning" type="button" data-toggle="modal"
											data-target="#exampleModal"
											onclick="upd(<?php echo $row->id; ?>,this)">
										<i class="fas fa-cog"></i>
									</button>
								</td>
								<td><?php echo $row->name; ?></td>
								<td><?php echo date('d/m/Y H:i:s', strtotime($row->dt_updated)); ?></td>
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
			</div>

			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
				 aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							...
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="button" class="btn btn-primary">Save changes</button>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>
</div>
