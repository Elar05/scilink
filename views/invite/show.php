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
        <header class="my-5">
          <!-- Post title-->
          <h1 class="fw-bolder mb-1"><?= $project['name'] ?></h1>
          <!-- Post meta content-->
          <div class="text-muted fst-italic mb-2"><?= $project['created_at'] ?> by <?= $project['user'] ?></div>

          <div class="d-flex justify-content-between align-items-center">
            <!-- Post categories-->
            <span class="badge bg-secondary text-decoration-none link-light text-uppercase fs-6"><?= $project['category'] ?></span>

            <a href="<?= URL ?>" class="btn btn-primary">
              Apply to Project <i class="fas fa-plus"></i>
            </a>
          </div>
        </header>
        <!-- Preview image figure-->
        <figure class="mb-4">
          <?php if ($project['url'] != "") : ?>
            <img src="<?= URL . $project['url'] ?>" alt="Project Image" class="card-img-top">
          <?php endif; ?>
        </figure>
        <!-- Post content-->
        <section class="">
          <p class="fs-5 mb-4">
            <?= $project['description'] ?>
          </p>

          <div class="integrantes-container">
            <div class="integrante-card">
              <?php
              $url_user = "public/img/profile_user.jpg";
              if ($project['url_user'] != "") {
                $url_user = $project['url_user'];
              }
              ?>
              <img class="integrante-img" src="<?= URL . $url_user ?>" alt="Owner">
              <div class="integrante-info">
                <p class="integrante-nombres"><?= $project['user'] ?></p>
                <!-- <p>@isisverasolsol</p> -->
                <p class="integrante-pais"><a href="<?= URL ?>profile/in/<?= $project['slug_user'] ?>">Profile</a></p>
              </div>
            </div>
          </div>

          <h2>Particpants</h2>
          <ul>
            <li class='fs-4'>
              <a href='' class='text-decoration-none'><?= $project['user'] ?> (Owner)</a>
            </li>
            </li>
            <?php
            foreach ($this->d['participants'] as $participant) {
              echo "<li class='fs-4'><a href='' class='text-decoration-none'>$participant[user]</a></li>";
            }
            ?>
          </ul>

          <p class="fs-5">
            <button class="btn button-project"><i class="fas fa-thumbs-up m-0 p-0"></i></button>
            Likes: <span><?= $project['likes'] ?></span>
          </p>

          <p class="fs-5">
            <button class="btn button-project"><i class="fas fa-comment-dots m-0 p-0"></i></button>
            Comments: <span> <?= $project['comments'] ?></span>
          </p>
        </section>
      </article>
      <!-- Comments section-->
      <section class="mb-5">
        <div class="card bg-light">
          <div class="card-body">
            <!-- Comment form-->
            <textarea class="form-control" name="comment" rows="3" placeholder="Leave a comment"></textarea>

            <div class="text-end">
              <a href="<?= URL ?>" class="mt-2 btn btn-primary">Comment <i class="fas fa-plus"></i></a>
            </div>
            <!-- Single comment-->
            <div id="content_comments">
              <?php
              if (count($comments) > 0) :
                foreach ($comments as $comment) : ?>
                  <div class="d-flex mb-3">
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