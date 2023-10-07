<?php require_once 'views/layout/head.php'; ?>

<?php require_once 'views/layout/header.php'; ?>

<div class="container">
  <div class="row my-5">
    <div class="col-lg-6 mx-auto">
      <h1>Create a new project</h1>

      <form action="<?= URL ?>project/<?= $this->d['action'] ?>" id="form_project" method="post" enctype="multipart/form-data">
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
          <input type="file" class="form-control" id="image" name="image" id="image">
        </div>

        <button type="submit" class="btn btn-primary">Save project</button>
      </form>
    </div>
  </div>
</div>

<?php require_once 'views/layout/footer.php'; ?>
<script src="<?= URL ?>public/js/project.js" type="module"></script>
<?php require_once 'views/layout/foot.php'; ?>