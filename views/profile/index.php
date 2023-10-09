<?php require_once 'views/layout/head.php'; ?>

<?php require_once 'views/layout/header.php'; ?>

<header class="py-1 bg-image-full" style="background-image: url('<?= URL ?>public/img/fondo_user.jpeg')">
  <div class="text-center my-5">
    <?php
    $url = $this->d['user']['picture'] ?? "public/img/profile_user.jpg";
    ?>
    <img class="img-fluid rounded-circle mb-4 integrante-img" src="<?= URL . $url ?>" alt="Profile user" />
    <h1 class="text-white fs-3 fw-bolder"><?= $this->d['user']['names'] ?></h1>
  </div>
</header>

<?php if (isset($_SESSION)) : ?>
  <section class="datos-personales">
    <form class="datos-usuario" action="<?= URL ?>profile/update" id="form_profile" method="post">
      <p style="font-size: 24px; text-align: center;">Tus datos personales</p>

      <div id="alertMessage"></div>

      <div class="form-input">
        <label>Names</label>
      </div>
      <input type="text" class="datos-input" name="name" value="<?= $this->d['user']['names'] ?>" />

      <div class="form-input">
        <label>Phone Number</label>
      </div>
      <input type="text" class="datos-input" name="phone" value="<?= $this->d['user']['phone'] ?>" />

      <div class="form-input">
        <label>Skills</label>
      </div>
      <div class="list-group">
        <?php foreach ($this->d['skills'] as $skill) : ?>
          <div class="list-group-item checkbox">
            <label>
              <input type="checkbox" name="skills[]" value="<?= $skill['name'] ?>"> <?= $skill['name'] ?>
            </label>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- <div class="form-input">
        <label>Correo electrónico</label>
      </div>
      <input type="text" name="email" placeholder="example@mail.com" />

      <div class="form-input">
        <label>Contraseña</label>
      </div>
      <input type="password" name="password" placeholder="j2!qsi!@a" /> -->

      <div class="form-input">
        <label>Descripción</label>
      </div>
      <textarea class="datos-input" name="description" id="description" cols="38" rows="5"><?= $this->d['user']['description'] ?></textarea>

      <div class="form-input">
        <label for="image">Image Profile</label>
      </div>
      <input type="file" class="form-control datos-input" name="image" id="image">

      <div class="d-grid">
        <button type="submit" class="btn button-project">Save changes</button>
      </div>
    </form>
  </section>
<?php else : ?>
  <div class="container mt-5">
    <h2 class="text-center fw-bold">Information</h2>

    <p class="text-center fs-4">Email: <?= $this->d['user']['email'] ?></p>
    <p class="text-center fs-4">Skills:</p>
    <div class="text-center my-3">
      <?php 
      $skills = json_decode($this->d['user']['skills']);
      foreach ($skills as $skill) : ?>
        <span class="badge bg-secondary text-decoration-none link-light text-uppercase"><?= $skill ?></span>
      <?php endforeach; ?>
    </div>
    <p class="text-center fs-4"><?= $this->d['user']['description'] ?></p>
  </div>
<?php endif; ?>

<div class="container mt-5">
  <h2 class="text-center fw-bold">Projects</h2>
  <div class="row g-4 mt-0" id="contentProjects">
    <?php foreach ($this->d['projects'] as $project) : ?>
      <div class="col-4">
        <div class="card">
          <?php if ($project['url'] != "") : ?>
            <img src="<?= URL . $project['url'] ?>" alt="Project Image" class="card-img-top">
          <?php endif; ?>

          <div class="card-body">
            <h5 class="card-title"><?= $project['name'] ?></h5>

            <div class="d-flex justify-content-between my-3">
              <span>Likes: <?= $project['likes'] ?></span>
              <span>Comments: <?= $project['comments'] ?></span>
              <span>Members: <?= $project['participants'] ?></span>
            </div>
            <p class="text-card">Category: <span class="badge bg-secondary text-decoration-none link-light text-uppercase"><?= $project['category'] ?></span></p>

            <div class="d-grid pt-2">
              <a class="btn button-project text-uppercase" href="<?= URL . 'project/show/' . $project['slug'] ?>">Details</a>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<?php require_once 'views/layout/footer.php'; ?>
<script src="<?= URL ?>public/js/profile.js?v=1.0"></script>
<?php require_once 'views/layout/foot.php'; ?>