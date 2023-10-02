<?php require_once 'views/layout/head.php'; ?>

<link rel="stylesheet" href="<?= URL ?>public/css/style.css">

<?php require_once 'views/layout/header.php'; ?>

<div>
	<?= $this->showMessages() ?>

	<form action="<?= URL ?>login/auth" method="post">
		<div>
			<input type="email" placeholder="Correo" name="email" required>
		</div>
		<div>
			<input type="password" placeholder="Contraseña" name="password" required>
		</div>
		<div>
			<button type="submit">Iniciar Sesión</button>
		</div>
	</form>

	<form action="<?= URL ?>login/authSocialNetwork" id="form_social" method="post">
		<button id="google">Login con Google</button>
		<!-- <button id="facebook">Login con Facebook</button> -->
		<button id="github">Login con GitHub</button>
	</form>
</div>

<?php require_once 'views/layout/foot.php'; ?>

<script type="module" src="<?= URL ?>public/js/firebase.js"></script>

<?php require_once 'views/layout/footer.php'; ?>