<?php require_once 'views/layout/head.php'; ?>

<?php require_once 'views/layout/header.php'; ?>

<div class="container">
  <div class="d-flex justify-content-between align-content-center align-items-center">
    <h1 class="my-4">My Projects</h1>
    <div><a href="<?= URL ?>project/create" class="btn btn-success">Add New <i class="fas fa-plus"></i></a></div>
  </div>

  <div class="row row-cols-1 row-cols-md-3 g-4">
    <?php foreach ($this->d['projects'] as $project) : ?>
      <div class="col">
        <div class="card">
          <img src="<?= URL . $project['url'] ?>" alt="Project Image" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title"><?= $project['name'] ?></h5>
            <p class="card-text">Likes: <?= $project['likes'] ?> - Comments: <?= $project['comments'] ?></p>
            <p class="card-text"><span class="badge bg-secondary text-decoration-none link-light"><?= $project['category'] ?></span></p>
            <a class="btn btn-info" href="<?= URL . 'project/show/' . $project['slug'] ?>">Details <i class="fas fa-share"></i></a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<?php require_once 'views/layout/footer.php'; ?>
<?php require_once 'views/layout/foot.php'; ?>