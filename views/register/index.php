<?php require_once 'views/layout/head.php'; ?>

<link rel="stylesheet" href="<?= URL ?>public/css/log.css">

<?php require_once 'views/layout/header.php'; ?>

<div>
  <?= $this->showMessages() ?>

  <form action="<?= URL ?>register/singup" method="post">
    <h1 class="title">Register</h1>
    <label for="">
      <i class="fas fa-solid fa-user"></i>
      <input type="names" placeholder="Names" name="names" required>
    </label>
    <label>
      <i class="fas fa-solid fa-phone"></i>
      <input type="tel" placeholder="51980502603" name="phone" required>
    </label>
    <label>
      <i class="fas fa-solid fa-mail-bulk"></i>
      <input type="email" placeholder="Email" name="email" required>
    </label>
    <label>
      <i class="fas fa-solid fa-lock"></i>
      <input type="password" placeholder="Password" name="password" required>
    </label>

    <a href="<?= URL ?>" class="link">Login</a>

    <button type="submit" id="button">Register</button>
  </form>

  <form action="<?= URL ?>register/singupSocialNetwork" id="form_social" method="post">
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