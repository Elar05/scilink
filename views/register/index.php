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
      <div class="wrap-login100 p-l-55 p-r-55 p-t-40 p-b-40">
        <form class="login100-form validate-form" action="<?= URL ?>register/singup" method="post">
          <span class="login100-form-title m-b-15">
            Register
          </span>

          <?= $this->showMessages() ?>

          <div class="wrap-input100 validate-input m-b-10" data-validate="Names is reauired">
            <span class="label-input100">Names</span>
            <input class="input100" type="text" name="names" placeholder="Type your Names">
            <span class="focus-input100" data-symbol="&#xf206;"></span>
          </div>

          <div class="wrap-input100 validate-input m-b-10" data-validate="Phone is required">
            <span class="label-input100">Phone</span>
            <input class="input100" type="tel" name="phone" placeholder="Type your phone">
            <span class="focus-input100" data-symbol="&#xf190;"></span>
          </div>

          <div class="wrap-input100 validate-input m-b-10" data-validate="Email is reauired">
            <span class="label-input100">Email</span>
            <input class="input100" type="email" name="email" placeholder="Type your Email">
            <span class="focus-input100" data-symbol="&#xf206;"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Password is required">
            <span class="label-input100">Password</span>
            <input class="input100" type="password" name="password" placeholder="Type your password">
            <span class="focus-input100" data-symbol="&#xf190;"></span>
          </div>

          <div class="container-login100-form-btn m-t-20">
            <div class="wrap-login100-form-btn">
              <div class="login100-form-bgbtn"></div>
              <button class="login100-form-btn">
                Register
              </button>
            </div>
          </div>
        </form>

        <form action="<?= URL ?>login/authSocialNetwork" id="form_social" method="post">
          <div class="txt1 text-center m-t-20">
            <span>
              Or Sign Up Using
            </span>
          </div>

          <div class="flex-c-m m-t-10">
            <a href="#" id="google" class="login100-social-item bg3 text-decoration-none">
              <i class="fa fa-google"></i>
            </a>
          </div>

          <div class="flex-col-c m-t-20">
            <a href="<?= URL ?>" class="txt2">
              Login
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script type="module" src="<?= URL ?>public/js/auth.js"></script>
</body>

</html>