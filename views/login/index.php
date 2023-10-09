<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="<?= URL ?>public/img/logo.png">
	<title><?= APP ?> | Login</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />

	<link rel="stylesheet" href="<?= URL ?>public/css/styles.css?v=1.0" />
	<link rel="stylesheet" href="<?= URL ?>public/css/auth.css?v=1.0" />
</head>

<body>
	<div class="menu-bar">
		<a href="<?= URL ?>" class="text-decoration-none">
			<h1 class="logo p-0 m-0"> Sci<span>Link.</span></h1>
		</a>

		<ul class="p-0 m-0">
			<li class="ps-4"><a href="#">User <i class="fas fa-caret-down"></i></a>
				<div class="dropdown-menu">
					<ul>
						<li><a href="<?= URL ?>register">Register</a></li>
						<li><a href="<?= URL ?>login">Login</a></li>
					</ul>
				</div>
			</li>
		</ul>
	</div>

	<div class="login-container">
		<form class="login-form" action="<?= URL ?>login/auth" method="post">
			<h1 class="login-title">Login</h1>
			<?= $this->showMessages() ?>

			<div class="form-input">
				<i class="fas fa-user"></i>
				<label>Email</label>
			</div>
			<input type="email" name="email" />

			<div class="form-input">
				<i class="fas fa-lock"></i>
				<label>Password</label>
			</div>
			<input type="password" name="password" />

			<a href='reset' class="link">Forgot your password?</a>

			<a href='register' class="link">New user?</a>

			<button class="login-action" id="button">Login</button>
		</form>

		<div class="vlarge"></div>

		<div class="buttons-container">
			<button class="large-button" id="google">
				<img src="<?= URL ?>public/img/Google.svg" alt="" /> Ingresar con Google
			</button>
		</div>
	</div>

	<script type="module" src="<?= URL ?>public/js/auth.js?v=1.0"></script>
</body>

</html>