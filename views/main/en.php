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
      <li><a href="#">Home</a></li>
      <li><a href="#">Language <i class="fas fa-caret-down"></i></a>
        <div class="dropdown-menu">
          <ul>
            <li><a href="#">English</a></li>
            <li><a href="#">Spanish</a></li>
          </ul>
        </div>

      <li><a href="#">Usuario <i class="fas fa-caret-down"></i></a>
        <div class="dropdown-menu">
          <ul>
            <li><a href="#">Login</a></li>
            <li><a href="#">Register</a></li>
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
      <img src="./img/BREED Hero_0112_schnauzer_standard.jpg" alt="Imagen 1">
      <p>Texto para la imagen 1</p>
      <button>Ver detalles</button>
    </div>
    <div class="flexbox-item">
      <img src="imagen2.jpg" alt="Imagen 2">
      <p>Texto para la imagen 2</p>
      <button>Ver detalles</button>
    </div>
    <div class="flexbox-item">
      <img src="imagen3.jpg" alt="Imagen 3">
      <p>Texto para la imagen 3</p>
      <button>Ver detalles</button>
    </div>
    <div class="flexbox-item">
      <img src="imagen1.jpg" alt="Imagen 1">
      <p>Texto para la imagen 1</p>
      <button>Ver detalles</button>
    </div>
    <div class="flexbox-item">
      <img src="imagen2.jpg" alt="Imagen 2">
      <p>Texto para la imagen 2</p>
      <button>Ver detalles</button>
    </div>
    <div class="flexbox-item">
      <img src="imagen3.jpg" alt="Imagen 3">
      <p>Texto para la imagen 3</p>
      <button>Ver detalles</button>
    </div>
    <div class="flexbox-item">
      <img src="imagen1.jpg" alt="Imagen 1">
      <p>Texto para la imagen 1</p>
      <button>Ver detalles</button>
    </div>
    <div class="flexbox-item">
      <img src="imagen2.jpg" alt="Imagen 2">
      <p>Texto para la imagen 2</p>
      <button>Ver detalles</button>
    </div>
    <div class="flexbox-item">
      <img src="imagen3.jpg" alt="Imagen 3">
      <p>Texto para la imagen 3</p>
      <button>Ver detalles</button>
    </div>
  </div>
</div>

<?php require_once 'views/layout/foot.php'; ?>

<?php require_once 'views/layout/footer.php'; ?>