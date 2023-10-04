<?php require_once 'views/layout/head.php'; ?>

<?php require_once 'views/layout/header.php'; ?>

<div>
  <h1>Projects</h1>

  <a href="<?= URL ?>project/create">New Project</a>

  <div>
    <table>
      <thead>
        <tr>
          <th>Category</th>
          <th>Name</th>
          <th>Fecha</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($this->d['projects'] as $project) : ?>
          <tr>
            <td><?= $project['idcategory'] ?></td>
            <td><a href="<?= URL . "project/show/" . $project['slug'] ?>"><?= $project['name'] ?></a></td>
            <td><?= $project['created_at'] ?></td>
            <td><?= $project['status'] ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<?php require_once 'views/layout/foot.php'; ?>

<?php require_once 'views/layout/footer.php'; ?>