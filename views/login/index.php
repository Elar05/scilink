<?php require_once 'views/layout/head.php'; ?>

<link rel="stylesheet" href="<?= URL ?>public/css/log.css">

<?php require_once 'views/layout/header.php'; ?>

<div>
	<?= $this->showMessages() ?>

	<form action="<?= URL ?>login/auth" method="post">
		<h1 class="title">Login</h1>
		<label>
			<i class="fas fa-solid fa-user"></i>
			<input type="email" placeholder="Correo" name="email" required>
		</label>
		<label>
			<i class="fas fa-solid fa-lock"></i>
			<input type="password" placeholder="Contraseña" name="password" required>
		</label>
		<a href="<?= URL ?>forgot.html" class="link">Forgot your password?</a>
		<a href="<?= URL ?>register" class="link">Register</a>

		<button type="submit" id="button">Login</button>
	</form>

	<form action="<?= URL ?>login/authSocialNetwork" id="form_social" method="post">
		<div>
			<button id="google">Login with Google</button>
			<!-- <button id="facebook">Login with Facebook</button> -->
			<button id="github">Login with GitHub</button>
		</div>
	</form>
</div>

<?php require_once 'views/layout/foot.php'; ?>

<script type="module" src="<?= URL ?>public/js/firebase.js"></script>

<?php require_once 'views/layout/footer.php'; ?>