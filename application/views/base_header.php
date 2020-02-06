<!DOCTYPE html>
<html lang=es>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Conteo de Goles</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url() ?>public/assets/img/favicon.png" rel="icon">
  <link href="<?= base_url() ?>public/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url() ?>public/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>public/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>public/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>public/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>public/assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="<?= base_url() ?>public/assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url() ?>public/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Mamba - v2.0.0
  * Template URL: https://bootstrapmade.com/mamba-one-page-bootstrap-template-free/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

<!-- ======= Top Bar ======= -->
<section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
      <div class="contact-info float-left">
        <i class="icofont-envelope"></i><a href="mailto:contact@example.com">contact@example.com</a>
        <i class="icofont-phone"></i> +1 5589 55488 55
      </div>
      <div class="social-links float-right">
        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="#" class="skype"><i class="icofont-skype"></i></a>
        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
      </div>
    </div>
  </section>

   <!-- ======= Header ======= -->
   <header id="header">
    <div class="container">

      <div class="logo float-left">
        <h1 class="text-light"><a href="index.html"><span>FutCount</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="<?= base_url() ?>">Inicio <i class="la la-angle-down"></i></a></li>

          <?php 
            if ($this->session->activo) { ?>
              

          <li class="drop-down"><a href=""><?= $this->session->user['us_correo'] ?></a>
            <ul>
              <li><a href="<?= base_url() ?>welcome/PartidoList">Partidos</a></li>
              <?php if ($this->session->user['us_is_superuser'] == 1 ) { ?>
                <li><a href="<?= base_url() ?>welcome/PaisList/">Paises</a></li>
                <!-- <li><a href="#">Gol</a></li> -->
                <li><a href="<?= base_url() ?>welcome/ListUser">Usuarios</a></li>
              <?php } ?>
              <li><a href="<?= base_url() ?>welcome/CerrarSesion">Salir</a></li>
            </ul>
          </li>
             
           <?php } else { ?>
                <li><a href="<?= base_url() ?>welcome/Iniciar">Iniciar sesion</a></li>
                <li><a href="<?= base_url() ?>welcome/registrar">Registrar</a></li>
           <?php }
           ?>
          
          
          
          
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->



<div class="container">
  <?php 
  if(!empty($this->session->mensaje)){
    echo $this->session->mensaje;
}
?>
</div>


