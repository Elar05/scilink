<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= APP ?></title>

	<link rel="icon" href="<?= URL ?>public/img/logo.png">

	<link rel="stylesheet" type="text/css" href="<?= URL ?>public/auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?= URL ?>public/auth/fonts/iconic/css/material-design-iconic-font.min.css">

	<link rel="stylesheet" href="<?= URL ?>public/auth/css/util.css">
	<link rel="stylesheet" href="<?= URL ?>public/auth/css/main.css">
</head>

<body>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('<?= URL ?>public/auth/images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-50 p-b-50">
				<form class="login100-form validate-form" action="<?= URL ?>login/auth" method="post">
					<span class="login100-form-title m-b-15">
						Login
					</span>

					<div class="p-t-10 p-b-10">
						<?= $this->showMessages() ?>
					</div>

					<div class="wrap-input100 validate-input m-b-23" data-validate="Email is reauired">
						<span class="label-input100">Email</span>
						<input class="input100" type="email" name="email" placeholder="Type your Email">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Type your password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>

					<div class="text-right m-t-10">
						<a href="#">
							Forgot password?
						</a>
					</div>

					<div class="container-login100-form-btn m-t-20">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Login
							</button>
						</div>
					</div>
				</form>

				<form action="<?= URL ?>login/authSocialNetwork" id="form_social" method="post">
					<div class="txt1 text-center m-t-30">
						<span>
							Or Sign Up Using
						</span>
					</div>

					<div class="flex-c-m m-t-10">
						<a href="#" id="google" class="login100-social-item bg3 text-decoration-none">
							<i class="fa fa-google"></i>
						</a>
					</div>

					<div class="flex-col-c m-t-30">
						<a href="<?= URL ?>register" class="txt2">
							Sign Up
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script type="module" src="<?= URL ?>public/js/auth.js"></script>
</body>

</html>