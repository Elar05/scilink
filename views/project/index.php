<?php require_once 'views/layout/head.php'; ?>

<?php require_once 'views/layout/header.php'; ?>

<div class="container">
  <div class="d-flex justify-content-between align-content-center align-items-center">
    <h1 class="my-4">My Projects</h1>
    <div>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_project">
        Add New <i class="fas fa-plus"></i>
      </button>
    </div>
  </div>

  <div class="row row-cols-1 row-cols-md-3 g-4">
    <?php foreach ($this->d['projects'] as $project) : ?>
      <div class="col">
        <div class="card">
          <img src="<?= URL . $project['url'] ?>" alt="Project Image" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title"><?= $project['name'] ?></h5>
            <p class="card-text">Likes: <?= $project['likes'] ?> - Comments: <?= $project['comments'] ?> - Members: <?= $project['participants'] ?></p>
            <p class="card-text"><span class="badge bg-secondary text-decoration-none link-light"><?= $project['category'] ?></span></p>
            <a class="btn btn-info" href="<?= URL . 'project/show/' . $project['slug'] ?>">Details <i class="fas fa-share"></i></a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<!-- Modal Add Project -->
<div class="modal fade" id="modal_project" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Agrega un nuevo proyecto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body px-4">
        <form action="<?= URL ?>project/save" id="form_project" method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-control" id="category" name="category" required>
              <option value="" selected disabled>__ Seleccione __</option>
              <?php foreach ($this->d['categories'] as $category) : ?>
                <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea id="description" name="description" class="form-control" required></textarea>
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" name="image" id="image">
            <img id="imagePreview" class="img-fluid d-none my-2" accept="image/*">
          </div>

          <div class="d-grid">
            <button type="submit" class="btn button-project">Save project</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php require_once 'views/layout/footer.php'; ?>
<script type="module" src="<?= URL ?>public/js/project.js"></script>
<?php require_once 'views/layout/foot.php'; ?>