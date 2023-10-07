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
          <input type="text" class="form-control" id="name" placeholder="Search Project">
        </div>

        <div class="row row-cols-1 row-cols-md-2 g-4 mt-0" id="contentProjects">
          <?php foreach ($this->d['lastProjects'] as $project) : ?>
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
    </div>
  </div>
</div>

<?php require_once 'views/layout/footer.php'; ?>
<script src="<?= URL ?>public/js/main.js" type="module"></script>
<?php require_once 'views/layout/foot.php'; ?>