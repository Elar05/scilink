<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="<?= URL ?>public/img/logo.png">
  <title><?= APP ?> | Register</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
  <link rel="stylesheet" href="<?= URL ?>public/css/auth.css" />
</head>

<body>
  <div class="login-container">
    <form class="login-form" action="<?= URL ?>register/singup" method="post">
      <h1 class="login-title">Register</h1>
      <?= $this->showMessages() ?>

      <div class="form-input">
        <i class="fas fa-solid fa-user"></i>
        <label>Names</label>
      </div>
      <input type="text" name="names" />

      <div class="form-input">
        <i class="fas fa-solid fa-user"></i>
        <label>Phone</label>
      </div>
      <input type="tel" name="phone" />

      <div class="form-input">
        <i class="fas fa-solid fa-user"></i>
        <label>Email</label>
      </div>
      <input type="email" name="email" />

      <div class="form-input">
        <i class="fas fa-solid fa-lock"></i>
        <label>Password</label>
      </div>
      <input type="password" name="password" />

      <a href='login' class="link">Already have an account?</a>

      <button class="login-action" id="button">Create an account</button>
    </form>
  </div>

  <script type="module" src="<?= URL ?>public/js/auth.js"></script>
</body>

</html>