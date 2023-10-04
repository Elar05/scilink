<?php require_once 'views/layout/head.php'; ?>

<?php require_once 'views/layout/header.php'; ?>

<div>
  <h1>Create a new project</h1>

  <form action="<?= URL ?>project/<?= $this->d['action'] ?>" id="form_project" method="post" enctype="multipart/form-data">
    <div>
      <select name="category" required>
        <option value="" selected disabled>__ Seleccione __</option>
        <?php foreach ($this->d['categories'] as $category) : ?>
          <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div>
      <input type="text" name="name" required>
    </div>
    <div>
      <textarea name="description" cols="30" rows="10" required></textarea>
    </div>
    <div>
      <input type="file" name="image" id="image">
    </div>
    <button type="submit">Registrar project</button>
  </form>
</div>

<?php require_once 'views/layout/foot.php'; ?>
<script src="<?= URL ?>public/js/project.js"></script>
<?php require_once 'views/layout/footer.php'; ?>