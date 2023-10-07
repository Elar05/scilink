</head>

<body>
  <div class="menu-bar">
    <a href="<?= URL ?>" class="text-decoration-none">
      <h1 class="logo p-0 m-0"> Sci<span>Link.</span></h1>
    </a>

    <ul class="p-0 m-0">
      <li class="ps-4"><a href="<?= URL ?>">Home</a></li>
      <!-- <li class="ps-4"><a href="#">Idioma <i class="fas fa-caret-down"></i></a>
        <div class="dropdown-menu">
          <ul>
            <li><a href="#">Inglés</a></li>
            <li><a href="#">Español</a></li>
          </ul>
        </div>
      </li> -->
      <li class="ps-4"><a href="#"><?= $this->user['name'] ?> <i class="fas fa-caret-down"></i></a>
        <div class="dropdown-menu">
          <ul>
            <li><a href="<?= URL ?>logout">Logout</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </div>