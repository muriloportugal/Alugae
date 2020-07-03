<style>
	.form-holder{
		margin-top:20%;
		margin-bottom:20%;
		border-radius: 10px;
		box-shadow: 15px 20px 0px rgba(0, 0, 0, 0.1);
	}
</style>
<div class="container">
	<div class="row">

		<div class="col-md-4 offset-md-4">
			<div class="card form-holder">
				<div class="card-body">
					<h2>Esqueceu a senha?</h2>
					<form action="" method="post">
						<div class="form-group">
							<label class="text-uppercase">E-mail</label>
							<input type="email" name="email" class="form-control" placeholder="E-mail"/>
						</div>
						<div class="form-group">
							<a href="<?php echo base_url();?>" class="btn btn-link">
								<i class="fas fa-reply"></i> Voltar
							</a>
							<button type="submit" class="btn btn-primary float-right">
								<i class="fas fa-search"></i> Buscar
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
