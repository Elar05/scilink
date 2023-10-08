<?php require_once 'views/layout/head.php'; ?>

<?php require_once 'views/layout/header.php'; ?>

<div class="container">
  <h1></h1>
  <div class="row mt-4">
    <div class="col-md-3">
      <div class="list-group">
        <h4>Categories</h4>
        <div id="list_categories">
          <?php foreach ($this->d['categories'] as $category) : ?>
            <div class="list-group-item checkbox">
              <label>
                <input type="checkbox" class="categories" name="categories" value="<?= $category['name'] ?>"> <?= $category['name'] ?>
              </label>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <div class="col-md-9">
      <h4>Last Projects</h4>
      <div class="row" id="">
        <div class="search-bar mt-3 mt-3">

          <div class="row mb-3">
            <div class="col-md-10 col-12">
              <input type="text" class="form-control" id="name" placeholder="Search Project">
            </div>
            <div class="col-md-2 col-12">
              <button type="submit" class="btn btn-primary" id="search_projects">Search <i class="fas fa-search"></i></button>
            </div>
          </div>
        </div>

        <div id="alertMessage"></div>

        <div class="row row-cols-1 row-cols-md-2 g-4 mt-0" id="contentProjects">
          <?php foreach ($this->d['lastProjects'] as $project) : ?>
            <div class="col">
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
                    <a class="btn button-project text-uppercase" href='<?= URL ?>invite/show/<?= $project['slug'] ?>'>Details</a>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once 'views/layout/footer.php'; ?>
<script src="<?= URL ?>public/js/main.js" type="module"></script>
<?php require_once 'views/layout/foot.php'; ?>