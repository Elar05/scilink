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

      <li><a href="#">Usuario <i class="fas fa-caret-down"></i></a>
        <div class="dropdown-menu">
          <ul>
            <li><a href="#">Ingresar</a></li>
            <li><a href="#">Registrarse</a></li>
          </ul>
        </div>
      </li>
  </div>

  <div class="flex">
    <div class="contenedor">
      <ul class="flex-contenedor">
        <li><a href="#">Web</a></li>
        <li><a href="#">Ciencia</a></li>
        <li><a href="#">Hardware</a></li>
        <li><a href="#">Análisis</a></li>
      </ul>
    </div>
  </div>


  <div class="container">
    <div class="flexbox-item">
      <img src="<?= URL ?>public/img/a.jpg" alt="Imagen 1">
      <p>Texto para la imagen 1</p>
      <button>Ver detalles</button>
    </div>
    <div class="flexbox-item">
      <img src="<?= URL ?>public/img/a.jpg" alt="Imagen 2">
      <p>Texto para la imagen 2</p>
      <button>Ver detalles</button>
    </div>
    <div class="flexbox-item">
      <img src="<?= URL ?>public/img/a.jpg" alt="Imagen 3">
      <p>Texto para la imagen 3</p>
      <button>Ver detalles</button>
    </div>
    <div class="flexbox-item">
      <img src="<?= URL ?>public/img/a.jpg" alt="Imagen 1">
      <p>Texto para la imagen 1</p>
      <button>Ver detalles</button>
    </div>
    <div class="flexbox-item">
      <img src="<?= URL ?>public/img/a.jpg" alt="Imagen 2">
      <p>Texto para la imagen 2</p>
      <button>Ver detalles</button>
    </div>
    <div class="flexbox-item">
      <img src="<?= URL ?>public/img/a.jpg" alt="Imagen 3">
      <p>Texto para la imagen 3</p>
      <button>Ver detalles</button>
    </div>
    <div class="flexbox-item">
      <img src="<?= URL ?>public/img/a.jpg" alt="Imagen 1">
      <p>Texto para la imagen 1</p>
      <button>Ver detalles</button>
    </div>
    <div class="flexbox-item">
      <img src="<?= URL ?>public/img/a.jpg" alt="Imagen 2">
      <p>Texto para la imagen 2</p>
      <button>Ver detalles</button>
    </div>
    <div class="flexbox-item">
      <img src="<?= URL ?>public/img/a.jpg" alt="Imagen 3">
      <p>Texto para la imagen 3</p>
      <button>Ver detalles</button>
    </div>
  </div>
</div>

<?php require_once 'views/layout/foot.php'; ?>

<?php require_once 'views/layout/footer.php'; ?>