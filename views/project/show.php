<?php require_once 'views/layout/head.php'; ?>
<?php require_once 'views/layout/header.php'; ?>
<?php
$project = $this->d['project'];
$comments = $this->d['comments'];
?>
<div class="container mt-3">
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

            <button class="btn btn-success" id="<?= $this->d['textId'] ?>" data-project="<?= $project['id'] ?>">
              <?= $this->d['text'] ?>
            </button>
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
            <form class="mb-4" action="<?= URL ?>comment/add">
              <input type="hidden" name="project" value="<?= $project['id'] ?>">
              <textarea class="form-control" rows="3" placeholder="Leave a comment"></textarea>

              <div class="text-end">
                <button class="mt-2 btn btn-primary" id="addComment">Comment <i class="fas fa-plus"></i></button>
              </div>
            </form>
            <!-- Single comment-->
            <div id="content_comments">
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
        </div>
      </section>
    </div>
  </div>
</div>

<?php require_once 'views/layout/footer.php'; ?>

<script src="<?= URL ?>public/js/project.js" type="module"></script>

<?php require_once 'views/layout/foot.php'; ?>