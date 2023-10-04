<?php require_once 'views/layout/head.php'; ?>

<?php require_once 'views/layout/header.php'; ?>

<div>
  <a href="<?= URL ?>project">Projects</a>

  <h1><?= $this->d['project']['name'] ?></h1>

  <p><?= $this->d['project']['description'] ?></p>

  <div>
    <img src="<?= URL . $this->d['project']['url'] ?>" alt="Imagen de projecto">
  </div>

  <p>Likes: </p>

  <p>Comments: </p>
</div>

<?php require_once 'views/layout/foot.php'; ?>

<?php require_once 'views/layout/footer.php'; ?>