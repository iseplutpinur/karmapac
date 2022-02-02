<!DOCTYPE html>
<html lang="en-US">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title><?= $title ?> | <?= $app_name ?></title>
  <meta name="description" content="Karmapack - Keluarga Mahasiswa dan Pelajar Cianjur Kidul">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/front') ?>/favicon/favicon.png">
  <link rel="apple-touch-icon" sizes="57x57" href="<?= base_url('assets/front') ?>/favicon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="<?= base_url('assets/front') ?>/favicon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url('assets/front') ?>/favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/front') ?>/favicon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url('assets/front') ?>/favicon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="<?= base_url('assets/front') ?>/favicon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="<?= base_url('assets/front') ?>/favicon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="<?= base_url('assets/front') ?>/favicon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/front') ?>/favicon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url('assets/front') ?>/favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/front') ?>/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="<?= base_url('assets/front') ?>/favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/front') ?>/favicon/favicon-16x16.png">
  <link rel="manifest" href="<?= base_url('assets/front') ?>/favicon/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="<?= base_url('assets/front') ?>/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">

  <!-- STYLES -->
  <link rel="stylesheet" href="<?= base_url('assets/front') ?>/css/bootstrap.min.css" type="text/css" media="all">
  <link rel="stylesheet" href="<?= base_url('assets/front') ?>/css/all.min.css" type="text/css" media="all">
  <link rel="stylesheet" href="<?= base_url('assets/front') ?>/css/slick.css" type="text/css" media="all">
  <link rel="stylesheet" href="<?= base_url('assets/front') ?>/css/simple-line-icons.css" type="text/css" media="all">
  <link rel="stylesheet" href="<?= base_url('assets/front') ?>/css/style.css" type="text/css" media="all">

  <!-- Include -->
  <style>
    .lds-ellipsis {
      display: inline-block;
      position: relative;
      width: 80px;
      height: 80px;
    }

    .lds-ellipsis div {
      position: absolute;
      top: 33px;
      width: 13px;
      height: 13px;
      border-radius: 50%;
      background: #0092DF;
      animation-timing-function: cubic-bezier(0, 1, 1, 0);
    }

    .lds-ellipsis div:nth-child(1) {
      left: 8px;
      animation: lds-ellipsis1 0.6s infinite;
    }

    .lds-ellipsis div:nth-child(2) {
      left: 8px;
      animation: lds-ellipsis2 0.6s infinite;
    }

    .lds-ellipsis div:nth-child(3) {
      left: 32px;
      animation: lds-ellipsis2 0.6s infinite;
    }

    .lds-ellipsis div:nth-child(4) {
      left: 56px;
      animation: lds-ellipsis3 0.6s infinite;
    }

    @keyframes lds-ellipsis1 {
      0% {
        transform: scale(0);
      }

      100% {
        transform: scale(1);
      }
    }

    @keyframes lds-ellipsis3 {
      0% {
        transform: scale(1);
      }

      100% {
        transform: scale(0);
      }
    }

    @keyframes lds-ellipsis2 {
      0% {
        transform: translate(0, 0);
      }

      100% {
        transform: translate(24px, 0);
      }
    }
  </style>
</head>

<body>
  <?php if ($front['preloader']) : ?>
    <!-- preloader -->
    <div id="preloader">
      <div class="d-flex justify-content-center align-items-center flex-column" style="height: 90vh;">
        <img src="<?= base_url("files/logo/{$front['logo']['value1']}") ?>" style="max-width: 80px;" alt="logo" />

        <!-- loading animation -->
        <div class="ms-2 lds-ellipsis">
          <div></div>
          <div></div>
          <div></div>
          <div></div>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <!-- site wrapper -->
  <div class="site-wrapper">

    <div class="main-overlay"></div>
    <div class="alert alert-secondary alert-dismissible fade show" role="alert">
      <div class="container d-flex justify-content-between align-items-center">
        <strong>
          Situs ini masih dalam masa pengembangan.
        </strong>

        <button type="button" class="btn text-dark" data-bs-dismiss="alert" aria-label="Close">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z" />
            <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z" />
          </svg>
        </button>
      </div>
    </div>
    <!-- header -->
    <header class="header-personal">
      <div class="container-xl header-top">
        <div class="row align-items-center">

          <div class="col-4 d-none d-md-block d-lg-block">
            <!-- social icons -->
            <ul class="social-icons list-unstyled list-inline mb-0">
              <?php foreach ($front['sosmed'] as $sosmed) : ?>
                <li class="list-inline-item"><a href="<?= $sosmed['link'] ?>" title="<?= $sosmed['name'] ?>"><i class="<?= $sosmed['icon'] ?>"></i></a></li>
              <?php endforeach; ?>

            </ul>
          </div>

          <div class="col-md-4 col-sm-12 col-xs-12 text-center">
            <!-- site logo -->
            <a class="navbar-brand" href="<?= base_url() ?>"><img src="<?= base_url('assets/front') ?>/images/logo/300x300.png" style="max-width: 80px;" alt="logo" /></a>
            <a href="<?= base_url() ?>" class="d-block text-logo">KARMAPACK</a>
            <span class="slogan d-block">Keluarga Mahasiswa dan Pelajar Cianjur Kidul</span>
          </div>

          <div class="col-md-4 col-sm-12 col-xs-12">
            <!-- header buttons -->
            <div class="header-buttons float-md-end mt-4 mt-md-0">
              <button class="search icon-button">
                <i class="icon-magnifier"></i>
              </button>
              <button class="burger-menu icon-button ms-2 float-end float-md-none">
                <span class="burger-icon"></span>
              </button>
            </div>
          </div>

        </div>
      </div>

      <nav class="navbar navbar-expand-lg">
        <div class="container-xl">

          <div class="collapse navbar-collapse justify-content-center centered-nav">
            <!-- menus -->
            <ul class="navbar-nav">
              <?= $navigation ?>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <?php if (file_exists(VIEWPATH . "templates/contents/{$content}.php")) : ?>
      <?php $this->load->view("templates/contents/{$content}.php"); ?>
    <?php endif; ?>

    <!-- instagram feed -->
    <div class="instagram  mt-5 mb-0 py-5 bg-light">
      <div class="container-xl">
        <!-- button -->
        <a href="https://instagram.com/orda_karmapack" class="btn btn-default btn-instagram">@Karmapack on Instagram</a>
        <!-- images -->
        <div class="instagram-feed d-flex flex-wrap">
          <div class="insta-item col-sm-2 col-6 col-md-2">
            <a href="#">
              <img src="<?= base_url('assets/front') ?>/images/insta/insta-1.jpg" alt="insta-title" />
            </a>
          </div>
          <div class="insta-item col-sm-2 col-6 col-md-2">
            <a href="#">
              <img src="<?= base_url('assets/front') ?>/images/insta/insta-2.jpg" alt="insta-title" />
            </a>
          </div>
          <div class="insta-item col-sm-2 col-6 col-md-2">
            <a href="#">
              <img src="<?= base_url('assets/front') ?>/images/insta/insta-3.jpg" alt="insta-title" />
            </a>
          </div>
          <div class="insta-item col-sm-2 col-6 col-md-2">
            <a href="#">
              <img src="<?= base_url('assets/front') ?>/images/insta/insta-4.jpg" alt="insta-title" />
            </a>
          </div>
          <div class="insta-item col-sm-2 col-6 col-md-2">
            <a href="#">
              <img src="<?= base_url('assets/front') ?>/images/insta/insta-5.jpg" alt="insta-title" />
            </a>
          </div>
          <div class="insta-item col-sm-2 col-6 col-md-2">
            <a href="#">
              <img src="<?= base_url('assets/front') ?>/images/insta/insta-6.jpg" alt="insta-title" />
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- footer -->
    <footer class="mt-0">
      <div class="container-xl">
        <div class="footer-inner">
          <div class="row d-flex align-items-center gy-4">
            <!-- copyright text -->
            <div class="col-md-4">
              <span class="copyright">© 2021 Karmapack. Persembahan Dari <a href="http://github.com/iseplutpinur">Isep
                  Lutpi Nur</a> Bidang Kominfo.</span>
            </div>

            <!-- social icons -->
            <div class="col-md-4 text-center">
              <ul class="social-icons list-unstyled list-inline mb-0">
                <?php foreach ($front['sosmed'] as $sosmed) : ?>
                  <li class="list-inline-item"><a href="<?= $sosmed['link'] ?>" title="<?= $sosmed['name'] ?>"><i class="<?= $sosmed['icon'] ?>"></i></a></li>
                <?php endforeach; ?>
              </ul>
            </div>

            <!-- go to top button -->
            <div class="col-md-4">
              <a href="#" id="return-to-top" class="float-md-end"><i class="icon-arrow-up"></i>Back to Top</a>
            </div>
          </div>
        </div>
      </div>
    </footer>

  </div><!-- end site wrapper -->

  <!-- search popup area -->
  <div class="search-popup">
    <!-- close button -->
    <button type="button" class="btn-close" aria-label="Close"></button>
    <!-- content -->
    <div class="search-content">
      <div class="text-center">
        <h3 class="mb-4 mt-0">Press ESC to close</h3>
      </div>
      <!-- form -->
      <form class="d-flex search-form">
        <input class="form-control me-2" type="search" placeholder="Search and press enter ..." aria-label="Search">
        <button class="btn btn-default btn-lg" type="submit"><i class="icon-magnifier"></i></button>
      </form>
    </div>
  </div>

  <!-- canvas menu -->
  <div class="canvas-menu d-flex align-items-end flex-column">
    <!-- close button -->
    <button type="button" class="btn-close" aria-label="Close"></button>

    <!-- logo -->
    <div class="logo">
      <h3><?= $app_name ?></h3>
    </div>

    <!-- menu -->
    <nav>
      <ul class="vertical-menu">
        <?= $navigation2 ?>
      </ul>
    </nav>

    <!-- social icons -->
    <ul class="social-icons list-unstyled list-inline mb-0 mt-auto w-100">
      <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
      <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
      <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
      <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
      <li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
      <li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
    </ul>
  </div>

  <!-- JAVA SCRIPTS -->
  <script src="<?= base_url('assets/front') ?>/js/jquery.min.js"></script>
  <script src="<?= base_url('assets/front') ?>/js/popper.min.js"></script>
  <script src="<?= base_url('assets/front') ?>/js/bootstrap.min.js"></script>
  <script src="<?= base_url('assets/front') ?>/js/slick.min.js"></script>
  <script src="<?= base_url('assets/front') ?>/js/jquery.sticky-sidebar.min.js"></script>
  <script src="<?= base_url('assets/front') ?>/js/custom.js"></script>

</body>

</html>