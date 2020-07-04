<div class="container">
	<div class="row">
		<div class="col-md-4 offset-md-4">
			<div class="card form-holder">
				<div class="card-body">
					<h2>Nova conta</h2>
					<form class="login-form" method="post" action="<?php echo base_url().'home/register'; ?>">
						<div class="form-group">
							<label class="text-uppercase">Nome</label>
							<input type="text" name="name" class="form-control" placeholder="Nome"/>
						</div>
						<div class="form-group">
							<label class="text-uppercase">E-mail</label>
							<input type="email" class="form-control" placeholder="E-mail" name="email" >
						</div>
						<div class="form-group">
							<label class="text-uppercase">Senha</label>
							<input type="password" class="form-control" placeholder="Senha" name="password">
						</div>
						<div class="form-group">
							<a href="<?php echo base_url();?>" class="btn btn-link">
								<i class="fas fa-reply"></i> Voltar
							</a>
							<button type="submit" class="btn btn-primary float-right">
								<i class="fas fa-user-plus"></i> Criar
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
