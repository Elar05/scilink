<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SciLink</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic"
        rel="stylesheet" type="text/css" />
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?= URL ?>views/landing/css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="<?= URL ?>">
                <h1 class="logo">Sci<span>Link.</span></h1>
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#equipo">Team</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= URL ?>invite">Marketplace</a></li>
                    <li class="nav-item"><a class="nav-link" target="_blank" href="https://github.com/Elar05/scilink">GitHub</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h1 class="text-white font-weight-bold">Be part of a great universe of knowledge</h1>
                    <hr class="divider" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-5">Connecting brilliant minds in science and technology</p>
                    <a class="btn btn-primary btn-xl" href="<?= URL ?>invite">Find Out More</a>
                </div>
            </div>
        </div>
    </header>
    <!-- Organizations -->
    <div class="organizations-container">
        <img class="org-img" src="<?= URL ?>views/landing/assets/img/logos/nasa.jpg" alt="NASA">
        <img class="org-img" src="<?= URL ?>views/landing/assets/img/logos/noaa.jpg" alt="NOAA">
        <img class="org-img" src="<?= URL ?>views/landing/assets/img/logos/nsf.png" alt="NSF">
        <img class="org-img" src="<?= URL ?>views/landing/assets/img/logos/usfs.png" alt="UFSF">
        <img class="org-img" src="<?= URL ?>views/landing/assets/img/logos/usfws.png" alt="USFWS">
    </div>

    <!-- About the project -->
    <div class="about-project" id="about">
        <p class="about-desc">The distinctive thing about this marketplace lies in its ability to encourage interaction between users and projects. Communication and collaboration tools will be included, such as discussion forums and comment spaces, where participants can share ideas, ask questions and establish potential collaborations.</p>
        <img class="about-img" src="<?= URL ?>views/landing/assets/img/logo.png" alt="Imagen empresa">
    </div>

    <!-- Integrantes -->
    <h2 style="text-align: center; font-weight: bold; margin-top: 5rem;">Meet our Team</h2>
    <div class="div-center" id="equipo">
        <div class="integrantes-container-landing">
            <div class="integrante-card perfil-integrante">
                <img src="<?= URL ?>views/landing/assets/img/integrantes/isis.jpg" alt="Integrante">
                <div class="integrante-info">
                    <p class="integrante-nombres">Isis Shantal Vera Solsol</p>
                    <p>@isisverasolsol</p>
                    <p class="integrante-pais">Perú</p>
                </div>
            </div>

            <div class="integrante-card perfil-integrante">
                <img src="<?= URL ?>views/landing/assets/img/integrantes/giovani.jpg" alt="Integrante">
                <div class="integrante-info">
                    <p class="integrante-nombres">Giovani Jordy Choquecota Hernani</p>
                    <p>@giodeveloper</p>
                    <p class="integrante-pais">Perú</p>
                </div>
            </div>

            <div class="integrante-card perfil-integrante">
                <img src="<?= URL ?>views/landing/assets/img/integrantes/dylan.png" alt="Integrante">
                <div class="integrante-info">
                    <p class="integrante-nombres">
                        Dylan Alberto Chilet Astete</p>
                    <p>@mr-wolf</p>
                    <p class="integrante-pais">Perú</p>
                </div>
            </div>

            <div class="integrante-card perfil-integrante">
                <img src="<?= URL ?>views/landing/assets/img/integrantes/danny.jpg" alt="Integrante">
                <div class="integrante-info">
                    <p class="integrante-nombres">Danny Adrian Castillo Otiniano</p>
                    <p>@dannycastillo</p>
                    <p class="integrante-pais">Perú</p>
                </div>
            </div>

            <div class="integrante-card perfil-integrante">
                <img src="<?= URL ?>views/landing/assets/img/integrantes/ruben.png" alt="Integrante">
                <div class="integrante-info">
                    <p class="integrante-nombres">Ruben Carvajal</p>
                    <p>@ruben3185</p>
                    <p class="integrante-pais">Colombia</p>
                </div>
            </div>

            <div class="integrante-card perfil-integrante">
                <img src="<?= URL ?>views/landing/assets/img/integrantes/elar.jpg" alt="Integrante">
                <div class="integrante-info">
                    <p class="integrante-nombres">Elar López Cortez</p>
                    <p>@elar10</p>
                    <p class="integrante-pais">Perú</p>
                </div>
            </div>
        </div>
    </div>
    <!-- About-->
    <footer>
        <div class="div-center">
            <ul class="list-footer">
                <li>
                    <h1 class="title-footer">Página</h1>
                </li>
                <li>
                    <a href='index.html' class="foot-link">Inicio</a>
                </li>
                <li>
                    <a href='<?= URL ?>login' class="foot-link">Inicia Sesión</a>
                </li>
                <li>
                    <a href='<?= URL ?>register' class="foot-link">Regístrate</a>
                </li>
                <li>
                    <a href='<?= URL ?>profile' class="foot-link">Tu perfil</a>
                </li>
            </ul>
            <ul class="list-footer">
                <li>
                    <h1 class="title-footer">Líder y Admin</h1>
                </li>
                <li>
                    <a href='https://www.linkedin.com/in/isisverasolsol/' class="foot-link">Isis Vera</a>
                </li>
                <li>
                    <a href='https://www.linkedin.com/in/giovani-choquecota/' class="foot-link">Giovani Choquecota</a>
                </li>
            </ul>
            <ul class="list-footer">
                <li>
                    <h1 class="title-footer">FrontEnd</h1>
                </li>
                <li>
                    <a href='https://www.linkedin.com/in/dylan-alberto-chilet-astete/' class="foot-link">Dylan Astete</a>
                </li>
                <li>
                    <a href='www.linkedin.com/in/dannycastilloo' class="foot-link">Danny Castillo</a>
                </li>
            </ul>
            <ul class="list-footer">
                <li>
                    <h1 class="title-footer">Backend</h1>
                </li>
                <li>
                    <a href='https://www.linkedin.com/in/elar-lopez/' class="foot-link">Elar López</a>
                </li>
                <li>
                    <a href='https://www.linkedin.com/in/ruben3185-8a70ba36/' class="foot-link">Ruben Carvajal</a>
                </li>
            </ul>

            <div class="vl"></div>

            <ul class="list-footer">
                <h1 class="logo title-footer">Sci<span>Link.</span></h1>
                <p class="foot-link">Conectando Mentes Brillantes en Ciencia y Tecnología</p>
                <li class="social-container">
                    <img class="social" src="<?= URL ?>public/img/Facebook.svg" alt="Facebook" />
                    <img class="social" src="<?= URL ?>public/img/Instagram.svg" alt="Instagram" />
                    <img class="social" src="<?= URL ?>public/img/Linkedin.svg" alt="Linkedin" />
                </li>
                <li>
                    <p class="foot-link">Copyright © SciLink 2023</p>
                </li>
            </ul>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SimpleLightbox plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
    <!-- Core theme JS-->
    <script src="<?= URL ?>views/landing/js/scripts.js"></script>
</body>

</html>