<?php require_once 'views/layout/head.php'; ?>
<link rel="stylesheet" href="<?= URL ?>public/css/info1.css" />
<?php require_once 'views/layout/header.php'; ?>
<?php
$project = $this->d['project'];
$comments = $this->d['comments'];
?>
<div class="container mt-5">
  <div class="row">
    <div class="col-lg-8 mx-auto">
      <!-- Post content-->
      <article>
        <!-- Post header-->
        <header class="mb-4">
          <!-- Post title-->
          <h1 class="fw-bolder mb-1"><?= $project['name'] ?></h1>
          <!-- Post meta content-->
          <div class="text-muted fst-italic mb-2"><?= $project['created_at'] ?> by <?= $project['user'] ?></div>

          <div class="d-flex justify-content-between align-items-center">
            <!-- Post categories-->
            <span class="badge bg-secondary text-decoration-none link-light"><?= $project['category'] ?></span>

            <button class="btn btn-success">Aplicar <i class="fas fa-plus"></i></button>
          </div>
        </header>
        <!-- Preview image figure-->
        <figure class="mb-4"><img class="img-fluid rounded" src="<?= URL . $project['url'] ?>" alt="Project Image" /></figure>
        <!-- Post content-->
        <section class="mb-5">
          <p class="fs-5 mb-4">
            <?= $project['description'] ?>
          </p>

          <h2>Particpants</h2>

          <p class="fs-5 mb-4"><a href="">Link de su perfil</a></p>

          <p>Likes: <?= $project['likes'] ?></p>

          <p>Comments: <?= $project['comments'] ?></p>
        </section>
      </article>
      <!-- Comments section-->
      <section class="mb-5">
        <div class="card bg-light">
          <div class="card-body">
            <!-- Comment form-->
            <form class="mb-4"><textarea class="form-control" rows="3" placeholder="Leave a comment"></textarea></form>
            <!-- Single comment-->
            <?php
            if (count($comments) > 0) :
              foreach ($comments as $comment) : ?>
                <div class="d-flex">
                  <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                  <div class="ms-3">
                    <div class="fw-bold"><?= $comment['user'] ?></div>
                    <?= $comment['comment'] ?>
                  </div>
                </div>
              <?php
              endforeach;
            else : ?>
              <div class="">No comments</div>
            <?php endif; ?>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>
<!-- Footer-->
<footer class="py-5 bg-dark">
  <div class="container">
    <p class="m-0 text-center text-white">Copyright &copy; SciLink 2023</p>
  </div>
</footer>


<?php require_once 'views/layout/foot.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

<?php require_once 'views/layout/footer.php'; ?>