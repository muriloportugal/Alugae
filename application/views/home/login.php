<style>
	.login-block {
		padding: 50px 0;
	}

	.banner-sec {
		background-size: cover;
		min-height: 500px;
		border-radius: 0 10px 10px 0;
		padding: 0;
	}

	.container {
		background: #fff;
		border-radius: 10px;
		box-shadow: 15px 20px 0px rgba(0, 0, 0, 0.1);
	}

	.carousel-inner {
		border-radius: 0 10px 10px 0;
	}

	.carousel-item {
		max-height: 500px;
	}

	.carousel-caption {
		text-align: left;
		left: 5%;
	}

	.login-sec {
		padding: 50px 30px;
		position: relative;
	}

	.login-sec .copy-text {
		position: absolute;
		width: 80%;
		bottom: 20px;
		font-size: 13px;
		text-align: center;
	}

	.login-sec .copy-text i {
		color: #FEB58A;
	}

	.login-sec .copy-text a {
		color: #E36262;
	}

	.login-sec h2 {
		margin-bottom: 30px;
		font-weight: 800;
		font-size: 30px;
		color: #DE6262;
	}

	.login-sec h2:after {
		content: " ";
		width: 100px;
		height: 5px;
		background: #FEB58A;
		display: block;
		margin-top: 20px;
		border-radius: 3px;
		margin-left: auto;
		margin-right: auto
	}

	.btn-login {
		background: #DE6262;
		color: #fff;
		font-weight: 600;
	}

	.banner-text {
		width: 70%;
		position: absolute;
		bottom: 40px;
		padding-left: 20px;
	}

	.banner-text h2 {
		color: #fff;
		font-weight: 600;
	}

	.banner-text h2:after {
		content: " ";
		width: 100px;
		height: 5px;
		background: #FFF;
		display: block;
		margin-top: 20px;
		border-radius: 3px;
	}

	.banner-text p {
		color: #fff;
	}
</style>

<section class="login-block">
	<div class="container">
		<div class="row">
			<div class="col-md-4 login-sec">
				<h2 class="text-center">Conheça nosso projeto</h2>
				<form class="login-form" method="post" action="<?php echo base_url().'home/login'; ?>">
					<div class="form-group">
						<label for="exampleInputEmail1" class="text-uppercase">E-mail</label>
						<input type="email" class="form-control" placeholder="E-mail" name="email" >
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1" class="text-uppercase">Senha</label>
						<input type="password" class="form-control" placeholder="Senha" name="password">
					</div>

					<div class="form-group">
						<a href="<?php echo base_url().'home/forgot';?>" class="btn btn-link">
							Esqueci minha senha
						</a>
						<button type="submit" class="btn btn-login float-right">
							<i class="fas fa-sign-in-alt"></i> Entrar
						</button>
					</div>

					<div class="form-group text-center">
						<a href="<?php echo base_url().'home/account';?>" class="btn btn-link">
							Criar uma conta
						</a>
					</div>

				</form>
				<div class="copy-text">
					MEGA HACK <i class="fa fa-heart"></i>
					<a href="https://www.megahack.com.br/">3ª EDIÇÃO</a>
				</div>
			</div>
			<div class="col-md-8 banner-sec">
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner" role="listbox">
						<div class="carousel-item active">
							<img class="d-block img-fluid" src="https://static.pexels.com/photos/33972/pexels-photo.jpg" alt="First slide">
							<div class="carousel-caption d-none d-md-block">
								<div class="banner-text">
									<h2>This is First Slide</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
								</div>
							</div>
						</div>
						<div class="carousel-item">
							<img class="d-block img-fluid" src="https://images.pexels.com/photos/7097/people-coffee-tea-meeting.jpg" alt="Second slide">
							<div class="carousel-caption d-none d-md-block">
								<div class="banner-text">
									<h2>This is Second Slide</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
								</div>
							</div>
						</div>
						<div class="carousel-item">
							<img class="d-block img-fluid" src="https://images.pexels.com/photos/872957/pexels-photo-872957.jpeg" alt="Third slide">
							<div class="carousel-caption d-none d-md-block">
								<div class="banner-text">
									<h2>This is Heaven</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
</section>