</head>

<body>
  <div class="menu-bar">
    <a href="<?= URL ?>" class="text-decoration-none">
      <h1 class="logo p-0 m-0"> Sci<span>Link.</span></h1>
    </a>

    <ul class="p-0 m-0">
      <?php if (isset($_SESSION)) : ?>
        <li class="ps-4"><a href="<?= URL ?>">Home</a></li>
        <li class="ps-4"><a href="<?= URL ?>project">My Projects</a></li>
        <li class="ps-4"><a href="#"><?= $this->user['name'] ?> <i class="fas fa-caret-down"></i></a>
          <div class="dropdown-menu">
            <ul>
              <li><a href="<?= URL ?>profile/in/<?= $this->user['slug'] ?>">Profile</a></li>
              <li><a href="<?= URL ?>logout">Logout</a></li>
            </ul>
          </div>
        </li>
      <?php else : ?>
        <li class="ps-4"><a href="#">User <i class="fas fa-caret-down"></i></a>
          <div class="dropdown-menu">
            <ul>
              <li><a href="<?= URL ?>register">Register</a></li>
              <li><a href="<?= URL ?>login">Login</a></li>
            </ul>
          </div>
        </li>
      <?php endif; ?>
    </ul>
  </div>