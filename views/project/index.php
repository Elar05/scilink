<?php require_once 'views/layout/head.php'; ?>

<?php require_once 'views/layout/header.php'; ?>

<div class="container">
  <div class="d-flex justify-content-between align-content-center align-items-center">
    <h1 class="my-4">My Projects</h1>
    <div>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_project">
        Create Project <i class="fas fa-plus"></i>
      </button>
    </div>
  </div>

  <div class="row row-cols-1 row-cols-md-3 g-4">
    <?php foreach ($this->d['projects'] as $project) : ?>
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
            <p>Status: Active - recruiting volunteers</p>
            <p class="text-card">Category: <span class="badge bg-secondary text-decoration-none link-light text-uppercase"><?= $project['category'] ?></span></p>

            <div class="d-grid pt-2">
              <a class="btn button-project text-uppercase" href="<?= URL . 'project/show/' . $project['slug'] ?>">Details</a>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<!-- Modal Add Project -->
<div class="modal fade" id="modal_project" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Create a new project</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body px-4">
        <div id="alertMessage"></div>
        <form action="<?= URL ?>project/save" class="row" id="form_project" method="post" enctype="multipart/form-data">
          <div class="col-md-6">
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
              <textarea id="description" name="description" class="form-control" rows="7" required></textarea>
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label for="fields" class="form-label">Fields of Science</label>
              <input type="text" class="form-control" id="fields" name="fields" required>
            </div>
            <div class="mb-3">
              <label for="agency" class="form-label">Agency Sponsor</label>
              <input type="text" class="form-control" id="agency" name="agency" required>
            </div>
            <div class="mb-3">
              <label for="geographic" class="form-label">Geographic Scope</label>
              <input type="text" class="form-control" id="geographic" name="geographic" required>
            </div>
            <div class="mb-3">
              <label for="link" class="form-label">Project Link</label>
              <input type="text" class="form-control" id="link" name="link">
            </div>
            <div class="mb-3">
              <label for="image" class="form-label">Image</label>
              <input type="file" class="form-control" name="image" id="image">
              <img id="imagePreview" class="img-fluid d-none my-2" accept="image/*">
            </div>
          </div>
          <div class="d-grid">
            <button type="submit" class="btn button-project text-uppercase">Save project</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php require_once 'views/layout/footer.php'; ?>
<script type="module" src="<?= URL ?>public/js/project.js?v=1.0"></script>
<?php require_once 'views/layout/foot.php'; ?>