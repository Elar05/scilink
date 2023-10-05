<?php require_once 'views/layout/head.php'; ?>
<link rel="stylesheet" href="<?= URL ?>public/css/style2.css" />
<?php require_once 'views/layout/header.php'; ?>

<div>
  <div class="menu-bar">
    <h1 class="logo">Sci<span>Link.</span></h1>
    <div class="search-bar">
      <input type="text" placeholder="Buscar...">
    </div>
    <ul>
      <li><a href="#">Inicio</a></li>
      <li><a href="#">Idioma <i class="fas fa-caret-down"></i></a>
        <div class="dropdown-menu">
          <ul>
            <li><a href="#">Inglés</a></li>
            <li><a href="#">Español</a></li>
          </ul>
        </div>
      </li>
      <li><a href="#">Usuario <i class="fas fa-caret-down"></i></a>
        <div class="dropdown-menu">
          <ul>
            <li><a href="#">Ingresar</a></li>
            <li><a href="#">Registrarse</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </div>

  <div class="flex">
    <div class="contenedor">
      <ul class="flex-contenedor">
        <?php foreach ($this->d['categories'] as $category) : ?>
          <li><a href="#"><?= $category['name'] ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>

  <div class="container">
    <?php foreach ($this->d['lastProjects'] as $project) : ?>
      <div class="flexbox-item">
        <img src="<?= URL . $project['url'] ?>" alt="Project Image">
        <p><?= $project['name'] ?></p>
        <a href="<?= URL . 'project/show/' . $project['slug'] ?>">Details</a>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<?php require_once 'views/layout/foot.php'; ?>

<?php require_once 'views/layout/footer.php'; ?>