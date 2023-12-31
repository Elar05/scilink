<?php require_once 'views/layout/head.php'; ?>
<?php require_once 'views/layout/header.php'; ?>
<?php
$project = $this->d['project'];
$comments = $this->d['comments'];
?>

<div class="info-container">
  <ul class="nav nav-underline nav-fill">
    <li class="nav-item">
      <a class="nav-link" href="#" onclick="mostrarContenido('tab1')">Details Project</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#" onclick="mostrarContenido('tab2')">About Team</a>
    </li>
  </ul>
</div>

<div class="info-container">
  <div class="tab-content" id="tab1-content">
    <article>
      <!-- Post header-->
      <header class="my-2">
        <!-- Post title-->
        <h1 class="fw-bolder mb-1"><?= $project['name'] ?></h1>
        <!-- Post meta content-->
        <div class="text-muted fst-italic my-3"><?= $project['created_at'] ?> by <?= $project['user'] ?></div>

        <div class="d-flex justify-content-between align-items-center">
          <!-- Post categories-->
          <span class="badge bg-secondary text-decoration-none link-light text-uppercase fs-6"><?= $project['category'] ?></span>

          <?php if ($project['iduser'] != $this->user['id']) : ?>
            <button class="btn btn-<?= $this->d['class'] ?>" id="<?= $this->d['textId'] ?>" data-project="<?= $project['id'] ?>">
              <?= $this->d['text'] ?>
            </button>
          <?php endif; ?>
        </div>
      </header>
      <!-- Preview image figure-->
      <figure class="">
        <?php if ($project['url'] != "") : ?>
          <img src="<?= URL . $project['url'] ?>" alt="Project Image" class="card-img-top">
        <?php endif; ?>
      </figure>
      <!-- Post content-->
      <section>
        <!-- Description -->
        <p class="fs-5 mb-4">
          <?= $project['description'] ?>
        </p>

        <!-- Info -->
        <div class="row">
          <div class="col-md-8 col-12">
            <p class="fs-5"><span class="text-project">Project URL:</span> <a target="_blank" href="<?= $project['link'] ?>"><?= $project['link'] ?></a></p>

            <p class="fs-5"><span class="text-project">Geographic Scope:</span> <?= $project['geographic_scope'] ?></p>

            <p class="fs-5"><span class="text-project">Project Status:</span> Active - recruiting volunteers</p>

            <p class="fs-5"><span class="text-project">Start Date:</span> <?= $project['created_at'] ?></p>

            <p class="fs-5"><span class="text-project">Project Contact:</span> <?= $project['email'] ?></p>
          </div>
          <div class="col-md-4 col-12">
            <p class="fs-5"><span class="text-project">Federal Government Sponsor:</span> <?= $project['agency_sponsor'] ?></p>

            <p class="fs-5"><span class="text-project">Fields of Science:</span> <?= $project['fields_of_science'] ?></p>
          </div>
        </div>

        <!-- Author -->
        <div class="integrantes-container">
          <div class="integrante-card">
            <?php
            $url_user = "public/img/user_default.png";
            if ($project['url_user'] != "") {
              $url_user = $project['url_user'];
            }
            ?>
            <img class="integrante-img" src="<?= URL . $url_user ?>" alt="Owner">
            <div class="integrante-info">
              <p class="integrante-nombres"><?= $project['user'] ?></p>
              <p class="integrante-pais"><a href="<?= URL ?>profile/in/<?= $project['slug_user'] ?>">Profile</a></p>
            </div>
          </div>
        </div>

        <p class="fs-5">
          <button class="btn button-project" id="like" data-project="<?= $project['id'] ?>"><i class="fas fa-thumbs-up m-0 p-0"></i></button>
          Likes: <span id="likes"><?= $project['likes'] ?></span>
        </p>

        <p class="fs-5">
          <button class="btn button-project"><i class="fas fa-comment-dots m-0 p-0"></i></button>
          Comments: <span id="comments"> <?= $project['comments'] ?></span>
        </p>
      </section>
    </article>
  </div>

  <div class="tab-content" id="tab2-content" style="display: none;">
    <div class="integrantes-container">
      <div class="integrante-card">
        <?php
        $url_user = "public/img/user_default.png";
        if ($project['url_user'] != "") {
          $url_user = $project['url_user'];
        }
        ?>
        <img class="integrante-img" src="<?= URL . $url_user ?>" alt="Owner">
        <div class="integrante-info">
          <p class="integrante-nombres"><?= $project['user'] ?> (Owner)</p>
          <p class="integrante-pais"><a href="<?= URL ?>profile/in/<?= $project['slug_user'] ?>">Profile</a></p>
        </div>
      </div>

      <?php foreach ($this->d['participants'] as $participant) : ?>
        <?php
        $url_user = "public/img/user_default.png";
        if ($participant['url'] != "") {
          $url_user = $participant['url'];
        }
        ?>
        <img class="integrante-img" src="<?= URL . $url_user ?>" alt="Owner">
        <div class="integrante-info">
          <p class="integrante-nombres"><?= $participant['user'] ?></p>
          <p class="integrante-pais"><a href="<?= URL ?>profile/in/<?= $participant['slug'] ?>">Profile</a></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<div class="container mt-3">
  <div class="row">
    <div class="col-12 col-lg-10 mx-auto">
      <section class="mb-5">
        <div class="card bg-light">
          <div class="card-body">
            <!-- Comment form-->
            <form class="mb-4" id="form_comment" action="<?= URL ?>comment/add" method="post">
              <input type="hidden" name="project" value="<?= $project['id'] ?>">
              <textarea class="form-control" name="comment" rows="3" placeholder="Leave a comment"></textarea>

              <div class="text-end">
                <button type="submit" class="mt-2 btn btn-primary">Comment <i class="fas fa-plus"></i></button>
              </div>
            </form>
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

<script src="<?= URL ?>public/js/project.js?v=1.0" type="module"></script>

<script>
  function mostrarContenido(tabId) {
    var tabContents = document.querySelectorAll(".tab-content");
    tabContents.forEach(function(content) {
      content.style.display = "none";
      content.classList.remove("active");
    });

    var tabLinks = document.querySelectorAll(".nav-link");
    tabLinks.forEach(function(link) {
      link.classList.remove("active");
    });

    var selectedTabContent = document.getElementById(tabId + "-content");
    if (selectedTabContent) {
      selectedTabContent.style.display = "block";
      selectedTabContent.classList.add("active");

      var selectedTabLink = document.querySelector('a[href="#' + tabId + '"]');
      if (selectedTabLink) {
        selectedTabLink.classList.add("active");
      }
    }
  }
</script>
<?php require_once 'views/layout/foot.php'; ?>