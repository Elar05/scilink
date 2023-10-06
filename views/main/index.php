<?php require_once 'views/layout/head.php'; ?>
<link rel="stylesheet" href="<?= URL ?>public/css/style2.css" />
<?php require_once 'views/layout/header.php'; ?>

<div class="flex">
  <div class="contenedor">
    <ul class="flex-contenedor">
      <?php foreach ($this->d['categories'] as $category) : ?>
        <li><a href="#"><?= $category['name'] ?></a></li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>

<div class="container">
  <?php foreach ($this->d['lastProjects'] as $project) : ?>
    <div class="flexbox-item">
      <img src="<?= URL . $project['url'] ?>" alt="Project Image">
      <p><?= $project['name'] ?></p>
      <p>Likes: <?= $project['likes'] ?> - Comments: <?= $project['comments'] ?></p>
      <a href="<?= URL . 'project/show/' . $project['slug'] ?>">Details</a>
    </div>
  <?php endforeach; ?>
</div>

<?php require_once 'views/layout/foot.php'; ?>

<?php require_once 'views/layout/footer.php'; ?>