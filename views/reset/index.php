<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="<?= URL ?>public/img/logo.png">
  <title><?= APP ?> | Recovery account</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
  <link rel="stylesheet" href="<?= URL ?>public/css/auth.css" />
</head>

<body>
  <div class="login-container">
    <form class="login-form" action="">
      <h1 class="login-title">Recover your password</h1>

      <div class="form-input">
        <i class="fas fa-solid fa-inbox"></i>
        <label>Email</label>
      </div>
      <input type="email" id="username" />

      <button class="login-action">Send verification code</button>

      <a href='register' class="link">New user?</a>
    </form>
  </div>
</body>

</html>